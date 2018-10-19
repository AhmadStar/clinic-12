<?php

class Dailyincomes extends CI_Model {
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }
    
    const DB_TABLE = 'dailyincomes';
    const DB_TABLE_PK = 'id';
    
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
    
//    public function get_sum_of_doctor_incomes($id)
//    {		
//        $this->db->select_sum('incomes.amount');        
//		$this->db->from('incomes');
//        $this->db->where('incomes.doctor_id', $id);         
//		$query = $this->db->get();
//		
//		return $query->result_array();
//    }
//    
//    public function get_sum_static_doctor_incomes($id)
//    {		
//        $this->db->select_sum('incomes.amount');        
//		$this->db->from('incomes');
//        $this->db->where('incomes.doctor_id', $id);         
//        $this->db->like('incomes.type', 'static');         
//		$query = $this->db->get();
//		
//		return $query->result_array();
//    }
//    
//    public function get_sum_normal_doctor_incomes($id)
//    {		
//        $this->db->select_sum('incomes.amount');        
//		$this->db->from('incomes');
//        $this->db->where('incomes.doctor_id', $id);         
//        $this->db->like('incomes.type', 'normal');         
//		$query = $this->db->get();
//		
//		return $query->result_array();
//    }

    
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
        
}