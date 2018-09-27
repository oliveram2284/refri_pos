<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operators extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('Operators');
        //$this->Users->updateSession(true);
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
