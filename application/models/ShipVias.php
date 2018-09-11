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


    public function getTotalFiltered($data = null){
        $response = array();
		$this->db->select('*');
        $this->db->from('shipvias as s');   
		if($data['search']['value']!=''){
            $this->db->or_where('s.id ',$data['search']['value']);	
			$this->db->or_like('s.description',$data['search']['value']);	
			$this->db->or_like('s.notes',$data['search']['value']);	
		}		
        $query = $this->db->get();        
		return $query->num_rows();
    }

    public function getFiltered( $data = null){
        $this->db->select("*");
        $this->db->from('shipvias as s');
        switch($data['order'][0]['column']){
            case 0:{
                $this->db->order_by('s.id',$data['order'][0]['dir']);                
                break;
            }
            case 1:{
                $this->db->order_by('s.id',$data['order'][0]['dir']);  
                break;
            }
            case 2:{
                $this->db->order_by('s.description',$data['order'][0]['dir']);                  
                break;
            }
            case 3:{
                $this->db->order_by('s.notes',$data['order'][0]['dir']);                  
                break;
            }
            
            default:{
                $this->db->order_by('s.description',$data['order'][0]['dir']);
            }
        }
        
        if($data['search']['value']!=''){
            $this->db->or_where('s.id ',$data['search']['value']);	
			$this->db->or_like('s.description',$data['search']['value']);	
			$this->db->or_like('s.notes',$data['search']['value']);
		}
		$this->db->limit($data['length'],$data['start']);
        $query = $this->db->get();
		return $query->result_array();
    }
}