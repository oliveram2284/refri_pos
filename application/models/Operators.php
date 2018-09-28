<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Operators extends CI_Model {

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
            'password'=>array(
                'description'=>'password',
                'type' => 'VARCHAR',
                'constraint' => '10',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'first_name'=>array(
                'description'=>'first name',
                'type' => 'VARCHAR',
                'constraint' => '15',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'last_name'=>array(
                'description'=>'last name',
                'type' => 'VARCHAR',
                'constraint' => '15',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'location_code'=>array(
                'description'=>'location code',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'address1'=>array(
                'description'=>'first address',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => false,
            ), 

            'address2'=>array(
                'description'=>'second address',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'city'=>array(
                'description'=>'city name',
                'type' => 'VARCHAR',
                'constraint' => '15',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'state'=>array(
                'description'=>'state acronym',
                'type' => 'VARCHAR',
                'constraint' => '2',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'zip_code'=>array(
                'description'=>'zip code',
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ), 
            'home_phone'=>array(
                'description'=>'home phone',
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ), 
            'cell_phone'=>array(
                'description'=>'cell phone',
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => false,
            ), 
            'email'=>array(
                'description'=>'email',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ), 
            'region_id'=>array(
                'description'=>'region id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'notes'=>array(
                'description'=>'notes',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ), 

            'csalesman'=>array(
                'description'=>'change salesman',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'clocation'=>array(
                'description'=>'change location',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'cterms'=>array(
                'description'=>'change terms',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'cdiscount'=>array(
                'description'=>'change discount',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            
            'cmanager'=>array(
                'description'=>'change discount',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'ctakeoorder'=>array(
                'description'=>'change discount',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'pquote'=>array(
                'description'=>'permitted to quote',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 

            'porder'=>array(
                'description'=>'permitted to order',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ),            
            'pinvoice'=>array(
                'description'=>'permitted to invoice',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'pverify'=>array(
                'description'=>'permitted to verify',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'pchange'=>array(
                'description'=>'permitted to change',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
            ), 
            'pcredit'=>array(
                'description'=>'permitted to credit',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => false,
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
            
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('operators',true);

        /*
        ALTER TABLE `operators`
        ADD COLUMN `cmanager` TINYINT(1) NOT NULL AFTER `cdiscount`,
        ADD COLUMN `ctakeoorder` TINYINT(1) NOT NULL AFTER `cmanager`;
        */
    }


    public function getById($id=null){
       
        if($id==null){
            return false;
        }
        $this->db->where('id',$id);
        $query=$this->db->get('operators');
        if($query->num_rows()!=0){
            return $query->row_array();
        }
        return false;

    }

    public function getByEmail($email=null){
       
        if($email==null){
            return false;
        }
        $this->db->where('lower(email)',strtolower($email));
        $query=$this->db->get('operators');
        //echo $this->db->last_query();
        //die();
        if($query->num_rows()!=0){
            return $query->row_array();
        }
        
        return false;

    }






}