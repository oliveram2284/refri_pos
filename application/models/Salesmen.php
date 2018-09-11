<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Salesmen extends CI_Model {

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
            'last_name'=>array(
                'description'=>'last name',
                'type' => 'VARCHAR',
                'constraint' => '15',
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

            /*
                'nro' => array(
                    'type' => 'INT',
                    'constraint' => 2,
                    'DEFAULT' =>0
                ),
                'firstname' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '150',
                    'DEFAULT' =>''
                ),*/
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('salesmen',true);
    }



    public function getTotalFiltered($data = null){
        $response = array();
		$this->db->select('*');
        $this->db->from('salesmen as s');
		if($data['search']['value']!=''){
            $this->db->or_where('s.id ',$data['search']['value']);	
			$this->db->or_like('s.last_name',$data['search']['value']);	
			$this->db->or_like('s.first_name',$data['search']['value']);	
			$this->db->or_like('s.city',$data['search']['value']);	
			$this->db->or_like('s.region_id',$data['search']['value']);	
			$this->db->or_like('s.home_phone',$data['search']['value']);	
			$this->db->or_like('s.cell_phone',$data['search']['value']);
		}		
        $query = $this->db->get();        
		return $query->num_rows();
    }

    public function getFiltered( $data = null){
        $this->db->select("*");
        $this->db->from('salesmen as s');
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
                $this->db->order_by('s.first_name',$data['order'][0]['dir']);                  
                $this->db->order_by('s.last_name',$data['order'][0]['dir']);                  
                break;
            }
            case 3:{
                $this->db->order_by('s.location_code',$data['order'][0]['dir']);                  
                break;
            }
            case 4:{
                $this->db->order_by('s.city',$data['order'][0]['dir']);                  
                break;
            }
            case 5:{
                $this->db->order_by('s.region_id',$data['order'][0]['dir']);                  
                break;
            }
            case 6:{
                $this->db->order_by('s.home_phone',$data['order'][0]['dir']);                  
                break;
            }
            case 7:{
                $this->db->order_by('s.cell_phone',$data['order'][0]['dir']);                  
                break;
            }
            default:{
                $this->db->order_by('s.first_name',$data['order'][0]['dir']);                  
                $this->db->order_by('s.last_name',$data['order'][0]['dir']);   
            }
        }
       
        if($data['search']['value']!=''){
            $this->db->or_where('s.id ',$data['search']['value']);	
			$this->db->or_like('s.last_name',$data['search']['value']);	
			$this->db->or_like('s.first_name',$data['search']['value']);	
			$this->db->or_like('s.city',$data['search']['value']);	
			$this->db->or_like('s.region_id',$data['search']['value']);	
			$this->db->or_like('s.home_phone',$data['search']['value']);	
			$this->db->or_like('s.cell_phone',$data['search']['value']);	
            
		}
		$this->db->limit($data['length'],$data['start']);
        $query = $this->db->get();
		return $query->result_array();
    }
}