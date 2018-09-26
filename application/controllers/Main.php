<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	function __construct(){
        parent::__construct();
        $this->load->model('Operators');
        $this->load->model('Customers');
        $this->load->model('Customer_Ship_Tos');
        $this->load->model('Salesmen');
		$this->load->model('ShipVias');
		$this->load->model('ReceivablesTerms');
		$this->load->model('InventoryMaster');
        //$this->Users->updateSession(true);
        /*if(!$this->auth->is_logged()){
			redirect('login', 'refresh');
		}*/
    }
	public function index()
	{	
		
		$this->load->view('layout/header.php');
		$data=array();
		$this->load->view('index',$data);
		$this->load->view('layout/footer.php');
	}

	public function new_order(){
		$this->load->view('layout/header.php');
		$data=array();
		$id='129';
		$data['operator']=$this->Operators->getById($id);
		$data['scripts'][]='orders/order_form.js';
		$this->load->view('orders/order_form',$data);
        
		$this->load->view('layout/footer.php');

	}


	public function modal_customer(){
		$data = array();
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_customer_search', $data, true ));
	}
	public function modal_ship_to($customer_id=null){
		$data = array();
		$data['customer_id']=$customer_id;
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_ship_search', $data, true ));
	}

	public function modal_salesman(){
		$data = array();
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_salesman_search', $data, true ));
	}

	public function modal_ship_via(){
		$data = array();
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_ship_vias_search', $data, true ));
	}
	
	public function modal_terms(){
		$data = array();
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_terms_search', $data, true ));
	}

	public function modal_products_items(){
		$data = array();
		$this->output
               ->set_content_type('application/json')
               ->set_output($this->load->view( 'orders/_modal_items_search', $data, true ));
	}
	
	public function getCustomer($id=null){	
		
		$result=$this->Customers->getById($id);
		if($result!=null){
			echo json_encode(array('status'=>true,'data'=>$result));
		}else{
			echo json_encode(array('status'=>false,'data'=>false));
		}
	}
	public function find_customers(){		
		$recordsTotal= $this->Customers->getTotalFiltered($_REQUEST);
        $data= $this->Customers->getFiltered($_REQUEST);       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);
		echo json_encode($response);		
	}


	public function find_ship($id=null){
		$recordsTotal= $this->Customer_Ship_Tos->getTotalFiltered($id,$_REQUEST);
		$data= $this->Customer_Ship_Tos->getFiltered($id,$_REQUEST);
		
       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);

		echo json_encode($response);
	}

	public function find_salesman(){
		
		$recordsTotal= $this->Salesmen->getTotalFiltered($_REQUEST);
        $data= $this->Salesmen->getFiltered($_REQUEST);
       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);

		echo json_encode($response);
	}

	public function find_ship_vias(){
		
		$recordsTotal= $this->ShipVias->getTotalFiltered($_REQUEST);
        $data= $this->ShipVias->getFiltered($_REQUEST);
       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);

		echo json_encode($response);
	}

	public function find_terms(){
		
		$recordsTotal= $this->ReceivablesTerms->getTotalFiltered($_REQUEST);
        $data= $this->ReceivablesTerms->getFiltered($_REQUEST);
       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);

		echo json_encode($response);
	}

	public function find_items(){
		
		$recordsTotal= $this->InventoryMaster->getTotalFiltered($_REQUEST);
        $data= $this->InventoryMaster->getFiltered($_REQUEST);
       
		$response=array(
			'draw' => $_REQUEST['draw'],
			'recordsTotal' => $recordsTotal,
			'recordsFiltered' => $recordsTotal,
			'data' => $data
		);

		echo json_encode($response);
	}

	public function getItem($id=null){	
		
		$result=$this->InventoryMaster->getById($id);
		if($result!=null){
			echo json_encode(array('status'=>true,'data'=>$result));
		}else{
			echo json_encode(array('status'=>false,'data'=>false));
		}
	}

	public function add_item_cart(){

		$temp=$this->session->userdata('cart');
		
		if( is_null($temp)  ){

			$cart=array();
			$cart[]=$this->input->post();
			$this->session->set_userdata('cart',$cart);

		}else{

			$cart =$this->session->userdata('cart');
			$exist=false;

			foreach($cart as $key=>$item){

				if($this->input->post('item_number') == $item['item_number']){
					$exist=true;
					break;
				}
				//if($this->input->post('item_number'))
			}
			if(!$exist){
				$cart[]=$this->input->post();
				$this->session->set_userdata('cart',$cart);
			}
		}
		echo json_encode(array('result'=>true));
	}

	public function get_cart($item_number=null){
		
		//var_dump($this->session->userdata('cart'));
		//$this->session->unset_userdata('cart');
		//var_dump($this->session->userdata('cart'));
		echo json_encode(array('cart'=>($this->session->userdata('cart')?$this->session->userdata('cart'):array())));
	}
	public function clean_cart($item_number=null){
		
		var_dump($this->session->userdata('cart'));
		$this->session->unset_userdata('cart');
		var_dump($this->session->userdata('cart'));
		echo "session cleaned";
	}

	
	public function remove_item_cart($item_number=null){

		$cart =$this->session->userdata('cart');
		$temp =array();

		foreach($cart as $key=>$item){
			if($item_number != $item['item_number']){
				$temp[]=$item;
			}		
		}
		$this->session->set_userdata('cart',$temp);
		echo json_encode(array('result'=>true));

	}

	
	

}
