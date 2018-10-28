<?php

class Incomes extends CI_Model {
    
    
    var $table = 'incomes';
	var $column_order = array(null, 'id','doctor_id','amount','date',); //set column field database for datatable orderable
	var $column_search = array('id','doctor_id','amount','date'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    const DB_TABLE = 'incomes';
    const DB_TABLE_PK = 'id';
    
    /**
     * Table unique identifier.
     * @var int
     */
    public $id;
    
    /**
     * Item Name in English.
     * @var string
     */
    public $type;
    
    /**
     * Count
     * @var int
     */
    public $amount;
    
    /*
     * Doctor id
     * @var int
     */
    public $doctor_id;
    
    
    /*
     * Patient id
     * @var int
     */
    public $patient_id;
    
    /*
     * Date of 
     * @var Date
     */
    public $date;
    
    
    public function get_all_doctor_incomes($id)
    {
        
		$this->db->select('incomes.type');
        $this->db->select('incomes.amount');
        $this->db->select('incomes.date');
        $this->db->select('incomes.doctor_id');
        $this->db->select('incomes.patient_id');
        $this->db->select('incomes.id');

		$this->db->from('incomes');
                                           
//		$this->db->join('user', 'user_section.user_id = user.id', 'left');
//        $this->db->join('section', 'user_section.section_id = section.id', 'left');

        $this->db->where('incomes.doctor_id', $id);
         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    public function get_sum_of_doctor_incomes($id)
    {		
        $this->db->select_sum('incomes.amount');        
		$this->db->from('incomes');
        $this->db->where('incomes.doctor_id', $id);         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    public function get_sum_static_doctor_incomes($id)
    {		
        $this->db->select_sum('incomes.amount');        
		$this->db->from('incomes');
        $this->db->where('incomes.doctor_id', $id);         
        $this->db->like('incomes.type', 'static');         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    public function get_sum_normal_doctor_incomes($id)
    {		
        $this->db->select_sum('incomes.amount');        
		$this->db->from('incomes');
        $this->db->where('incomes.doctor_id', $id);         
        $this->db->like('incomes.type', 'normal');         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    public function get_all_incomes()
    {
		$this->db->select('*');        
		$this->db->from('incomes');                                                            
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    public function get_one_income($id)
    {
		$this->db->select('*');        
		$this->db->from('incomes');
        $this->db->where('incomes.id', $id);
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_income($data)
    {
		$insert = $this->db->insert('incomes', $data);
	    return $insert;
	}
    
    /**
    * Update section
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_income($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('incomes', $data);
//		$report = array();
//		$report['error'] = $this->db->_error_number();
//		$report['message'] = $this->db->_error_message();
//		if($report !== 0){
//			return true;
//		}else{
//			return false;
//		}
	}
    
    
        /**
    * Delete section
    * @param int $id - section id
    * @return boolean
    */
	function delete_income($id){
		$this->db->where('id', $id);
		$this->db->delete('incomes'); 
	}
     
    
    
    private function _get_datatables_query()
	{
		
		//add custom filter here		
		if($this->input->post('name'))
		{
			$this->db->like('name', $this->input->post('name'));
		}
        if($this->input->post('doctor_id'))
		{
			$this->db->like('doctor_id', $this->input->post('doctor_id'));
		}
            
		if($this->input->post('amount'))
		{
			$this->db->like('amount', $this->input->post('amount'));
		}
            
        if($this->input->post('max_date'))
		{
			$this->db->where('date <=', $this->input->post('max_date'));
		}
        if($this->input->post('min_date'))
		{
			$this->db->where('date >=', $this->input->post('min_date'));
		}

		$this->db->from($this->table);
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
	
	public function get_total(){
		
		$this->db->select('sum(amount) as total');
		
        if($this->input->post('doctor_id'))
		{
			$this->db->where('doctor_id', $this->input->post('doctor_id'));
		}
        
		if($this->input->post('max_date'))
		{
			$this->db->where('date <=', $this->input->post('max_date'));
		}
		if($this->input->post('min_date'))
		{
			$this->db->where('date >=', $this->input->post('min_date'));
		}
		
		$this->db->from($this->table);
		
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
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
    
        
}