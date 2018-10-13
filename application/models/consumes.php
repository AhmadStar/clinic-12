<?php

class Consumes extends MY_Model {
    
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
        
}