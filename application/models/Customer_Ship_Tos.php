<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Ship_Tos extends CI_Model {

    public function __construct(){
            
        $this->create();        
        
    }

    public function create(){
        $this->load->dbforge();
        //$this->dbforge->add_field('id');
        
        $this->dbforge->add_field(array(
            'id'=>array(
                'description'=>'primary key',
                'type' => 'VARCHAR',                
                'constraint' => '20',
                'null' => false, 
            ), 
            'customer_id'=>array(
                'description'=>'customer id',
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => false,
            ), 
            'ship_loc'=>array(
                'description'=>'ship location',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => false,
            ), 
            'customer_name'=>array(
                'description'=>'customer name',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => false,
            ), 
            'address1'=>array(
                'description'=>'address 1',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'address2'=>array(
                'description'=>'address 2',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => true,
            ), 

            'address3'=>array(
                'description'=>'address 3',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'country'=>array(
                'description'=>'country',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'city'=>array(
                'description'=>'city',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ), 
            'state'=>array(
                'description'=>'state name',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => false,
            ), 
            'zip_code'=>array(
                'description'=>'zip code',
                'type' => 'VARCHAR',
                'constraint' => '10',
                'null' => false,
            ), 
            'mainph'=>array(
                'description'=>'main phone',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'contact'=>array(
                'description'=>'contact info',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
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
        $this->dbforge->create_table('customer_shiptos',true);
    }



    public function getTotalFiltered($id=null,$data = null){

        if($id){
            $data['search']['value']=$id;
        }
        $response = array();
		$this->db->select('*');
        $this->db->from('customer_shiptos as cs');   
		if($data['search']['value']!=''){
            $this->db->or_where('cs.ship_loc',$data['search']['value']);	
			$this->db->or_like('cs.customer_id',$data['search']['value']);	
			$this->db->or_like('cs.address1',$data['search']['value']);
			$this->db->or_like('cs.state',$data['search']['value']);	
			$this->db->or_like('cs.zip_code',$data['search']['value']);	
			$this->db->or_like('cs.country',$data['search']['value']);	
       }	
        $query = $this->db->get();        
		return $query->num_rows();
    }

    public function getFiltered( $id=null,$data = null){


        

        $this->db->select("*");
        $this->db->from('customer_shiptos as cs');
        switch($data['order'][0]['column']){
            case 0:{
                $this->db->order_by('cs.ship_loc',$data['order'][0]['dir']);                
                break;
            }
            case 1:{
                $this->db->order_by('cs.ship_loc',$data['order'][0]['dir']);  
                break;
            }
            case 2:{
                $this->db->order_by('cs.customer_id',$data['order'][0]['dir']);                  
                break;
            }
            case 3:{
                $this->db->order_by('cs.address1',$data['order'][0]['dir']);                  
                break;
            }
            case 4:{
                $this->db->order_by('cs.state',$data['order'][0]['dir']);                  
                break;
            }
            case 5:{
                $this->db->order_by('cs.zip_code',$data['order'][0]['dir']);                  
                break;
            }
            case 5:{
                $this->db->order_by('cs.country',$data['order'][0]['dir']);                  
                break;
            }
            default:{
                $this->db->order_by('cs.ship_loc',$data['order'][0]['dir']);
            }
        }
        //$this->db->where('a.status!= ',2);
        if($id){
            $this->db->where('cs.customer_id',$id);	            
        }	
		if($data['search']['value']!=''){
            if($id){
                //$this->db->where('cs.customer_id',$id);	
                $this->db->or_where("( `cs`.`ship_loc` = '".$data['search']['value']."' OR `cs`.`address1` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`state` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`zip_code` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`country` LIKE '%".$data['search']['value']."%' ESCAPE '!') ");
                //$this->db->query("SELECT * FROM `customer_shiptos` as `cs` WHERE `cs`.`customer_id` = '101010' OR `cs`.`ship_loc` = '".$data['search']['value']."' OR `cs`.`address1` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`state` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`zip_code` LIKE '%".$data['search']['value']."%' ESCAPE '!' OR `cs`.`country` LIKE '%".$data['search']['value']."%' ESCAPE '!' ORDER BY `cs`.`ship_loc` ASC LIMIT 10");
            }else{
                
            
                $this->db->or_where('cs.ship_loc',$data['search']['value']);	
                //$this->db->or_like('cs.customer_id',$data['search']['value']);	
                $this->db->or_like('cs.address1',$data['search']['value']);
                $this->db->or_like('cs.state',$data['search']['value']);	
                $this->db->or_like('cs.zip_code',$data['search']['value']);	
                $this->db->or_like('cs.country',$data['search']['value']);	
            }
            //$this->db->or_like('DATE_FORMAT(a.date_added, "%d-%m-%Y %H:%i")',$data['search']['value']);
		}
		$this->db->limit($data['length'],$data['start']);
        $query = $this->db->get();
        //die($this->db->last_query());
        return $query->result_array();
        

        
    }

}