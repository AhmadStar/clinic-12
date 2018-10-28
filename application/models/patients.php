<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');

class Patients extends MY_Model {
    
    const DB_TABLE = 'patients';
    const DB_TABLE_PK = 'patient_id';
    
    /**
     * Unique identifire.
     * @var int
     */
    public $patient_id;
    
    /**
     * First name.
     * @var int
     */
    public $first_name;
    
    /**
     * Last name.
     * @var int
     */
    public $last_name;
    
    /**
     * Father name.
     * @var int
     */
    public $fname;
    
    /**
     * Father name.
     * @var int
     */
    public $gender;
    
    /**
     * Father name.
     * @var int
     */
    public $email;
    
    /**
     * Father name.
     * @var int
     */
    public $phone;
    
    /**
     * Father name.
     * @var int
     */
    public $address;
    
    /**
     * Father name.
     * @var int
     */
    public $social_id;
    
    /**
     * Father name.
     * @var int
     */
    public $id_type;
    
    /**
     * Father name.
     * @var int
     */
    public $birth_date;
    
    /**
     * Father name.
     * @var int
     */
    public $create_date;
    
    /**
     * Path of picture file.
     * @var string
     */
    public $picture;
    
    /**
     * Memo and aditional Info.
     * @var string
     */
    public $memo;
    
    
	var $column_order = array(null, 'patient_id','first_name','last_name','fname','gender','email','phone','address','social_id','id_type','birth_date','create_date','picture','picture'); //set column field database for datatable orderable
    var $column_search = array( 'patient_id','first_name','last_name','fname','gender','email','phone','address','social_id','id_type','birth_date','create_date','picture','picture'); //set column field database for datatable orderable
//    var $table = 'patients';
//	var $column_search = array('id','name','address','phone','created_date'); //set column field database for datatable searchable 
	var $order = array('patient_id' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		//add custom filter here		
		if($this->input->post('first_name'))
		{
			$this->db->like('first_name', $this->input->post('first_name'));
		}
        if($this->input->post('last_name'))
		{
			$this->db->like('last_name', $this->input->post('last_name'));
		}
        if($this->input->post('fname'))
		{
			$this->db->like('fname', $this->input->post('fname'));
		}
		if($this->input->post('fname'))
		{
			$this->db->like('fname', $this->input->post('fname'));
		}
		if($this->input->post('phone'))
		{
			$this->db->like('phone', $this->input->post('phone'));
		}
        if($this->input->post('creat_date'))
		{
			$this->db->like('creat_date', $this->input->post('creat_date'));
		}

		$this->db->from('patients');
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from('patients');
		return $this->db->count_all_results();
	}
}