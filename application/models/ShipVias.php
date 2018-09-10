<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ShipVias extends CI_Model {

    public function __construct(){
            
        $this->create();        
        
    }

    public function create(){
        $this->load->dbforge();        
        $this->dbforge->add_field(array(
            'id'=>array(
                'description'=>'primary key',
                'type' => 'VARCHAR',                
                'constraint' => '3',
                'null' => false, 
            ), 
            'description'=>array(
                'description'=>'last name',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
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
        $this->dbforge->create_table('shipvias',true);
    }
}