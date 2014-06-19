<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_promotions');
        $this->load->helper('date');
    }

    public function index() {

        $data['promotions'] = $this->m_promotions->get_all_promotions();
        $data['products_had_promotion'] = $this->m_promotions->get_products_has_promotion();

        $this->m_template->set_Title('โปรโมชั่น');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/promotions.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        $f_data = '';
        if ($this->m_promotions->validation_form_add() && $this->form_validation->run() == TRUE) {
            $f_data = $this->m_promotions->get_post_form_add();
            //Insert data
            $this->m_promotions->insert_promotion($f_data);
            redirect('promotions', 'refresh');
        }
        $data['form'] = $this->m_promotions->set_form_add();

        $this->m_template->set_Title('เพิ่มโปรโมชั่น');
        $this->m_template->set_Debug($f_data);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $data = array();

        //      get detail and sent to load form
        $detail = $this->m_promotions->get_promotions($id);
        $data['form'] = $this->m_promotions->set_form_edit($detail);


        $this->m_template->set_Title('แก้ไขโปรโมชั่น');
        $this->m_template->set_Debug($detail);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    function get_product_select() {
        $id = $this->input->post('id_product');
        $row = $this->m_promotions->get_products($id);
        $rs = array(
            'id' => $row['id'],
            'img_front' => img($row['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')),
            'product_name' => unserialize($row['product_name'])['thai'],
            'price' => $row['product_price'],
            'product_type' => unserialize($row ['product_type'])['thai'],
        );
        echo json_encode($rs);
    }

}
