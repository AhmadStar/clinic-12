<?php

class Nurses extends CI_Model {
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
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
    public $Name;
    
    /**
     * Count
     * @var int
     */
    public $Age;
    
    /*
     * Doctor id
     * @var int
     */
    public $Phone;
    
    
    /*
     * Patient id
     * @var int
     */
    public $Address;

    
    
//    public function get_all_doctor_incomes($id)
//    {
//        
//		$this->db->select('incomes.type');
//        $this->db->select('incomes.amount');
//        $this->db->select('incomes.date');
//        $this->db->select('incomes.doctor_id');
//        $this->db->select('incomes.patient_id');
//        $this->db->select('incomes.id');
//
//		$this->db->from('incomes');
//                                           
////		$this->db->join('user', 'user_section.user_id = user.id', 'left');
////        $this->db->join('section', 'user_section.section_id = section.id', 'left');
//
//        $this->db->where('incomes.doctor_id', $id);
//         
//		$query = $this->db->get();
//		
//		return $query->result_array();
//    }
//    
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
    * Update section
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_nurse($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('nurses', $data);
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
	function delete_nurse($id){
		$this->db->where('id', $id);
		$this->db->delete('nurses'); 
	}
        
    
        
}