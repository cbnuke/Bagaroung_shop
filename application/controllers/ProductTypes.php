<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_producttypes');
       
    }

    private $type_id = '';
    private $th = '';
    private $en = '';

    public function set_type_id($str) {
        $this->type_id = $str;
    }

    public function set_name_th($str) {
        $this->th = $str;
    }

    public function set_name_en($str) {
        $this->en = $str;
    }

    public function index() {
        $data = array();
        $data['type'] = $this->m_producttypes->get_types();

        $this->m_template->set_Title('ประเภทสินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/product_types.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {

        if ($this->m_producttypes->validation_form_add() && $this->form_validation->run() == TRUE) {
            $form_data = $this->m_producttypes->get_post_form_add();
//             $this->m_template->set_Debug($form_data);
            $this->m_producttypes->insert_type($form_data);
            redirect('ProductTypes', 'refresh');
        }

        $data['form'] = $this->m_producttypes->set_form_add();

        $this->m_template->set_Title('เพิ่มประเภทสินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {

        $this->m_producttypes->set_id($id);

        if ($this->m_producttypes->validation_form_edit() && $this->form_validation->run() == TRUE) {
            $form_data = $this->m_producttypes->get_post_form_edit();
//            $this->m_template->set_Debug($form_data);
            $this->m_producttypes->update_type($form_data);
            redirect('ProductTypes', 'refresh');
        }

        $detail = $this->m_producttypes->get_types($id);
        if (count($detail) > 0) {
            $data['form'] = $this->m_producttypes->set_form_edit($detail);
        } else {
            redirect('ProductTypes', 'refresh');
        }


        $this->m_template->set_Title('แก้ไขประเภทสินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {
        $this->m_producttypes->set_id($id);
        if ($this->m_producttypes->delete_type()) {
            redirect('ProductTypes', 'refresh');
            exit();
        }
    }

    public function check_type_exit_add($str) {

        $this->db->select('*');
        $this->db->from('product_types');
        $this->db->like('product_type', $str);
        $rs = $this->db->get();

        if ($rs->num_rows() == 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_type_exit_edit($str) {

        $this->db->select('*');
        $this->db->from('product_types');
        $this->db->like('product_type', $str);
        $rs = $this->db->get();

        if ($rs->num_rows() == 0 && $this->th == $str) {
            return TRUE;
        } elseif ($rs->num_rows() == 0 && $this->en == $str) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
