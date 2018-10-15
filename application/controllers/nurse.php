<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nurse extends CI_Controller {
  
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
    
    $this->load->model('nurses');
      
    $data['nurses'] = $this->nurses->get_all_nurses();
      
    $data['title'] = tr('NurseList');  
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('nurse/index/'.$data['per_page']);
    $config['total_rows'] = count($data['nurses']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    

    $path='nurse/list';
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
  public function edit($nurse_id=0)
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
    $this->load->model('nurses');
    $data['nurse'] = $this->nurses->get_one_nurse($nurse_id);
    print_r($data['nurse']);
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'name','label' => 'nurse Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'age','label' => 'age', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'phone', 'label' => 'phone', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'address', 'label' => 'address', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$nurse_id)
        {
            unset($_POST['submit']);
            $nurse=$this->input->post();
            $this->load->model('nurses');
             $data_to_store = array(
                    'name' => $this->input->post('name'),
                    'age' => $this->input->post('age'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),                    
                );
            $this->nurses->update_nurse($nurse_id,$data_to_store);
            
            unset($_POST);
            $data['script'] = '<script>alert("'. html_escape($this->nurses->name). ' has been updated successfuly.");</script>';
            redirect('nurse');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($nurse_id));    
    $data['title'] = tr('EditNurse');    
    
      $path='nurse/edit';
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
  public function delete($income_id=0)
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
    $this->load->model('incomes');
    $data['income'] = $this->incomes->get_one_income($income_id);
    
    if($this->input->post())
    {         
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id') == $income_id)          
      {        
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$income_id)
        {
                $this->incomes->delete_income($income_id);
                echo 'ok';
                return;
            
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
    $this->session->set_userdata(current_url(),array($income_id));
//    $data['income']=$this->incomes;
    //$data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    //$data['includes']=array('drug/delete');
      
//    print_r($data);
    $this->load->view('income/confirm_delete',$data);
    //$this->load->view('header',$data);
    //$this->load->view('index',$data);
    //$this->load->view('footer',$data);
  }
  
  /*
   * 
   */
  public function new_nurse()
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
        array( 'field' => 'name','label' => 'Nurse Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'age','label' => 'Age', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'phone', 'label' => 'Phone', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'address', 'label' => 'Address', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $nurse=$this->input->post();          
        $this->load->model('nurses');        
        $data_to_store = array(
                    'name' => $this->input->post('name'),
                    'age' => $this->input->post('age'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                );
        $this->nurses->save_nurse($data_to_store);
        unset($_POST);
        $data['script'] = '<script>alert("'. html_escape($this->nurses->nurse_id). ' has been registered successfuly.");</script>';
        redirect('nurse');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewNurses');      
      
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='nurse/new';
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
//    
//    /**
//   * _id_type_options()
//   * returns the array of type
//   */
//  public function type_options()
//  {
//    return array('0'=> tr('IncomeType'),
//                 'static'=>'معاينة ثابتة',
//                 'normal'=>'معاينة عادية',);
//  }    
//    
//  /**
//   * _doctor_list()
//   * returns a list of doctor to assign the patient to.
//   */ 
//  public function _doctor_list()
//  {
//    $this->load->model('doctors');
//    $doctors = $this->doctors->get();
//    $doctor_list['0']= tr('DoctorName');
//    foreach ($doctors as $doctor) 
//    {
//      $doctor_list[$doctor->id]=  html_escape($doctor->name.', '.$doctor->address.', '.$doctor->phone);
//    }
//    return $doctor_list;
//  }
//    
///**
//   * _patient_list()
//   * returns a list of doctor to assign the patient to.
//   */ 
//  public function _patient_list()
//  {
//    $this->load->model('patients');
//    $patients = $this->patients->get();
//    $patient_list['0']= tr('PatientName');
//    foreach ($patients as $patient) 
//    {
//      $patient_list[$patient->patient_id]=  html_escape($patient->first_name.', '.$patient->last_name.', '.$patient->address);
//    }
//    return $patient_list;
//  }    
    
    
    
}