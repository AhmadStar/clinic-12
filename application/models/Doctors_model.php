<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors_model extends CI_Model {

	var $table = 'doctors';
	var $column_order = array(null, 'id','name','address','phone','created_date'); //set column field database for datatable orderable
	var $column_search = array('id','name','address','phone','created_date'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
		if($this->input->post('phone'))
		{
			$this->db->like('phone', $this->input->post('phone'));
		}
        if($this->input->post('created_date'))
		{
			$this->db->like('created_date', $this->input->post('created_date'));
		}
        if($this->input->post('max_date') && $this->input->post('min_date'))
		{
			$this->db->where('created_date >=', $this->input->post('min_date'));
			$this->db->where('created_date <=', $this->input->post('max_date'));
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
    
    function get_doctor_name($doctor_id)
    {
        $this->db->select('name');
        $this->db->where('id', $doctor_id);
        $this->db->from('doctors');
        $query = $this->db->get();
        
        return $query->result(); 
        
    }
    
    public function get_total(){
		
		$this->db->select('sum(id) as total');
		
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
		
		$this->db->from('doctors');
		
		$query = $this->db->get();
		return $query->result();
	}

}
