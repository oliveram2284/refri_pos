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
             
	}
	

	public function login(){	
		
		if($this->input->post('email')!=null){
			
			$this->auth->login($this->input->post());
			redirect('/', 'refresh');
		}
		$this->load->view('login');
	}

	public function logout(){
		$this->auth->logout();
		redirect('/', 'refresh');
	}


	public function index()
	{	
		if(!$this->auth->is_logged()){
			redirect('login', 'refresh');
		}

		$this->load->view('layout/header.php');
		$data=array();
		$this->load->view('index',$data);
		$this->load->view('layout/footer.php');
	}

	

	
	

}
