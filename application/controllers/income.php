<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Income extends CI_Controller {
  
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
   * Income::index()
   */
  public function index($limit = 15,$page = 1)
  {

      
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['doctor_list']=$this->_doctor_list();   
    $data['title'] = tr('IncomeList');
    $path='income/list';
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
  
    
  public function ajax_list()
  {      
        $this->load->model('Incomes','incomes');
        $this->load->model('Doctors_model','doctors');        
		$list = $this->incomes->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $incomes) {
			$no++;
            $doctor_name = $this->doctors->get_doctor_name($incomes->doctor_id);
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $doctor_name[0]->name;
			$row[] = $incomes->amount;
			$row[] = $incomes->date;			
            
            $actions .= anchor('income/edit/'.$incomes->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditIncome')));
            $actions .= anchor('income/delete/'.$incomes->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Income'));            
            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->incomes->count_all(),
						"recordsFiltered" => $this->incomes->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}    
    
  public function total()
  {      
        $this->load->model('Incomes','incomes');
        $this->load->model('Doctors_model','doctors');        
		$data = $this->incomes->get_total();
		
		$output = array(						
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}        
    
  /**
   * Patient::edit()
   */
  public function edit($income_id=0)
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
        array( 'field' => 'doctor_id','label' => 'doctor Name', 'rules' => 'required|trim|has_no_schar', ),
//        array( 'field' => 'patient_id','label' => 'patient Name', 'rules' => 'required|trim|has_no_schar', ),
//        array( 'field' => 'type', 'label' => 'type', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'amount', 'label' => 'amount', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$income_id)
        {
            unset($_POST['submit']);
            $income=$this->input->post();
            $this->load->model('incomes');
             $data_to_store = array(
                    'doctor_id' => $this->input->post('doctor_id'),
//                    'patient_id' => $this->input->post('patient_id'),
//                    'type' => $this->input->post('type'),
                    'amount' => $this->input->post('amount'),                    
                );
            $this->incomes->update_income($income_id,$data_to_store);
            
            unset($_POST);

            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.tr('IncomeInformation').' '.tr('successfuly').'");</script>';
           // redirect('income');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($income_id));    
    $data['title'] = tr('EditIncome');    
//    $data['type_options'] = $this->type_options();
    $data['doctor_list']= $this->_doctor_list();
//    $data['patient_list']= $this->_patient_list();
    
      $path='income/edit';
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

    $this->load->view('income/confirm_delete',$data);

  }
  
  /*
   * 
   */
  public function new_income()
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
        array( 'field' => 'doctor_id','label' => 'doctor Name', 'rules' => 'required|trim|has_no_schar', ),
//        array( 'field' => 'patient_id','label' => 'patient Name', 'rules' => 'required|trim|has_no_schar', ),
//        array( 'field' => 'type', 'label' => 'type', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'amount', 'label' => 'amount', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'date', 'label' => 'date', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $income=$this->input->post();          
        $this->load->model('incomes');        
        $data_to_store = array(
                    'doctor_id' => $this->input->post('doctor_id'),
//                    'patient_id' => $this->input->post('patient_id'),
//                    'type' => $this->input->post('type'),
                    'amount' => $this->input->post('amount'),
                    'date' => $this->input->post('date'),
                );
        $this->incomes->save_income($data_to_store);
        unset($_POST);
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.tr('DoctorIncome').' '.tr('successfuly').'");</script>';
//        redirect('income');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewIncomes');      
//    $data['type_options'] = $this->type_options();
    $data['doctor_list']=$this->_doctor_list();      
//    $data['patient_list']=$this->_patient_list();      
      
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='income/new';
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
//  public function type_options()
//  {
//    return array('0'=> tr('IncomeType'),
//                 'static'=>'معاينة ثابتة',
//                 'normal'=>'معاينة عادية',);
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
   * _patient_list()
   * returns a list of doctor to assign the patient to.
   */ 
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