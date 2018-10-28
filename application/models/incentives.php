<?php

class Incentives extends CI_Model {
    
    var $table = 'incentives';
	var $column_order = array(null, 'id','nurse_id','amount'); //set column field database for datatable orderable
	var $column_search = array('id','nurse_id','amount'); //set column field database for datatable searchable 
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
    
    const DB_TABLE = 'incentives';
    const DB_TABLE_PK = 'id';
    

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
   
    
    function update_incentive($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('incentives', $data);
	}
    
        
    private function _get_datatables_query()
	{
		
		//add custom filter here		
		if($this->input->post('nurse_id'))
		{
			$this->db->like('nurse_id', $this->input->post('nurse_id'));
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
    
    function get_nurse_name($nurse_id)
    {
        $this->db->select('name');
        $this->db->where('id', $nurse_id);
        $this->db->from('nurses');
        $query = $this->db->get();
        
        return $query->result(); 
        
    }
    
    public function get_total_incentive(){
		
		$this->db->select('sum(amount) as allincentives');
		
        if($this->input->post('nurse_id'))
		{
			$this->db->where('nurse_id', $this->input->post('nurse_id'));
		}
        
		if($this->input->post('max_date'))
		{
			$this->db->where('date <=', $this->input->post('max_date'));
		}
		if($this->input->post('min_date'))
		{
			$this->db->where('date >=', $this->input->post('min_date'));
		}
		
		$this->db->from('incentives');
		
		$query = $this->db->get();
		return $query->result();
	}
        
}