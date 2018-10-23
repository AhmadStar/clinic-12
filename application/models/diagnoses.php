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
     
    
    public function search($like,$and=FALSE,$limit = 0, $offset = 0,$order_by=0)
  {
    $i=1;
    if(!$and)
      foreach ($like as $key => $value)
      {
        if($i==1) $this->db->like($key,$value);
        else $this->db->or_like($key,$value);
        $i++;
      }
    else
      foreach ($like as $key => $value)
        $this->db->like($key,$value);
    
    if($order_by)
      $this->db->order_by($order_by[0],$order_by[1]);
    
    if ($limit) 
      $query = $this->db->get($this::DB_TABLE, $limit, $offset);
    else
      $query = $this->db->get($this::DB_TABLE);
    
    $ret_val = array();
    $class = get_class($this);
    foreach ($query->result() as $row) {
      $model = new $class;
      $model->populate($row);
      $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
    }
    return $ret_val;
  }
    
 /**
   * Populate from an array or standard class.
   * @param mixed $row
   */
  public function populate($row) {
      foreach ($row as $key => $value) {
          $this->$key = $value;
      }
  }
    
/**
   * Load from the database.
   * @param int $id
   */
  public function load($id) {
      $query = $this->db->get_where($this::DB_TABLE, array(
          $this::DB_TABLE_PK => $id,
      ));
      $this->populate($query->row());
  }
    
        
}