<?php

class Consumes extends MY_Model {
    
//    var $table = 'consumes';
	var $column_order = array(null, 'id','name','count','doctor_id','date','price'); //set column field database for datatable orderable
	var $column_search = array( 'id','name','count','doctor_id','date','price'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 
    
    const DB_TABLE = 'consumes';
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
    public $count;
    
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
    
     
    
    private function _get_datatables_query()
	{
		
		//add custom filter here				
        if($this->input->post('doctor_id'))
		{
			$this->db->like('doctor_id', $this->input->post('doctor_id'));
		}
            		
            
        if($this->input->post('max_date'))
		{
			$this->db->where('date <=', $this->input->post('max_date'));
		}
        if($this->input->post('min_date'))
		{
			$this->db->where('date >=', $this->input->post('min_date'));
		}

		$this->db->from('consumes');
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
		
		$this->db->select('sum(price) as total');
		
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
		
		$this->db->from('consumes');
		
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
		$this->db->from('consumes');
		return $this->db->count_all_results();
	}
    
        
}