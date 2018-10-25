<?php

class Nurses extends CI_Model {
    
    var $table = 'nurses';
	var $column_order = array(null, 'id','name','age','phone','address'); //set column field database for datatable orderable
	var $column_search = array('id','name','age','phone','address'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    const DB_TABLE = 'nurses';
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
    public $name;
    
    /**
     * Count
     * @var int
     */
    public $age;
    
    /*
     * Doctor id
     * @var int
     */
    public $phone;
    
    
    /*
     * Patient id
     * @var int
     */
    public $address;


    public function get_all_test()
    {
		$this->db->select('*');        
		$this->db->from('nurses');                                                            
		$query = $this->db->get();		
		return $query->result();
    }
    
    public function get_all_nurse_schedule($id)
    {
        
		$this->db->select('*');

		$this->db->from('schedule');                                        

        $this->db->where('schedule.nurse_id', $id);
         
		$query = $this->db->get();
		
		return $query->result();
    }
    
    public function get_one_schedule($id)
    {
		$this->db->select('*');        
		$this->db->from('schedule');
    $this->db->where('schedule.id', $id);
		$query = $this->db->get();		
		return $query->result();
    }

    public function get_all_nurse_incentive($id)
    {
        
		$this->db->select('*');

		$this->db->from('incentives');                                        

        $this->db->where('incentives.nurse_id', $id);
         
		$query = $this->db->get();
		
		return $query->result();
    }
    
    public function get_one_incentive($id)
    {
		$this->db->select('*');        
		$this->db->from('incentives');
        $this->db->where('incentives.id', $id);
		$query = $this->db->get();		
		return $query->result();
    }
    
    
    public function get_all_nurses()
    {
		$this->db->select('*');        
		$this->db->from('nurses');                                                            
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    
    
    public function get_one_nurse($id)
    {
		$this->db->select('*');        
		$this->db->from('nurses');
        $this->db->where('nurses.id', $id);
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_nurse($data)
    {
		$insert = $this->db->insert('nurses', $data);
	    return $insert;
	}
    
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_nurse_schedule($data)
    {
		$insert = $this->db->insert('schedule', $data);
	    return $insert;
	}
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_nurse_incentive($data)
    {
		$insert = $this->db->insert('incentives', $data);
	    return $insert;
	}
    
    /*
    * sum all nurse incentives
    * @param nurse id
    * @return sum all intencetives value
    */
    public function get_sum_of_nurse_incentives($id)
    {		
        $this->db->select_sum('incentives.amount');        
		$this->db->from('incentives');
        $this->db->where('incentives.nurse_id', $id);         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    /**
    * Update section
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_nurse($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('nurses', $data);
	}
    
    function update_incentive($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('incentives', $data);
	}
    
    function update_schedule($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('schedule', $data);
}
    
        /**
    * Delete section
    * @param int $id - section id
    * @return boolean
    */
	function delete_nurse($id){
		$this->db->where('id', $id);
		$this->db->delete('nurses'); 
	}
    
    
        
    private function _get_datatables_query()
	{
		
		//add custom filter here		
		if($this->input->post('name'))
		{
			$this->db->like('name', $this->input->post('name'));
		}
		if($this->input->post('address'))
		{
			$this->db->like('address', $this->input->post('address'));
		}
        if($this->input->post('age'))
		{
			$this->db->like('age', $this->input->post('age'));
		}
		if($this->input->post('phone'))
		{
			$this->db->like('phone', $this->input->post('phone'));
		}        
//        if($this->input->post('max_date') && $this->input->post('min_date'))
//		{
//			$this->db->where('date >=', $this->input->post('min_date'));
//			$this->db->where('created_date <=', $this->input->post('max_date'));
//		}
        

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