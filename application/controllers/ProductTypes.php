<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {
        $data = array('page_title' => 'ประเภทสินค้า');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/product_types.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        $data = array('page_title' => 'เพิ่มประเภทสินค้า');

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit() {
        $data = array('page_title' => 'แก้ไขประเภทสินค้า');

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

}

?>