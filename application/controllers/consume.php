<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consume extends CI_Controller {
  
  /**
   * Drug::__construct()
   *
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('site');  

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }

  
  /**
   * Drug::index()
   */
  public function index($limit = 15,$page = 1)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    $this->load->model('consumes');
    $this->load->model('doctors');
    
    $data['consumes'] = $this->consumes->get();
    $data['doctors'] = $this->doctors->get();
    $data['title'] = tr('ConsumeList');
//    $data['title'] =  trP('ConsumeList');
      
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('consume/index/'.$data['per_page']);
    $config['total_rows'] = count($data['consumes']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    
    $path='consume/list';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer',$data);
    }
  }
  
  /**
   * Patient::search()
   */
  public function search(/*$q=''*/)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    //if($q!='')
    if($this->input->post())
    {
        $this->load->model('drugs');
        $q=$this->input->post('q');
        //$drugs=$this->drugs->search(array('drug_name_en'=>$q,'drug_name_fa'=>$q));
        $drugs=$this->drugs->search(array('drug_name_en'=>$q,'drug_name_fa'=>$q));
        $data['drugs']=$drugs;
        $this->load->view('drug/result',$data);
        return TRUE;
    }
    $data['title']=tr('DrugSearch');
    $this->load->view('drug/search');
  }
  
  /**
   * Patient::edit()
   */
  public function edit($id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
    $this->load->model('consumes');
    $this->consumes->load($id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'name', 'label' => 'Consume Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'catagory', 'label' => 'Category', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'count', 'label' => 'count', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'price', 'label' => 'price', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$id)
        {
            unset($_POST['submit']);
            $consume=$this->input->post();
            $this->load->model('consumes');
            foreach($consume as $key => $value)
              $this->consumes->$key = $value;
            $this->consumes->save();
            unset($_POST);
            $data['script'] = '<script>alert("'. html_escape($this->consumes->name). ' has been updated successfuly.");</script>';
            redirect('consume');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }
    $this->session->set_userdata(current_url(),array($id));    
    $data['title'] = tr('EditConsume');
    $data['consume']=$this->consumes;
    $data['doctor_list']=$this->_doctor_list();
    $path='consume/edit';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer',$data);
    }
  }

  /**
   * Patient::edit()
   */
  public function delete($consume_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
    $this->load->model('consumes');
    $this->consumes->load($consume_id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id')==$consume_id)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$consume_id)
        {
            //$this->load->model('drug_patient');
            //$this->drug_patient->get_by_fkey('drug_id',$consume_id);
            //if(!$this->drug_patient->drug_patient_id){
                $this->consumes->delete();
                echo 'ok';
                return;
            //}else{
              //  echo 'nok';
            //    return;
            //}
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = 'mismatch';
          return;
        }
      }else{
        $data['error']='invalid';
        return;
      }
    }
    $this->session->set_userdata(current_url(),array($consume_id));
    $data['consume']=$this->consumes;
    //$data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    //$data['includes']=array('drug/delete');
    $this->load->view('consume/confirm_delete',$data);
    //$this->load->view('header',$data);
    //$this->load->view('index',$data);
    //$this->load->view('footer',$data);
  }
  
  /*
   * 
   */
  public function new_consume()
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('admin'))
    {
      $this->_no_access();
      return;
    }
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'name', 'label' => 'Consume Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'catagory', 'label' => 'Category', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'count', 'label' => 'count', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'price', 'label' => 'price', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $consume=$this->input->post();
        $this->load->model('consumes');
        foreach($consume as $key => $value)
          $this->consumes->$key = $value;
        $this->consumes->save();
        unset($_POST);
        $data['script'] = '<script>alert("'. html_escape($this->consumes->name). ' has been registered successfuly.");</script>';
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewConsume');  
    $data['doctor_list']=$this->_doctor_list();
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='consume/new';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer',$data);
    }
  }
  



  public function _no_access()
  {
    $data['title']=tr('UnauthorizedAccess');
    $path='account/no_access';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array($path);
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }
  }
    

/**
   * _doctor_list()
   * returns a list of doctor to assign the patient to.
   */ 
  public function _doctor_list()
  {
    $this->load->model('doctors');
    $doctors = $this->doctors->get();
//    $this->load->helper('site'); 
    $doctor_list['0']=tr('DoctorName');
//    $doctor_list['0']='';
    foreach ($doctors as $doctor) 
    {
      $doctor_list[$doctor->id]=  html_escape($doctor->name.', '.$doctor->address.', '.$doctor->phone);
    }
    return $doctor_list;
  }
}