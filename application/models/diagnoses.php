<?php

class Diagnoses extends CI_Model {
    
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }
    
    const DB_TABLE = 'diagnoses';
    const DB_TABLE_PK = 'id';
    
    /**
     * Table unique identifier.
     * @var int
     */
    public $id;
    
    /**
     * Diagnose Name in English.
     * @var string
     */
    public $diagnose_name_en;
    
    /**
     * Diagnose Name in Arabic.
     * @var string
     */
    public $diagnose_name_ar;
    
    /**
     * Description
     * @var int
     */
    public $description;
       
    
    
    public function get_one_diagnose($id)
    {
        
		$this->db->select('*');

		$this->db->from('diagnoses');
                                        
        $this->db->where('diagnoses.id', $id);
         
		$query = $this->db->get();
		
		return $query->result_array();
    }
    
    
    public function get_all_diagnoses()
    {
		$this->db->select('*');        
		$this->db->from('diagnoses');                                                            
		$query = $this->db->get();		
		return $query->result_array();
    }
    
    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    public function save_diagnose($data)
    {
		$insert = $this->db->insert('diagnoses', $data);
	    return $insert;
	}
    
    /**
    * Update section
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_diagnose($id, $data)
    {
		$this->db->where('id', $id);
		$this->db->update('diagnoses', $data);
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
	function delete_diagnose($id){
		$this->db->where('id', $id);
		$this->db->delete('diagnoses'); 
	}
        
    
        
}