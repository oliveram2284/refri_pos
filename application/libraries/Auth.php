<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth{
    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->model('Operators');
        
    }
    public function is_logged()
    {   
        return ( $this->ci->session->userdata('email') != null);
    }

    public function login($user_data){
        $result=$this->ci->Operators->getByEmail($user_data['email']);
      
        $temp_password=$user_data['password'];        
        if(!empty($result) && $result['password']==$temp_password){

            unset($result['password']);
            $this->ci->session->set_userdata($result);
            return true;
            
        }
        
        return false;
    }

    public function logout(){
        $array_items = array('email');
        $this->ci->session->unset_userdata($array_items);
        return true;
    }

}