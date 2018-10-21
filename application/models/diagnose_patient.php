<?php

class Diagnose_patient extends My_Model {
    
    const DB_TABLE = 'diagnose_patient';
    const DB_TABLE_PK = 'diagnose_patient_id';
    
    /**
     * Unique identifire.
     * @var int
     */
    public $diagnose_patient_id;
    
    /**
     * Forign key of lab table.
     * @var int
     */
    public $diagnose_id;

    /**
     * Forign key of patients table.
     * @var int
     */
    public $patient_id;
    
    /**
     * Forign key of users table. Id number of employee who created this record.
     * @var int
     */
    public $user_id_assign;
    
    /**
     * Date of record creation.
     * @var datetime
     */
    public $assign_date;
    
    /**
     * Number of assigned item.
     * @var int
     */
    public $no_of_item;
    
    /**
     * Number of assigned item.
     * @var int
     */
    public $result;
    
    /*
     * Price of drug
     * @var decimal(10,0)
     */
    public $total_cost;
     
    /**
     * Forign key of users table. Id number of employee who discharge patient (get the money).
     * @var int
     */
    public $user_id_discharge;
    
    /**
     * Date of patient discharging.
     * @var datetime
     */
    public $discharge_date;
    
    /*
     * Memo and aditional description for this Item
     * @var string
     */
    public $memo;
}