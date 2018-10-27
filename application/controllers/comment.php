<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller {
  
  /**
   * Comment::__construct()
   *
   */
  public function __construct()
  {
    parent::__construct();

    $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
  }
  
  /**
   * Comment::index()
   */
  public function index($patient_id=0,$page = 1, $limit = 15)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }

  }
  
  /*
   * Comment::add()
   * 
   */
  public function add($patient_doctor_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('doctor'))
    {
      return;
    }
    $this->load->model('comments');
    $this->load->model('patient_doctor');
    echo "dsad";
    if($this->input->post())
    {
        echo "post";
      $this->form_validation->set_rules(array(
        array( 'field' => 'patient_doctor_id', 'label' => 'Patient Doctor ID', 'rules' => 'required|has_no_schar', ),
        array( 'field' => 'patient_id', 'label' => 'Patient ID', 'rules' => 'required|has_no_schar', ),
        array( 'field' => 'comment', 'label' => 'Comment', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'spressur', 'label' => 'spressur', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'ppressure', 'label' => 'ppressure', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'hrate', 'label' => 'hrate', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'heate', 'label' => 'heate', 'rules' => 'trim|has_no_schar', ),
        array( 'field' => 'oxidation', 'label' => 'oxidation', 'rules' => 'trim|has_no_schar', ),
      ));

      if($this->form_validation->run())
      {
        $this->patient_doctor->load($patient_doctor_id);

        $this->comments->patient_doctor_id=$this->input->post('patient_doctor_id');
        $this->comments->comment=$this->input->post('comment');
        $this->comments->spressur=$this->input->post('spressur');
        $this->comments->ppressure=$this->input->post('ppressure');
        $this->comments->hrate=$this->input->post('hrate');
        $this->comments->heate=$this->input->post('heate');
        $this->comments->oxidation=$this->input->post('oxidation');
        $this->comments->nbreathing=$this->input->post('nbreathing');
        $this->comments->create_date=now();
        $this->comments->last_edit_time=now();
        $this->comments->save();

        redirect('patient/panel/'.$this->input->post('patient_id'));
      }else{
          echo "for validation error";
          echo "---";
          echo $this->input->post('patient_doctor_id');
          echo $this->input->post('patient_id');
         
      }
    }
  }
  
  /*
   * Comment::edit()
   * 
   */
  public function edit($comment_id=0)
  {
    if (!$this->bitauth->logged_in())
    {
      $this->session->set_userdata('redir', current_url());
      redirect('account/login');
    }
    if(!$this->bitauth->has_role('doctor'))
    {
      return;
    }
    $this->load->model('comments');
    $this->load->model('patient_doctor');
    if($this->input->post())
    {
      $this->form_validation->set_rules(array(
        array( 'field' => 'comment_id', 'label' => 'Comment ID', 'rules' => 'required|is_numeric', ),
        array( 'field' => 'patient_doctor_id', 'label' => 'Patient Doctor ID', 'rules' => 'required|is_numeric', ),
        array( 'field' => 'comment', 'label' => 'Comment', 'rules' => 'trim|required|has_no_schar', ),
      ));
      if($this->form_validation->run() == TRUE && 
         $comment_id==$this->input->post('comment_id'))
      {
        $this->comments->load($comment_id);
        $this->patient_doctor->load($this->comments->patient_doctor_id);
        $this->comments->comment=$this->input->post('comment');
        $this->comments->last_edit_time=now();
        $this->comments->save();
        $data['comment']=$this->comments;
        $this->load->view('patient/comment',$data);
      }
    }
  }
}

/* End of file patient.php */
/* Location: ./application/controllers/patient.php */