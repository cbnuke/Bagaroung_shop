<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {
        $data = array('page_title'=>'รายชื่อผู้ใช้งาน');
        
        //$this->m_template->set_Debug($test);
        $this->m_template->set_Content('admin/users.php',$data);
        $this->m_template->showTemplateAdmin();
    }
     public function add() {
        $data = array('page_title'=>'เพิ่มผู้ใช้งาน');
        
        //$this->m_template->set_Debug($test);
        $this->m_template->set_Content('admin/form_user.php',$data);
        $this->m_template->showTemplateAdmin();
    }
    public function edit() {
        $data = array('page_title'=>'แก้ไขผู้ใช้งาน');
        
        //$this->m_template->set_Debug($test);
        $this->m_template->set_Content('admin/form_user.php',$data);
        $this->m_template->showTemplateAdmin();
    }
}
