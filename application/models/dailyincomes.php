<?php

class Dailyincomes extends CI_Model {
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
    
    const DB_TABLE = 'dailyincome';
    const DB_TABLE_PK = 'id';
    var $table = 'dailyincome';
	var $column_order = array(null, 'id','doctor_id','date','amount'); //set column field database for datatable orderable
	var $column_search = array('id','doctor_id','date','amount'); //set column field database for datatable searchable 
	var $order = array('date' => 'desc'); // default order 
    
    /**
     * Table unique identifier.
     * @var int
     */
    public $id;

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
     * Date of 
     * @var Date
     */
    public $date;
    
    
    public function get_all_dailyincome()
    {
        
		$this->db->select('*');

		$this->db->from('dailyincome');
         
		$query = $this->db->get();
		
		return $query->result_array();
    }

    
    public function get_one_dailyincome($id)
    {
		$this->db->select('*');        
		$this->db->from('dailyincome');
        $this->db->where('dailyincome.id', $id);
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_dailyincome($data)
    {
		$insert = $this->db->insert('dailyincome', $data);
	    return $insert;
	}
    
    /**
    * Update section
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_dailyincome($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('dailyincome', $data);

	}
    
    
    /**
    * Delete section
    * @param int $id - section id
    * @return boolean
    */
	function delete_dailyincome($id){
		$this->db->where('id', $id);
		$this->db->delete('dailyincome'); 
	}
    
	

	private function _get_datatables_query()
	{
		
		//add custom filter here		        
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
        
        

		$this->db->from('dailyincome');
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
		$this->db->from('dailyincome');
		return $this->db->count_all_results();
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
	
    
    
}