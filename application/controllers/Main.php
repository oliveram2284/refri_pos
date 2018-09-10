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
		$this->load->view('orders/order_form',$data);
		$data=array();
        $data['scripts'][]='orders/order_form.js';
		$this->load->view('layout/footer.php',$data);

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

}
