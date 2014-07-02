<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_promotions');
        $this->load->helper('date');
        if ($this->session->userdata('loged_in') != TRUE) {
            redirect('administrator');
        }
    }

    private $promotion_id = '';

    function set_promotion_id($id) {
        $this->promotion_id = $id;
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
        $data['id'] = NULL;
        $this->m_template->set_Title('เพิ่มโปรโมชั่น');
//        $this->m_template->set_Debug($f_data);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $this->m_promotions->set_promotion_id($id);

        if ($this->m_promotions->validation_form_edit() && $this->form_validation->run() == TRUE) {
            $f_data = $this->m_promotions->get_post_form_edit();
//            $this->m_template->set_Debug($f_data);
            //Update data
            $this->m_promotions->update_promotion($f_data);
            redirect('promotions');
        }

//      get detail and sent to load form
        $detail = $this->m_promotions->get_promotions($id);
        $data['form'] = $this->m_promotions->set_form_edit($detail);
        $data['id'] = $detail['id'];

        $this->m_template->set_Title('แก้ไขโปรโมชั่น');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_promotion.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    function delete($id) {
        $this->m_promotions->delete_promotion($id);

        redirect('promotions', 'refresh');
    }

    public function cancle($promotion_id) {
        $data = array(
            'status_promotion' => '0',
        );

        $this->db->where('id', $promotion_id);
        $this->db->update('promotions', $data);

        redirect('promotions', 'refresh');
    }

    public function active($promotion_id) {
        $data = array(
            'status_promotion' => '1',
        );

        $this->db->where('id', $promotion_id);
        $this->db->update('promotions', $data);

        redirect('promotions', 'refresh');
    }

    function check_products_by_type() {
        $type_id = $this->input->post('type_id');
        $promotion_id = $this->input->post('promotion_id');
        $rs = $this->m_promotions->check_product_by_type($type_id,$promotion_id);
        echo json_encode($rs);
    }

    function get_product_select() {
        $id = $this->input->post('id_product');
        $row = $this->m_promotions->get_products($id);
        $rs = array(
            'id' => $row['id'],
            'img_front' => img($row['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')),
            'product_name' => unserialize($row['product_name'])['thai'],
            'price' => $row['product_price'],
            'promotion_price' => $row['promotion_price'],
            'product_type' => unserialize($row ['product_type'])['thai'],
        );
        echo json_encode($rs);
    }

}
