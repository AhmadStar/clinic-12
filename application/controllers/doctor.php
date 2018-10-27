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
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['title'] = tr('DoctorsList');
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
    
  public function ajax_list()
  {
        $this->load->model('Doctors_model','doctors');
		$list = $this->doctors->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $doctors) {
			$no++;
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $doctors->name;
			$row[] = $doctors->address;
			$row[] = $doctors->phone;			
			$row[] = $doctors->created_date;
            
            $actions .= anchor('doctor/edit/'.$doctors->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditDoctor')));
            $actions .= anchor('doctor/delete/'.$doctors->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Doctor'));
            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->doctors->count_all(),
						"recordsFiltered" => $this->doctors->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}    
    
    public function total()
  {      
        $this->load->model('Consumes','consumes');
        $this->load->model('Doctors_model','doctors');        
		$data = $this->consumes->get_total();
		
		$output = array(						
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
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
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.html_escape($this->doctors->name).' '.tr('successfuly').'");</script>';
//            redirect('doctor');
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

          $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.html_escape($this->doctors->name).' '.tr('successfuly').'");</script>';
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