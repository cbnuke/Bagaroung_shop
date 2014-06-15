<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_products');
    }

    public function index() {

        $data = array('page_title' => 'รายการสินค้า');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/products.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function view($id) {

        $data = array('page_title' => 'สินค้า  ' . $id);

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/view_product.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {

        $data = array('page_title' => 'เพิ่มสินค้า');


        if ($this->m_products->validation_set_form_add() && $this->form_validation->run() == TRUE) {
            $form_data = $this->m_products->get_post_set_form_add();
            //Serialize data
            $form_data['product_name'] = serialize($form_data['product_name']);
            $form_data['detail'] = serialize($form_data['detail']);
            //Insert data
            $this->m_products->insert_product($form_data);
        }
        //Load form
        $data['form'] = $this->m_products->set_form_add();

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit() {

        $data = array('page_title' => 'แก้ไข้สินค้า');

//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product.php', $data);
        $this->m_template->showTemplateAdmin();
    }

}
