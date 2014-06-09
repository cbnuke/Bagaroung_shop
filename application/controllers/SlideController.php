<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SlideController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {
        $test = array('a'=>1,'b'=>2);
        
        //$this->m_template->set_Debug($test);
        $this->m_template->set_Content('admin/slides.php',NULL);
        $this->m_template->showTemplateAdmin();
    }

}

?>