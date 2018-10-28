<?php

class Schedules extends CI_Model {
    
    var $table = 'schedule';
	var $column_order = array(null, 'id','nurse_id','work_date','work_hours','hour_price','day_fare'); //set column field database for datatable orderable
	var $column_search = array('id','nurse_id','work_date','work_hours','hour_price','day_fare');  //set column field database for datatable searchable 
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
    
    const DB_TABLE = 'schedule';
    const DB_TABLE_PK = 'id';
    


    
    public function get_all_nurse_schedule($id)
    {
        
		$this->db->select('*');

		$this->db->from('schedule');                                        

//        $month = $now->format('m');
//        $year = $now->format('Y');
         
//        $this->db->where("DATE_FORMAT(work_datee,'%Y-%m')", 10);
        
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
    
    function update_schedule($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('schedule', $data);
}
    
    /*
    * sum all nurse hour works
    * @param nurse id
    * @return sum all intencetives value
    */
    public function get_sum_of_nurse_hour_work($id)
    {		
        $this->db->select_sum('schedule.work_hours');        
		$this->db->from('schedule');
        $this->db->where('schedule.nurse_id', $id);         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    /*
    * sum all nurse income
    * @param nurse id
    * @return sum all intencetives value
    */
    public function get_sum_of_nurse_income($id)
    {		
        $this->db->select_sum('schedule.day_fare');        
		$this->db->from('schedule');
        $this->db->where('schedule.nurse_id', $id);         
		$query = $this->db->get();
		
		return $query->result_array();
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
			$this->db->where('work_date <=', $this->input->post('max_date'));
		}
        if($this->input->post('min_date'))
		{
			$this->db->where('work_date >=', $this->input->post('min_date'));
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
    
    public function get_total_work_hours(){
		
		$this->db->select('sum(work_hours) as work_hours');
		
        if($this->input->post('nurse_id'))
		{
			$this->db->where('nurse_id', $this->input->post('nurse_id'));
		}
        
		if($this->input->post('max_date'))
		{
			$this->db->where('work_date <=', $this->input->post('max_date'));
		}
		if($this->input->post('min_date'))
		{
			$this->db->where('work_date >=', $this->input->post('min_date'));
		}
		
		$this->db->from('schedule');
		
		$query = $this->db->get();
		return $query->result();
	}
   
    public function get_total_nurse_income(){
		
		$this->db->select('sum(day_fare) as day_fare');
		
        if($this->input->post('nurse_id'))
		{
			$this->db->where('nurse_id', $this->input->post('nurse_id'));
		}
        
		if($this->input->post('max_date'))
		{
			$this->db->where('work_date <=', $this->input->post('max_date'));
		}
		if($this->input->post('min_date'))
		{
			$this->db->where('work_date >=', $this->input->post('min_date'));
		}
		
		$this->db->from('schedule');
		
		$query = $this->db->get();
		return $query->result();
	}
      
    
        
}