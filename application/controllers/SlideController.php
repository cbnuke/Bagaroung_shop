<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SlideController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        
        $this->load->view('');
    }

}

?>