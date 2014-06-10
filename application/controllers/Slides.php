<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slides extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {
        $test = array('page_title'=>1,'b'=>2);
        
        //$this->m_template->set_Debug($test);
        $this->m_template->set_Content('admin/slides.php',NULL);
        $this->m_template->showTemplateAdmin();
    }
    
    public function add()
    {
        $data=array('page_title'=>'เพิ่มสไลด์');
        
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_slide.php',$data);
        $this->m_template->showTemplateAdmin();
    }
      public function edit()
    {
        $data=array('page_title'=>'แก้ไขสไลด์');
        
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_slide.php',$data);
        $this->m_template->showTemplateAdmin();
    }

}

?>