<?php

class administrator extends CI_Controller {

    public function __construct() { 
         parent::__construct();
        $this->load->library('form_validation');
        
    }



    public function index() {
        $this->load->view('login');
    }

}
