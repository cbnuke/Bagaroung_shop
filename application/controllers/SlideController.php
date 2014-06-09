<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SlideController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('admin/theme_header_admin');
        $this->load->view('admin/slides');
        $this->load->view('admin/theme_footer_admin');
    }

}

?>