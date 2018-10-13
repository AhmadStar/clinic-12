<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor extends CI_Controller {
  
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
    
    $this->load->model('doctors');
    
    $data['doctors'] = $this->doctors->get();    
    $data['title'] = tr('DoctorsList');  
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('doctor/index/'.$data['per_page']);
    $config['total_rows'] = count($data['doctors']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    
    $path='doctor/list';
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
  public function edit($doctor_id=0)
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
    $this->load->model('doctors');
    $this->doctors->load($doctor_id);
    
    if($this->input->post())
    {
        
      $this->form_validation->set_rules(array(        
        array( 'field' => 'name', 'label' => 'type', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'address', 'label' => 'amount', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'phone', 'label' => 'date', 'rules' => 'required|trim|has_no_schar', ),
      ));    
              
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$doctor_id)
        {
            unset($_POST['submit']);
            $doctor=$this->input->post();
            $this->load->model('doctors');
            foreach($doctor as $key => $value)
              $this->doctors->$key = $value;
            $this->doctors->save();
            unset($_POST);
            $data['script'] = '<script>alert("'. html_escape($this->doctors->name). ' has been updated successfuly.");</script>';
            redirect('doctor');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }
    $this->session->set_userdata(current_url(),array($doctor_id));
    $data['title'] = tr('EditDoctor');    
    $data['doctor']=$this->doctors;
    $path='doctor/edit';
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
  public function delete($doctor_id=0)
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
    $this->load->model('doctors');
    $this->doctors->load($doctor_id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id')==$doctor_id)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$doctor_id)
        {
            
            //$this->load->model('drug_patient');
            //$this->drug_patient->get_by_fkey('drug_id',$doctor_id);
            //if(!$this->drug_patient->drug_patient_id){
                $this->doctors->delete();
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
    $this->session->set_userdata(current_url(),array($doctor_id));
    $data['doctor']=$this->doctors;
    //$data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    //$data['includes']=array('drug/delete');
    
//      print_r($data);
//      echo $data;
    $this->load->view('doctor/confirm_delete',$data);
    //$this->load->view('header',$data);
    //$this->load->view('index',$data);
    //$this->load->view('footer',$data);
  }
  
  /*
   * 
   */
  public function new_doctor()
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
        array( 'field' => 'name', 'label' => 'type', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'address', 'label' => 'amount', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'phone', 'label' => 'date', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $doctor=$this->input->post();
        $this->load->model('doctors');
        foreach($doctor as $key => $value)
          $this->doctors->$key = $value;
        $this->doctors->save();
        unset($_POST);
        $data['script'] = '<script>alert("'. html_escape($this->doctors->name). ' has been registered successfuly.");</script>';
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewDoctor');    
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='doctor/new';
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
  

  
  public function incomelist($doctor_id=0 , $limit = 12,$page = 1)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('pharmacy'))
    {
      $this->_no_access();
      return;
    }
    
    $this->load->model('incomes');
    $this->load->model('patients');
    $data['patients'] = $this->patients->get();  
    
    $data['doctorincomes'] = $this->incomes->get_all_doctor_incomes($doctor_id);  
    $a  = $this->incomes->get_sum_of_doctor_incomes($doctor_id);
    $b  = $this->incomes->get_sum_static_doctor_incomes($doctor_id);
    $c  = $this->incomes->get_sum_normal_doctor_incomes($doctor_id);
    $data['allmoney'] = $a[0]['amount'];
    $data['allstatic'] = $b[0]['amount'];
    $data['allnormal'] = $c[0]['amount'];
      
//    $data['doctorincomes'] = $this->incomes->get();    
    $data['title'] = tr('DoctorIncomeList');      
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('doctor/incomelist/'.$doctor_id.'/'.$data['per_page']);
    $config['total_rows'] = count($data['doctorincomes']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    
    $data['type_options'] = $this->type_options();
    $path='doctor/list_income';
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
   * _id_type_options()
   * returns the array of type
   */
  public function type_options()
  {
    return array('0'=>tr('IncomeType'),
                 'static'=>'معاينة ثابتة',
                 'normal'=>'معاينة عادية',);
  }    
}