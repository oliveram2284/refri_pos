<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model {

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
                'constraint' => '6',
                'null' => false, 
            ), 
            'name'=>array(
                'description'=>'name',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => false,
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

            'address3'=>array(
                'description'=>'third address',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'country'=>array(
                'description'=>'country name',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'city'=>array(
                'description'=>'city name',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'state'=>array(
                'description'=>'state name',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'zip_code'=>array(
                'description'=>'zip code',
                'type' => 'VARCHAR',
                'constraint' => '10',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'mainph'=>array(
                'description'=>'main phone',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => false,
            ), 
            'faxph'=>array(
                'description'=>'fax phone',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'resale_tax'=>array(
                'description'=>'release tax',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'DEFAULT' =>'',
                'null' => true,
            ), 
            'creditl'=>array(
                'description'=>'credit limit',
                'type' => 'DOUBLE',
                'constraint' => '9,2',
                'null' => true,
            ), 
            'checkl'=>array(
                'description'=>'check limit',
                'type' => 'DOUBLE',
                'constraint' => '9,2',
                'null' => true,
            ), 
            'sdate'=>array(
                'description'=>'start date',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ), 
            'salesman_id'=>array(
                'description'=>'salesman id',
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ),
            'collector_id'=>array(
                'description'=>'collect id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'price_level'=>array(
                'description'=>'price level',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ),
            'type'=>array(
                'description'=>'customer type',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'region_id'=>array(
                'description'=>'customer region id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'gldepartment'=>array(
                'description'=>'g/l department',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'arpay'=>array(
                'description'=>'a/r pay by',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'term_id'=>array(
                'description'=>'a/r pay by',
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => false,
            ), 
            'acctype'=>array(
                'description'=>'account type',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ),      
            'tax_id'=>array(
                'description'=>'tax id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => false,
            ), 
            'late_charge'=>array(
                'description'=>'late charge',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => true,
            ), 
            'porequired'=>array(
                'description'=>'p/o required',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => true,
            ), 
            'backorder'=>array(
                'description'=>'backorder',
                'type' => 'tinyint',
                'constraint' => '1',
                'null' => true,
            ), 
            'invo_copies'=>array(
                'description'=>'invo copies',
                'type' => 'INT',
                'constraint' => '11',
                'null' => true,
            ),             
            'ship_id'=>array(
                'description'=>'ship id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'web_id'=>array(
                'description'=>'web id',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ),
            'epa'=>array(
                'description'=>'epa',
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ), 
            'derm'=>array(
                'description'=>'derm',
                'type' => 'VARCHAR',
                'constraint' => '20',
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
        $this->dbforge->create_table('customers',true);
    }



    public function getTotalFiltered($data = null){
        $response = array();
		$this->db->select('*');
        $this->db->from('customers as c'); 
        $this->db->join('salesmen as s','c.salesman_id=s.id');  
		if($data['search']['value']!=''){
            $this->db->or_where('c.id ',$data['search']['value']);	
			$this->db->or_like('c.name',$data['search']['value']);	
			$this->db->or_like('c.city',$data['search']['value']);	
			$this->db->or_like('c.state',$data['search']['value']);	
			$this->db->or_like('c.zip_code',$data['search']['value']);	
			$this->db->or_like('c.mainph',$data['search']['value']);	
			//$this->db->limit($data['length'],$data['start']);
		}		
        $query = $this->db->get();        
		return $query->num_rows();
    }

    public function getFiltered( $data = null){
        $this->db->select("c.*, CONCAT(s.first_name,' ',s.last_name) as salsmen_name");
        $this->db->from('customers as c');
        $this->db->join('salesmen as s','c.salesman_id=s.id');
        switch($data['order'][0]['column']){
            case 0:{
                $this->db->order_by('c.id',$data['order'][0]['dir']);                
                break;
            }
            case 1:{
                $this->db->order_by('c.id',$data['order'][0]['dir']);  
                break;
            }
            case 2:{
                $this->db->order_by('c.name',$data['order'][0]['dir']);                  
                break;
            }
            case 3:{
                $this->db->order_by('c.city',$data['order'][0]['dir']);                  
                break;
            }
            case 4:{
                $this->db->order_by('c.state',$data['order'][0]['dir']);                  
                break;
            }
            case 5:{
                $this->db->order_by('c.zip_code',$data['order'][0]['dir']);                  
                break;
            }
            case 5:{
                $this->db->order_by('c.mainph',$data['order'][0]['dir']);                  
                break;
            }
            default:{
                $this->db->order_by('c.name',$data['order'][0]['dir']);
            }
        }
        //$this->db->where('a.status!= ',2);	
		if($data['search']['value']!=''){
            $this->db->or_where('c.id ',$data['search']['value']);	
			$this->db->or_like('c.name',$data['search']['value']);	
			$this->db->or_like('c.city',$data['search']['value']);	
			$this->db->or_like('c.state',$data['search']['value']);	
			$this->db->or_like('c.zip_code',$data['search']['value']);	
			$this->db->or_like('c.mainph',$data['search']['value']);	
            //$this->db->or_like('DATE_FORMAT(a.date_added, "%d-%m-%Y %H:%i")',$data['search']['value']);
		}
		$this->db->limit($data['length'],$data['start']);
        $query = $this->db->get();
        //die($this->db->last_query());
		return $query->result_array();
    }
}