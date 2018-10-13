<?php

class Doctors extends MY_Model {
    
    const DB_TABLE = 'doctors';
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
    public $address;
    
    /*
     * Doctor id
     * @var int
     */
    public $phone;
    
    /*
     * Date of 
     * @var Date
     */
    public $created_date;
        
    
    
//    public function get_doctor($id)
//    {
//        
//		$this->db->select(*);        
//
//		$this->db->from('doctors');                                           
//
//        $this->db->where('doctors.id', $id);
//         
//		$query = $this->db->get();
//		
//		return $query->result_array();
//    }
    
    
     public function get_doctor($id=0) 
    {
//        $this->db->select(*);
        $this->db->where('id', $id);
        $query = $this->db->get('doctors');
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
         
//        $q = $this->db->get('address');
//        $r = $query->row();
//        return $r;
         
         
    }
    
}