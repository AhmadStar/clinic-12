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
   * Nurse::index()
   */
  public function index($limit = 15,$page = 1)
  {
//    if (!$this->bitauth->logged_in())
//    {
//      $this->session->set_userdata('redir', current_url());
//      redirect('account/login');
//    }
//    
//    $this->load->model('nurses');
//      
//    $data['nurses'] = $this->nurses->get_all_nurses();
//      
//    $data['title'] = tr('NursesList');  
//    $data['navActiveId']='navbarLiDrug';
//    
//    $data['page'] = (int)$page;
//    $data['per_page'] = (int)$limit;
//    $this->load->library('pagination');
//    $this->load->library('my_pagination');
//    $config['base_url'] = site_url('nurse/index/'.$data['per_page']);
//    $config['total_rows'] = count($data['nurses']);
//    $config['per_page'] = $data['per_page'];
//    $this->my_pagination->initialize($config); 
//    $data['pagination']=$this->my_pagination->create_links();
//    
//
//    $path='nurse/list';
//    if(isset($_GET['ajax'])&&$_GET['ajax']==true)
//    {
//        $this->load->view($path, $data);
//    }else{
//        $data['includes']=array($path);
//        $this->load->view('header',$data);
//        $this->load->view('index',$data);
//        $this->load->view('footer',$data);
//    }
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['title'] = tr('IncomeList');
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
    
    
  public function ajax_list()
  {      
        $this->load->model('Nurses','nurses');
//        $this->load->model('Doctors_model','doctors');        
		$list = $this->nurses->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $nurses) {
			$no++;            
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $nurses->name;
			$row[] = $nurses->age;
			$row[] = $nurses->phone;
			$row[] = $nurses->address;			
            
            $actions .= anchor('nurse/edit/'.$nurses->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Edit Nurse'));
            $actions .= anchor('nurse/delete/'.$nurses->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Nurse'));
            $actions .= anchor('nurse/nurseschedule/'.$nurses->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Nurse Hours Work'));
            $actions .= anchor('nurse/nurseincentive/'.$nurses->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>'Nurse Incentives'));            
            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->nurses->count_all(),
						"recordsFiltered" => $this->nurses->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}    
    
          
  
  /**
   * Nurse::edit()
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
//        $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.html_escape($this->nurses->name).' '.tr('successfuly').'");</script>';
//        $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '. html_escape($nurse['name']).' '.tr('successfuly').'");</script>';
        $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.tr('successfuly').'");</script>';
            
 //       redirect('nurse');
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
  public function delete($nurse_id=0)
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
    
    if($this->input->post())
    {         
      $this->form_validation->set_rules(array(
        array( 'field' => 'id', 'label' => 'ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'del', 'label' => '', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE&&
         $this->input->post('id') == $nurse_id)          
      {        
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$nurse_id)
        {
                $this->nurses->delete_nurse($nurse_id);
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
    $this->session->set_userdata(current_url(),array($nurse_id));
//    $data['income']=$this->incomes;
    //$data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    //$data['includes']=array('drug/delete');
      
//    print_r($data);
    $this->load->view('nurse/confirm_delete',$data);
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
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.html_escape($nurse['name']).' '.tr('successfuly').'");</script>';
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewNurse');      
      
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

  
  /*
   * 
   */
  public function new_schedule()
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
        array( 'field' => 'nurse_id','label' => 'Nurse Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'work_date','label' => 'Work Date', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'work_hours', 'label' => 'Work Hours', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'hour_price', 'label' => 'Hour Price', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $nurse=$this->input->post();          
        $this->load->model('nurses');        
        $data_to_store = array(
                    'nurse_id' => $this->input->post('nurse_id'),
                    'work_date' => $this->input->post('work_date'),
                    'work_hours' => $this->input->post('work_hours'),
                    'hour_price' => $this->input->post('hour_price'),
                );
        $this->nurses->save_nurse_schedule($data_to_store);
        unset($_POST);
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.tr('newschedule').' '.tr('successfuly').'");</script>';
//       redirect('nurse');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewNurseSchedule');      
      
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='nurse/new_schedule';
    $data['nurse_list']=$this->_nurse_list();  
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
    
    
   public function new_incentive()
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
        array( 'field' => 'nurse_id','label' => 'Nurse Name', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'amount','label' => 'Incentive amount', 'rules' => 'required|trim|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE)
      {
        
        unset($_POST['submit']);
        $nurse=$this->input->post();          
        $this->load->model('nurses');        
        $data_to_store = array(
                    'nurse_id' => $this->input->post('nurse_id'),
                    'amount' => $this->input->post('amount'),
                );
        $this->nurses->save_nurse_incentive($data_to_store);
        unset($_POST);
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.tr('newIncentive').' '.tr('successfuly').'");</script>';
       // redirect('nurse');
      }else{
        $data['error']=validation_errors();
      }
    }    
    $data['title'] = tr('NewNurseIncentive');      
      
    $data['css'] = "<style>.form-group{margin-bottom:0px;} .form-group .form-control{margin-bottom:10px;}</style>";
    $path='nurse/new_incentive';
    $data['nurse_list']=$this->_nurse_list();  
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
   * _patient_list()
   * returns a list of doctor to assign the patient to.
   */ 
  public function _nurse_list()
  {
    $this->load->model('nurses');
    $nurses = $this->nurses->get_all_test();
    $nurse_list['0']= tr('NurseName');
    foreach ($nurses as $nurse) 
    { 
       html_escape($nurse->name);
      $nurse_list[$nurse->id]=  html_escape($nurse->name.','.$nurse->address);
    }
    return $nurse_list;
  }
    
    
 public function nurseschedule($nurse_id=0 , $limit = 12,$page = 1)
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
    
    $this->load->model('nurses');    
    
    $data['nurseschedules'] = $this->nurses->get_all_nurse_schedule($nurse_id);      
      
    $data['title'] = tr('NurseSceduleList');      
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('nurse/nurseschedule/'.$nurse_id.'/'.$data['per_page']);
    $config['total_rows'] = count($data['nurseschedules']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();        
    $path='nurse/nurse_schedule';
//    print_r($data['nurseschedules']);
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

 public function nurseincentive($nurse_id=0 , $limit = 12,$page = 1)
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
    
    $this->load->model('nurses');    
    
    $data['nurseincentives'] = $this->nurses->get_all_nurse_incentive($nurse_id);      
    $incentives = $this->nurses->get_sum_of_nurse_incentives($nurse_id);
    $data['allincentives'] = $incentives[0]['amount'];
    $data['title'] = tr('NurseIncetivesList');      
    $data['navActiveId']='navbarLiDrug';
    
    $data['page'] = (int)$page;
    $data['per_page'] = (int)$limit;
    $this->load->library('pagination');
    $this->load->library('my_pagination');
    $config['base_url'] = site_url('nurse/nurseincentive/'.$nurse_id.'/'.$data['per_page']);
    $config['total_rows'] = count($data['nurseincentives']);
    $config['per_page'] = $data['per_page'];
    $this->my_pagination->initialize($config); 
    $data['pagination']=$this->my_pagination->create_links();        
    $path='nurse/nurse_incentive';
//    print_r($data['nurseschedules']);
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
    
 public function editincentive($id=0)
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
    $data['incentive'] = $this->nurses->get_one_incentive($id);
    //print_r($data['nurse']);
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
//        array( 'field' => 'nurse_id','label' => 'Nurse ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'amount','label' => 'Incentive Amount', 'rules' => 'required|trim|has_no_schar', ),

      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$id)
        {
            unset($_POST['submit']);
            $nurse=$this->input->post();
            $this->load->model('nurses');
             $data_to_store = array(
//                    'nurse_id' => $this->input->post('nurse_id'),                   
                    'amount' => $this->input->post('amount'),                   
                );
            $this->nurses->update_incentive($id,$data_to_store);
            
            unset($_POST);
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.tr('nurseIncentiveInformations').' '/*. html_escape($nurse['name']).' '*/.tr('successfuly').'");</script>';
       //     redirect('nurse');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($id));    
    $data['title'] = tr('EditNurse');    
    
      $path='nurse/editincentive';
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
    
 public function editschedule($id=0)
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
    $data['schedule'] = $this->nurses->get_one_schedule($id);
    //print_r($data['nurse']);
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
//        array( 'field' => 'nurse_id','label' => 'Nurse ID', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'work_date','label' => 'Work Date', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'work_hours','label' => 'Work Hours', 'rules' => 'required|trim|has_no_schar', ),
        array( 'field' => 'hour_price','label' => 'Hour Price', 'rules' => 'required|trim|has_no_schar', ),

      ));
      if($this->form_validation->run() == TRUE)
      {
        //check if patient form already loaded from this app -> should be checked with session
        $session_check=$this->session->userdata(current_url());
        $this->session->unset_userdata(current_url());
        if($session_check && $session_check[0]==$id)
        {
            unset($_POST['submit']);
            $nurse=$this->input->post();
            $this->load->model('nurses');
             $data_to_store = array(
//                    'nurse_id' => $this->input->post('nurse_id'),                   
                    'work_date' => $this->input->post('work_date'),
                    'work_hours' => $this->input->post('work_hours'),
                    'hour_price' => $this->input->post('hour_price'),
                );
            $this->nurses->update_schedule($id,$data_to_store);
            
            unset($_POST);
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.tr('nurseScheduleInformations').' '/*. html_escape($nurse['name']).' '*/.tr('successfuly').'");</script>';
          //   redirect('nurse');
        }else{
          //user may have sent the form to a url other than the original
          $data['error'] = '<div class="alert alert-danger">Form URL Error</div>';
        }
      }else{
        $data['error']=validation_errors();
      }
    }      
      
    $this->session->set_userdata(current_url(),array($id));    
    $data['title'] = tr('EditNurse');    
    
      $path='nurse/editschedule';
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
    
}
