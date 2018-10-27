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
    
    $this->load->helper('url');
    $this->load->helper('form');

    $data['doctor_list']=$this->_doctor_list();   
    $data['title'] = tr('ConsumeList');
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
  
  
  public function ajax_list()
  {      
        $this->load->model('Consumes','consumes');
        $this->load->model('Doctors_model','doctors');        
		$list = $this->consumes->get_datatables();
		$data = array();
		$no = $_POST['start'];        
		foreach ($list as $consumes) {
			$no++;
            $doctor_name = $this->doctors->get_doctor_name($consumes->doctor_id);
            $actions = '';
			$row = array();
			$row[] = $no;
			$row[] = $doctor_name[0]->name;
			$row[] = $consumes->name;
            $row[] = $consumes->price;			
			$row[] = $consumes->date;			
            
            $actions .= anchor('consume/edit/'.$consumes->id, '<span class="glyphicon glyphicon-edit"></span>',array('title'=>tr('EditConsume')));
            $actions .= anchor('consume/delete/'.$consumes->id, '<span class="glyphicon glyphicon-remove"></span>',array('title'=>'Delete Consume'));            
            
            $row[] = $actions;

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->consumes->count_all(),
						"recordsFiltered" => $this->consumes->count_filtered(),
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
            $data['script'] = '<script>alert("'.tr('hasbeenupdated').' '.html_escape($this->consumes->name).' '.tr('successfuly').'");</script>';
            //redirect('consume');
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
            $this->consumes->delete();
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
    $this->session->set_userdata(current_url(),array($consume_id));
    $data['consume']=$this->consumes;
    $this->load->view('consume/confirm_delete',$data);

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
        $data['script'] = '<script>alert("'.tr('hasbeenregistered').' '.html_escape($this->consumes->name).' '.tr('successfuly').'");</script>';
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
    $doctor_list['0']=tr('DoctorName');
    foreach ($doctors as $doctor) 
    {
      $doctor_list[$doctor->id]=  html_escape($doctor->name.', '.$doctor->address.', '.$doctor->phone);
    }
    return $doctor_list;
  }
}
