<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ReceivablesTerms extends CI_Model {

    public function __construct(){
            
        $this->create();        
        
    }

    public function create(){
        $this->load->dbforge();        
        $this->dbforge->add_field(array(
            'id'=>array(
                'description'=>'primary key',
                'type' => 'VARCHAR',                
                'constraint' => '6',
                'null' => false, 
            ), 
            'days'=>array(
                'description'=>'days',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => false, 
            ), 
            'discount'=>array(
                'description'=>'discount percent',
                'type' => 'DOUBLE',                
                'constraint' => '3,1',
                'null' => true, 
            ), 
            'description'=>array(
                'description'=>'last name',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ), 
            'notes'=>array(
                'description'=>'notes',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ), 
            'created_at'=>array(
                'description'=>'creation date',
                'type' => 'TIMESTAMP',
                'null' => true,
            ), 
            'updated_at'=>array(
                'description'=>'update date',
                'type' => 'TIMESTAMP',
                'null' => true,
            )
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('rec_tbl_term',true);
    }
}