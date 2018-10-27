<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dailyincome extends CI_Controller {
  
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
    
    $this->load->helper('url');
    $this->load->helper('form');
    $data['doctor_list']=$this->_doctor_list();
    $data['title'] = tr('DailyIncomeList');
    $path='dailyincome/list';
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
        $this->load->model('Dailyincomes','dailyincome');
        $this->load->model('Doctors_model','doctors');        
		$list = $this->dailyincome->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $dailyincome) {
			$no++;
            $doctor_name = $this->doctors->get_doctor_name($dailyincome->doctor_id);
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $doctor_name[0]->name;
			$row[] = $dailyincome->date;
			$row[] = $dailyincome->amount;						
            
            $actions .= anchor('dailyincome/edit/'.$dailyincome->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditDoctor')));

            $actions .= anchor('dailyincome/delete/'.$dailyincome->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete dailyIncome'));            

            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dailyincome->count_all(),
						"recordsFiltered" => $this->dailyincome->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}     
    
  public function total()
  {      
        $this->load->model('Dailyincomes','dailyincome');
        $this->load->model('Doctors_model','doctors');        
		$data = $this->dailyincome->get_total();
		
		$output = array(						
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}      
    
  /**
   * Patient::edit()
   */
  public function edit($dailyincome_id=0)
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
    $this->load->model('dailyincomes');
    $data['dailyincome'] = $this->dailyincomes->get_one_dailyincome($dailyincome_id);
    
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'doctor_id','label' => 'Doctor Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'date', 'label' => 'Date', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'amount', 'label' => 'Amount', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$dailyincome_id)
        {
            unset($_POST['submit']);
            $dailyincome=$this->input->post();            
            $this->load->model('dailyincomes');
             $data_to_store = array(
                    'doctor_id' => $this->input->post('doctor_id'),
                    'date' => $this->input->post('date'),
                    'amount' => $this->input->post('amount'),
                );
            $this->dailyincomes->update_dailyincome($dailyincome_id,$data_to_store);
            
            unset($_POST);
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.tr('DailyIncomeInformation').' '.tr('successfuly').'");</script>';
           // redirect('dailyincome');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($dailyincome_id));    
    $data['title'] = tr('EditdailyIncome'); 
    $data['doctor_list']= $this->_doctor_list();
    
      $path='dailyincome/edit';
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
  public function delete($dailyincome_id=0)
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
    $this->load->model('dailyincomes');
    $data['dailyincome'] = $this->dailyincomes->get_one_dailyincome($dailyincome_id);
    
    if($this->input->post())
    {         
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id') == $dailyincome_id)          
      {        
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$dailyincome_id)
        {
                $this->dailyincomes->delete_dailyincome($dailyincome_id);
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
    $this->session->set_userdata(current_url(),array($dailyincome_id));
//    $data['income']=$this->incomes;
    //$data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    //$data['includes']=array('drug/delete');
      
//    print_r($data);
    $this->load->view('dailyincome/confirm_delete',$data);
    //$this->load->view('header',$data);
    //$this->load->view('index',$data);
    //$this->load->view('footer',$data);
  }
  
  /*
   * 
   */
  public function new_dailyincome()
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
        array( 'field' => 'date', 'label' => 'date', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'amount', 'label' => 'amount', 'rules' => 'required|trim|has_no_schar', ),
      ));
        
        
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $dailyincome=$this->input->post();          
        $this->load->model('dailyincomes');        
        $data_to_store = array(
                    'doctor_id' => $this->input->post('doctor_id'),
                    'date' => $this->input->post('date'),
                    'amount' => $this->input->post('amount'),
                );
        $this->dailyincomes->save_dailyincome($data_to_store);
        unset($_POST);
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.tr('newDailyIncome').' '.tr('successfuly').'");</script>';
//          $data['script'] = '<script>alert("'. html_escape($this->$dailyincome->name). ' has been registered successfuly.");</script>';
       // redirect('dailyincome');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewdailyIncome');      
    $data['doctor_list']=$this->_doctor_list();
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='dailyincome/new';
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
    $doctor_list['0']= tr('DoctorName');
    foreach ($doctors as $doctor) 
    {
      $doctor_list[$doctor->id]=  html_escape($doctor->name.', '.$doctor->address.', '.$doctor->phone);
    }
    return $doctor_list;
  }
       
    
    
    
}