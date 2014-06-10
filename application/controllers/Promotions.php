<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {

        $data = array('page_title' => 'โปรโมชั่น');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/promotions.php', $data);
        $this->m_template->showTemplateAdmin();
    }
       public function add() {

        $data = array('page_title' => 'เพิ่มโปรโมชั่น');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }
       public function edit() {

        $data = array('page_title' => 'แก้ไขโปรโมชั่น');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }
}