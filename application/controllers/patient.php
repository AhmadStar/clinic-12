<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patient extends CI_Controller {
  
  /**
   * Patient::__construct()
   *
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('site');    

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }
  
  /**
   * Patient::index()
   */
  public function index($limit=15,$page=1,$reverse=1)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

    $this->load->model('patients');
    
    $data['patients'] = $this->patients->get(0,0,(int)$reverse);
    $data['title'] = tr('PatientList');    
    $data['navActiveId']='navbarLiPatient';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('patient/index/'.$data['per_page']);
    $config['total_rows'] = count($data['patients']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();
    
    $path='patient/list';
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
   * Patient::status()
   */
  public function status($patient_doctor_id = 0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    if (!($this->bitauth->has_role('doctor')))
    {
      $this->_no_access();
      return;
    }
    
    $this->load->model('patient_doctor');
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'patient_doctor_id', 'label' => 'Transaction ID', 'rules' => 'trim|is_numeric|has_no_schar', ),
        array( 'field' => 'patient_id', 'label' => 'Patient ID', 'rules' => 'trim|is_numeric|has_no_schar', ),
        array( 'field' => 'doctor_id', 'label' => 'Doctor ID', 'rules' => 'trim|is_numeric|has_no_schar', ),
        array( 'field' => 'status', 'label' => 'Status Code', 'rules' => 'trim|is_numeric|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        $patient_doctor=$this->input->post();
//        print_r($patient_doctor);  
        $this->patient_doctor->load($patient_doctor['patient_doctor_id']);
        if($this->patient_doctor->patient_id==$patient_doctor['patient_id'])
        {
          $status_code=$patient_doctor['status'];
          $this->patient_doctor->doctor_id=$patient_doctor['doctor_id'];
          $this->patient_doctor->status=$status_code;
          if($status_code==2) $this->patient_doctor->visit_date=now();
          $this->patient_doctor->save();
          redirect($this->input->post('url'));
        }
      }
    }
  }

  /**
   * Patient::waiting()
   */
  public function waiting($doctor=0 )
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    if (!($this->bitauth->has_role('doctor'))||!($this->bitauth->has_role('receptionist')))
    {
      $this->_no_access();
      return;
    }
    $this->load->model('patient_doctor');
    $this->load->model('patients');
    $this->load->model('doctors');
    
//    if(!$doctor&&$this->bitauth->has_role('doctor',False)) //if doctor==0 and user is a doctor so only show his/her waiting list, admin will see all the list by parameter FALSE
//      $doctor=$this->session->userdata('ba_user_id');
    
    //load doctor waiting list including generals not assigned to any doctor
    $listtest = $this->patient_doctor->get_waiting();
    
//    print_r($listtest);  
    $data['waitings'] = $listtest;    
    $data['title'] = tr('WaitingList');  
    $data['navActiveId']='navbarLiPatient';
    $path='patient/waiting';
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
  
  /*
   * Patient::register
   */
  public function register()
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

    if (!($this->bitauth->has_role('receptionist')))
    {
      $this->_no_access();
      return;
    }
    
    $data = array();
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'last_name', 'label' => 'Last Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'fname', 'label' => 'Father Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'gender', 'label' => 'Gender', 'rules' => 'required', ),
        array( 'field' => 'email', 'label' => 'Email', 'rules' => 'trim|valid_email', ),
        array( 'field' => 'phone', 'label' => 'Phone', 'rules' => 'required|trim', ),
        array( 'field' => 'address', 'label' => 'Address', 'rules' => 'trim', ),
        array( 'field' => 'social_id', 'label' => 'Social ID', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'id_type', 'label' => 'ID Type', 'rules' => 'trim', ),
        array( 'field' => 'doctor', 'label' => 'Doctor Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'memo', 'label' => 'Memo', 'rules' => '', ),
        array( 'field' => 'age', 'label' => 'Age', 'rules' => 'required|is_natural', ),
      ));
      
      if($this->form_validation->run() == TRUE)
      {
        $_doctor = $this->input->post('doctor');
        $birth_date=mktime(0,0,0,date('m'),date('d'),date('Y')-$_POST['age']); //convert age to birth_date
        unset($_POST['submit'],$_POST['doctor'],$_POST['age']); //delete extra post var
        
        //register patient
        $patient=$this->input->post();
        $patient['birth_date']=$birth_date;
        $patient['create_date']=now();
        $this->load->model('patients');
        
        foreach ($patient as $key => $value) {
            $this->patients->$key = $value;
        }
        $this->patients->save();
//        echo $_doctor;
        //assign doctor
        $this->load->model('patient_doctor');
        $this->patient_doctor->patient_id=$this->patients->patient_id;
        $this->patient_doctor->doctor_id=$_doctor;
        $this->patient_doctor->visit_date=now();
        $this->patient_doctor->save();
        
        $this->load->model('doctors');  
        $doc_info=$this->doctors->get_doctor($this->patient_doctor->doctor_id);        
        $data['doc_info']=$doc_info;  
          
        //show patient info
        redirect('patient/ticket/'.$this->patients->patient_id); //show visit ticket to print
        //add financial info (fees)
      }else{
          $data['error'] = validation_errors('<div class="alert alert-danger">','</div>');
      }
    }    
    $data['title'] = tr('RegisterPatient');    
    $data['id_type_options'] = $this->_id_type_options();
    $data['doctor_list']=$this->_doctor_list();
    //print_r($data['doctor_list']);  
    $path='patient/add_patient';
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
   * ticket()
   * prints the initial bill for patient
   */
  public function ticket($patient_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

    $this->load->model('patients');
    $this->load->model('incomes');
    $this->load->model('doctors');
    $this->patients->load($patient_id);
    
    $this->load->model('patient_doctor');
    $this->patient_doctor->get_by_fkey('patient_id',$patient_id);
      // here u should get data from doctor
//    $doc_info=$this->bitauth->get_user_by_id($this->patient_doctor->doctor_id);
    echo $this->patient_doctor->doctor_id;
    $doc_info=$this->doctors->get_doctor($this->patient_doctor->doctor_id);
      
      
    $data['title'] = tr('PatientTicket');
    $data['patient']=$this->patients;
    $data['doctor']=$this->patient_doctor;
    $data['doc_info']=$doc_info;
    $path='account/users';
    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
    {
        $this->load->view($path, $data);
    }else{
        $data['includes']=array('patient/ticket');
        $this->load->view('header', $data);
        $this->load->view('index', $data);
        $this->load->view('footer', $data);
    }
  }

  /*
   * Patient::panel
   * show details
   * tab for comments, drugs, xrays & tests
   * 
   */
  public function panel($patient_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

    $this->load->model('patients');
    $this->patients->load($patient_id);
    
    $this->load->model('patient_doctor');
    $this->patient_doctor->get_by_fkey('patient_id',$patient_id);
    //here u should get doctor info 
    $this->load->model('doctors');
    //echo $this->patient_doctor->doctor_id;
    $doc_info=$this->doctors->get_doctor($this->patient_doctor->doctor_id);
//    print_r($doc_info);


    $this->load->model('comments');
    $comments = 'unauthorized';
    if($this->patient_doctor->doctor_id==0)
      $comments=$this->comments->get_by_fkey('patient_doctor_id',$this->patient_doctor->patient_doctor_id,'desc',0);
    
    $this->load->model('drug_patient');
    $drugs =$this->drug_patient->get_by_fkey('patient_id',$this->patients->patient_id,'asc',0);
    $this->load->model('drugs');
    
    $this->load->model('xray_patient');
    $xrays =$this->xray_patient->get_by_fkey('patient_id',$this->patients->patient_id,'asc',0);
    $this->load->model('xrays');
    
    $this->load->model('lab_patient');
    $lab =$this->lab_patient->get_by_fkey('patient_id',$this->patients->patient_id,'asc',0);
    $this->load->model('lab');
        
    $data['title'] = tr('PatientPanel');        
    $data['patient']=$this->patients;
    $data['doctor']=$this->patient_doctor;
    $data['doc_info']=$doc_info;
    $data['comments']=$comments;
    $data['drugs']=$drugs;
    $data['xrays']=$xrays;
    $data['lab']=$lab;
    
    $path='patient/panel';
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
  
  /*
   * Patient::edit_patient
   */
  public function edit_patient($patient_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

    if (!($this->bitauth->has_role('receptionist')))
    {
      $this->_no_access();
      return;
    }
    $this->load->model('patients');
    $this->patients->load($patient_id);
      
    $data = array();
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'first_name', 'label' => 'First Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'last_name', 'label' => 'Last Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'fname', 'label' => 'Father Name', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'gender', 'label' => 'Gender', 'rules' => 'required', ),
        array( 'field' => 'email', 'label' => 'Email', 'rules' => 'trim|valid_email', ),
        array( 'field' => 'phone', 'label' => 'Phone', 'rules' => 'required|trim', ),
        array( 'field' => 'address', 'label' => 'Address', 'rules' => 'trim', ),
        array( 'field' => 'social_id', 'label' => 'Social ID', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'id_type', 'label' => 'ID Type', 'rules' => 'required|trim', ),
        array( 'field' => 'doctor', 'label' => 'Doctor', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'memo', 'label' => 'Memo', 'rules' => '', ),
        array( 'field' => 'birth_date', 'label' => 'Birth Date', 'rules' => '', ),
        array( 'field' => 'picture', 'label' => 'Picture', 'rules' => '', ),
      ));
    
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$patient_id)
        {
          $doctor=$this->input->post('doctor');
          unset($_POST['doctor'],$_POST['submit']);
          //upload picture
          if($_FILES['picture']['tmp_name'])//check if any picture is selected to upload
          {
            $path='uploads/patient/'.$patient_id.'/profile/';
            $config['upload_path']='./'.$path;
            $config['file_name']='p'.$patient_id.'_profile_picture';
            $config['overwrite']=TRUE;
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['max_size']='100';
            $config['max_width'] = '300';
            $config['max_height'] = '400';
            $this->load->library('upload', $config);
            
            if ( !$this->upload->do_upload('picture'))
            {
              $data['error'] = $this->upload->display_errors('<div class="alert alert-danger">','</div>');
            }
            else
            {
              $data['upload_data'] = $this->upload->data();
              $_POST['picture']=$path.$data['upload_data']['file_name'];
              if(isset($this->patients->picture) && !($this->patients->picture==$_POST['picture'])) //delete picture if it is not overwritten
                unlink('./'.$this->patients->picture);
            }
          }
          //update patient
          $patient = $this->input->post();
          foreach ($patient as $key => $value)
            $this->patients->$key = $value;
          $this->patients->birth_date=strtotime($this->input->post('birth_date'));
          $this->patients->save();
          
          //update patient doctor
          $this->load->model('patient_doctor');
          $this->patient_doctor->load($session_check[1]);
          $this->patient_doctor->patient_id=$patient_id;
          $this->patient_doctor->visit_date=now();
          $this->patient_doctor->doctor_id=$doctor;
          if($this->patient_doctor->status==1) $this->patient_doctor->status=0;
          $this->patient_doctor->save();
          
          redirect('patient');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error'] = validation_errors();
      }
    }
    $this->load->model('patient_doctor');
    $this->patient_doctor->get_by_fkey('patient_id',$patient_id);
    $this->session->set_userdata(current_url(),array($patient_id,$this->patient_doctor->patient_doctor_id));
        
    $data['title'] = tr('EditPatient');      
    $data['patient']=$this->patients;
    $data['doctor']=$this->patient_doctor->doctor_id;
    $data['doctor_list']=$this->_doctor_list();
    $data['id_type_options'] = $this->_id_type_options();
    $path='patient/edit_patient';
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
//  public function _doctor_list()
//  {
//    $doctors = $this->bitauth->get_users_by_role('doctor');
//    $doctor_list=array();
//    $doctor_list[0]='Doctor Name';
//    foreach ($doctors as $_doctor) 
//    {
//      $doctor_list[$_doctor->user_id]=$_doctor->last_name.', '.$_doctor->first_name;
//    }
//    return $doctor_list;
//  }

    
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
   * _id_type_options()
   * returns the array of id_type
   */
  public function _id_type_options()
  {
    return array('Tazkara'=>'Tazkara',
                 'Passport'=>'Passport',
                 'Driver License'=>'Driver License',
                 'Bank ID Card'=>'Bank ID Card', );
  }
  
  /**
   * account::_no_access()
   *
   */
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
}

/* End of file patient.php */
/* Location: ./application/controllers/patient.php */