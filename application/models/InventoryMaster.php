<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryMaster extends CI_Model {

    public function __construct(){
            
        $this->create();        
        
    }

    public function create(){
        $this->load->dbforge();        
        $this->dbforge->add_field(array(
            'id'=>array(
                'description'=>'primary key',
                'type' => 'bigint',                
                'constraint' => '20',
                'null' => false, 
            ), 
            'item_id'=>array(
                'description'=>'item key',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => false, 
            ), 
            'vendor_part'=>array(
                'description'=>'vendor part',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => true, 
            ), 
            'barcode'=>array(
                'description'=>'barcode',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => true, 
            ),            
            'description1'=>array(
                'description'=>'first description',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => false, 
            ), 
            'description2'=>array(
                'description'=>'Second description',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => true, 
            ), 
            'description3'=>array(
                'description'=>'Third description',
                'type' => 'VARCHAR',                
                'constraint' => '25',
                'null' => true, 
            ), 
            'department_id'=>array(
                'description'=>'department key',
                'type' => 'VARCHAR',                
                'constraint' => '2',
                'null' => false, 
            ), 
            'category_id'=>array(
                'description'=>'category key',
                'type' => 'VARCHAR',                
                'constraint' => '3',
                'null' => false, 
            ), 
            'group_id'=>array(
                'description'=>'group key',
                'type' => 'VARCHAR',                
                'constraint' => '6',
                'null' => true, 
            ), 
            'family_id'=>array(
                'description'=>'family key',
                'type' => 'VARCHAR',                
                'constraint' => '6',
                'null' => true, 
            ), 
            'brand_id'=>array(
                'description'=>'brand key',
                'type' => 'VARCHAR',                
                'constraint' => '6',
                'null' => true, 
            ), 
            'tax'=>array(
                'description'=>'tax',
                'type' => 'tinyint',                
                'constraint' => '1',
                'null' => true, 
            ), 

            'replace_cost'=>array(
                'description'=>'replace cost',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ), 
            'vendor_id'=>array(
                'description'=>'vendor key',
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => false,
            ), 
            'first_cost'=>array(
                'description'=>'first cost',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ), 
            'fqty'=>array(
                'description'=>'fqty',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => false, 
            ), 
            'last_cost'=>array(
                'description'=>'last cost',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ), 
            'lqty'=>array(
                'description'=>'lqty',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => false, 
            ), 
            'avrg_cost'=>array(
                'description'=>'avrg cost',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ), 
            'stock'=>array(
                'description'=>'stock',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => false, 
            ), 
            'core_cost'=>array(
                'description'=>'core cost',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ), 
            'commt'=>array(
                'description'=>'commt',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => false, 
            ), 
            'on_order'=>array(
                'description'=>'on order',
                'type' => 'DOUBLE',                
                'constraint' => '11,3',
                'null' => true, 
            ),
            'avail'=>array(
                'description'=>'avail',
                'type' => 'INTEGER',                
                'constraint' => '11',
                'null' => true, 
            ),  
            'unit'=>array(
                'description'=>'unit',
                'type' => 'VARCHAR',
                'constraint' => '3',
                'null' => true,
            ), 
            'pack'=>array(
                'description'=>'pack',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),
            'weight'=>array(
                'description'=>'weight',
                'type' => 'DOUBLE',                
                'constraint' => '6,2',
                'null' => true, 
            ),
            'width'=>array(
                'description'=>'width',
                'type' => 'DOUBLE',                
                'constraint' => '6,2',
                'null' => true, 
            ),
            'length'=>array(
                'description'=>'length',
                'type' => 'DOUBLE',                
                'constraint' => '6,2',
                'null' => true, 
            ),
            'height'=>array(
                'description'=>'height',
                'type' => 'DOUBLE',                
                'constraint' => '6,2',
                'null' => true, 
            ),
            'markup'=>array(
                'description'=>'markup',
                'type' => 'DOUBLE',                
                'constraint' => '8,2',
                'null' => true, 
            ),
            
            'list'=>array(
                'description'=>'list',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),

            'profit'=>array(
                'description'=>'profit',
                'type' => 'DOUBLE',                
                'constraint' => '5,2',
                'null' => true, 
            ),

            'disc1'=>array(
                'description'=>'discount 1',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),
            'price1'=>array(
                'description'=>'Price 1',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),
            'break1'=>array(
                'description'=>'Break 1',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),

            'disc2'=>array(
                'description'=>'discount 2',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),
            'price2'=>array(
                'description'=>'Price 2',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),
            'break2'=>array(
                'description'=>'Break 2',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),
            
            'disc3'=>array(
                'description'=>'discount 3',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),
            'price3'=>array(
                'description'=>'Price 3',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),
            'break3'=>array(
                'description'=>'Break 3',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),


            'disc4'=>array(
                'description'=>'discount 4',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),
            'price4'=>array(
                'description'=>'Price 4',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),
            'break4'=>array(
                'description'=>'Break 4',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),

            'disc5'=>array(
                'description'=>'discount 5',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),
            'price5'=>array(
                'description'=>'Price 5',
                'type' => 'DOUBLE',                
                'constraint' => '9,2',
                'null' => true, 
            ),
            'break5'=>array(
                'description'=>'Break 5',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),

            'discp'=>array(
                'description'=>'discount p',
                'type' => 'DOUBLE',                
                'constraint' => '4,2',
                'null' => true, 
            ),

            'promo'=>array(
                'description'=>'promo',
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
            'edate'=>array(
                'description'=>'end date',
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => true,
            ), 

            'minqty'=>array(
                'description'=>'minqty',
                'type' => 'INTEGER',
                'constraint' => '11',
                'null' => true,
            ),
            'maxqty'=>array(
                'description'=>'minqty',
                'type' => 'INTEGER',
                'constraint' => '11',
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
        $this->dbforge->create_table('inv_tbl_mstr',true);
    }


    public function getTotalFiltered($data = null){
        $response = array();
		$this->db->select('*');
        $this->db->from('inv_tbl_mstr as i');   
		if($data['search']['value']!=''){
            $this->db->or_where('i.id ',$data['search']['value']);	
            $this->db->or_where('i.item_id ',$data['search']['value']);	
            $this->db->or_where('i.description1',$data['search']['value']);	
            $this->db->or_where('i.description2',$data['search']['value']);	
            $this->db->or_where('i.description3',$data['search']['value']);	
			$this->db->or_like('i.vendor_id',$data['search']['value']);	
			$this->db->or_like('i.vendor_part',$data['search']['value']);	
			$this->db->or_like('i.department_id',$data['search']['value']);	
			$this->db->or_like('i.category_id',$data['search']['value']);	
			$this->db->or_like('i.group_id',$data['search']['value']);	
			$this->db->or_like('i.family_id',$data['search']['value']);	
		}		
        $query = $this->db->get();        
		return $query->num_rows();
    }

    public function getFiltered( $data = null){
        $this->db->select("*");
        $this->db->from('inv_tbl_mstr as i');
        switch($data['order'][0]['column']){
            case 0:{
                $this->db->order_by('i.id',$data['order'][0]['dir']);                
                break;
            }
            case 1:{
                $this->db->order_by('i.item_id',$data['order'][0]['dir']);  
                break;
            }
            case 2:{
                $this->db->order_by('i.description1',$data['order'][0]['dir']);                  
                $this->db->order_by('i.description2',$data['order'][0]['dir']);                  
                $this->db->order_by('i.description3',$data['order'][0]['dir']);        
                break;
            }
            case 3:{                
                
                $this->db->order_by('i.vendor_id',$data['order'][0]['dir']);         
                break;
            }
            case 4:{
                $this->db->order_by('i.vendor_part',$data['order'][0]['dir']);                  
                                  
                break;
            }
            case 5:{
                $this->db->order_by('i.department_id',$data['order'][0]['dir']);      
                break;
            }
            case 6:{
                $this->db->order_by('i.category_id',$data['order'][0]['dir']);                  
                break;
            }
            case 7:{
                $this->db->order_by('i.group_id',$data['order'][0]['dir']);                  
                break;
            }
            case 7:{
                $this->db->order_by('i.family_id',$data['order'][0]['dir']);                  
                break;
            }
            default:{
                $this->db->order_by('i.item_id',$data['order'][0]['dir']);
            }
        }
        
        if($data['search']['value']!=''){
            $this->db->or_where('i.id ',$data['search']['value']);	
            $this->db->or_where('i.item_id ',$data['search']['value']);	
            $this->db->or_where('i.description1',$data['search']['value']);	
            $this->db->or_where('i.description2',$data['search']['value']);	
            $this->db->or_where('i.description3',$data['search']['value']);	
			$this->db->or_like('i.vendor_id',$data['search']['value']);	
			$this->db->or_like('i.vendor_part',$data['search']['value']);	
			$this->db->or_like('i.department_id',$data['search']['value']);	
			$this->db->or_like('i.category_id',$data['search']['value']);	
			$this->db->or_like('i.group_id',$data['search']['value']);	
			$this->db->or_like('i.family_id',$data['search']['value']);	
		}
		$this->db->limit($data['length'],$data['start']);
        $query = $this->db->get();
		return $query->result_array();
    }
}