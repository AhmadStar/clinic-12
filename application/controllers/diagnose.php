<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diagnose extends CI_Controller {
  
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
    
    $this->load->model('diagnoses');
    
    $data['diagnoses'] = $this->diagnoses->get_all_diagnoses();    
    $data['title'] = tr('DiagnoseList');  
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('diagnose/index/'.$data['per_page']);
    $config['total_rows'] = count($data['diagnoses']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    
      
    $data['type_options'] = $this->type_options();  
    $path='diagnose/list';
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
  public function edit($diagnose_id=0)
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
    $this->load->model('diagnoses');
    $data['diagnose'] = $this->diagnoses->get_one_diagnose($diagnose_id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'diagnose_name_en', 'label' => 'Drug Name in English', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'diagnose_name_ar', 'label' => 'Drug Name in Arabic', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'description', 'label' => 'Description', 'rules' => 'trim', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$diagnose_id)
        {
            unset($_POST['submit']);
            $diagnose=$this->input->post();
            $this->load->model('diagnoses');
             $data_to_store = array(
                    'diagnose_name_en' => $this->input->post('diagnose_name_en'),
                    'diagnose_name_ar' => $this->input->post('diagnose_name_ar'),
                    'description' => $this->input->post('description'),
                    
                );
            $this->diagnoses->update_diagnose($diagnose_id,$data_to_store);
            
            unset($_POST);+
                
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '. html_escape($diagnose['diagnose_name_en']).' '.tr('successfuly').'");</script>';
            //redirect('diagnose');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($diagnose_id));    
    $data['title'] = tr('EditDiagnose');    
    
    
      $path='diagnose/edit';
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
  public function delete($diagnose_id=0)
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
    $this->load->model('diagnoses');
    $data['diagnose'] = $this->diagnoses->get_one_diagnose($diagnose_id);
    
    if($this->input->post())
    {         
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id') == $diagnose_id)          
      {        
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$diagnose_id)
        {
                $this->diagnoses->delete_diagnose($diagnose_id);
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
    $this->session->set_userdata(current_url(),array($diagnose_id));
      
    print_r($data);
    $this->load->view('diagnose/confirm_delete',$data);
  }
  
  /*
   * 
   */
  public function new_diagnose()
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
        array( 'field' => 'diagnose_name_en', 'label' => 'Drug Name in English', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'diagnose_name_ar', 'label' => 'Drug Name in Arabic', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'description', 'label' => 'Description', 'rules' => 'trim', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $income=$this->input->post();          
        $this->load->model('diagnoses');        
        $data_to_store = array(
                    'diagnose_name_en' => $this->input->post('diagnose_name_en'),
                    'diagnose_name_ar' => $this->input->post('diagnose_name_ar'),
                    'description' => $this->input->post('description'),
                    
                );
        $this->diagnoses->save_diagnose($data_to_store);
        unset($_POST);
//        $data['script'] = '<script>alert("'. html_escape($this->diagnoses->diagnose_name_en). ' has been registered successfuly.");</script>';
          $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.html_escape($diagnose['diagnose_name_en']).' '.tr('successfuly').'");</script>';
        redirect('diagnose');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewDiagnose');
      
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='diagnose/new';
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
    return array('0'=> tr('IncomeType'),
                 'static'=>'معاينة ثابتة',
                 'normal'=>'معاينة عادية',);
  }
    
    
  public function search()
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if($this->input->post())
    {
        $this->load->model('diagnoses');
        $q=$this->input->post('q');
        $diagnoses=$this->diagnoses->search(array('diagnose_name_en'=>$q,'diagnose_name_en'=>$q));
        $data['diagnoses']=$diagnoses;
        $this->load->view('diagnose/result',$data);
        return TRUE;
    }
    $data['title']=tr('DiagnoseSearch');
    $this->load->view('diagnose/search');
  }    
    
    
  public function assign()
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!($this->bitauth->has_role('doctor')||$this->bitauth->has_role('lab')))
    {
      $this->_no_access();
      return;
    }
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'diagnose_id', 'label' => 'Diag ID', 'rules' => 'required|is_numeric', ),
        array( 'field' => 'patient_id', 'label' => 'Patient ID', 'rules' => 'required|is_numeric', ),
        array( 'field' => 'result', 'label' => 'Result', 'rules' => 'required|is_numeric', ),
//        array( 'field' => 'no_of_item', 'label' => 'Number of Item', 'rules' => 'required|is_numeric', ),
//        array( 'field' => 'total_cost', 'label' => 'Total Cost', 'rules' => 'required|is_numeric', ),
//        array( 'field' => 'memo', 'label' => 'Memo', 'rules' => 'trim', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        $this->load->model('diagnose_patient');
        unset($_POST['submit']);
        foreach ($this->input->post() as $key => $value)
            echo $this->diagnose_patient->$key = $value;
//           print_r($this->input->post());
          
          
//        print_r($this->diagnose_patient);  
        $this->diagnose_patient->user_id_assign=$this->session->userdata('ba_user_id');
        $this->diagnose_patient->assign_date=now();
        print_r($this->diagnose_patient);
        $this->diagnose_patient->save();
        $this->load->model('diagnoses');
        $this->diagnoses->load($this->diagnose_patient->diagnose_id);
        
        echo '<tr id="dpi'.$this->diagnose_patient->diagnose_patient_id.'"><td class="id"></td>'.
            '<td>'.$this->diagnoses->diagnose_name_en.'</td>'.
            '<td>'.$this->diagnoses->diagnose_name_ar.'</td>'.
//            '<td>'.$this->diagnoses->price.'</td>'.
            '<td>'.$this->diagnose_patient->no_of_item.'</td>'.
            '<td>'.$this->diagnose_patient->total_cost.'</td>'.
            '<td class="actions">'.anchor('#', 'Delete ',array('dpi'=>$this->diagnose_patient->diagnose_patient_id,'di'=>$this->diagnose_patient->diagnose_id,'pi'=>$this->diagnose_patient->patient_id,'tc'=>$this->diagnose_patient->total_cost,'action'=>'delete'));
            if($this->bitauth->has_role('receptionist')) echo anchor('#', 'Pay ',array('dpi'=>$this->diagnose_patient->diagnose_patient_id,'di'=>$this->diagnose_patient->diagnose_id,'pi'=>$this->diagnose_patient->patient_id,'tc'=>$this->diagnose_patient->total_cost,'action'=>'pay'));
            echo '</td></tr>';
        return;
      }
      else{
        
      }
    }
  }
    
    
  
  public function payment($lab_patient_id)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('receptionist'))
    {
      $this->_no_access();
      return;
    }
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'lab_patient_id', 'label' => 'ID', 'rules' => 'required|trim|is_numeric|has_no_schar', ),
        array( 'field' => 'test_id', 'label' => 'Drug ID', 'rules' => 'required|trim|is_numeric|has_no_schar', ),
        array( 'field' => 'patient_id', 'label' => 'Patient ID', 'rules' => 'required|trim|is_numeric|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE && $this->input->post('lab_patient_id')==$lab_patient_id)
      {
        $this->load->model('lab_patient');
        $this->lab_patient->load($this->input->post('lab_patient_id'));
        if($this->lab_patient->test_id==$this->input->post('test_id') &&
           $this->lab_patient->patient_id==$this->input->post('patient_id') &&
           $this->lab_patient->user_id_discharge==NULL &&
           $this->lab_patient->discharge_date==NULL)
        {
          $this->lab_patient->user_id_discharge=$this->session->userdata('ba_user_id');
          $this->lab_patient->discharge_date=now();
          $this->lab_patient->save();
          unset($_POST);
          echo 'ok';
        }else{
          echo 'mismatch';
        }
      }else{
          echo 'invalid';
      }
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
    $doctor_list['0']= tr('DoctorName');
    foreach ($doctors as $doctor) 
    {
      $doctor_list[$doctor->id]=  html_escape($doctor->name.', '.$doctor->address.', '.$doctor->phone);
    }
    return $doctor_list;
  }
    
/**
   * _patient_list()
   * returns a list of doctor to assign the patient to.
   */ 
  public function _patient_list()
  {
    $this->load->model('patients');
    $patients = $this->patients->get();
    $patient_list['0']= tr('PatientName');
    foreach ($patients as $patient) 
    {
      $patient_list[$patient->patient_id]=  html_escape($patient->first_name.', '.$patient->last_name.', '.$patient->address);
    }
    return $patient_list;
  }    
    
    
    
}