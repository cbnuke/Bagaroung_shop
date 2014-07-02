<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_products');
        $this->load->helper('file');
        if ($this->session->userdata('loged_in') != TRUE) {
            redirect('administrator');
        }
    }

    public function index() {
        $i_type = array();
        $temp = $this->m_products->check_product_type();
        $i_type[0] = "ทั้งหมด";
        foreach ($temp as $row) {
            $i_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }
        if ($this->input->post('product_type_id') == null || $this->input->post('product_type_id') == 0) {
            $data['list_products'] = $this->m_products->check_all_product();
        } else {
            $data['list_products'] = $this->m_products->check_all_product_by_type($this->input->post('product_type_id'));
        }

        $data['product_types'] = form_dropdown('product_type_id', $i_type, (set_value('product_type_id') == NULL) ? $this->input->post('product_type_id') : set_value('product_type_id'), 'class="form-control" name="product_type_id" onchange="myform.submit();"');

        $this->m_template->set_Title('สินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/products.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function view($id) {

        $detail = $this->m_products->check_detail_product($id);
        $images = $this->m_products->check_images_by_product($id);
        if ($detail[0] != NULL) {
            $data['data'] = $detail[0];
            $data['data']['type_name'] = $this->m_products->check_product_type($detail[0]['product_type_id']);
            $data['images'] = $images;
        } else
            redirect('Products');

        $name = unserialize($detail[0]['product_name'])['thai'];

        $this->m_template->set_Title('สินค้า ' . $name);
//        $this->m_template->set_Debug($data);
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
            if ($this->m_products->insert_product($form_data)) {
                //Success
                redirect('Products');
            } else {
                //Fail
            }
        }
        //Load form
        $data['form'] = $this->m_products->set_form_add();

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {

        $data = array('page_title' => 'แก้ไข้สินค้า');

        if ($this->m_products->validation_set_form_edit() && $this->form_validation->run() == TRUE) {
            $form_data = $this->m_products->get_post_set_form_edit();
            //Serialize data and prepare id
            $form_data['id'] = $id;
            $form_data['product_name'] = serialize($form_data['product_name']);
            $form_data['detail'] = serialize($form_data['detail']);
            //Update data
            if ($this->m_products->update_product($form_data)) {
                //Success
                redirect('Products');
            } else {
                //Fail
            }
        }

        //Check detail and sent to load form
        $detail = $this->m_products->check_detail_product($id);
        if ($detail[0] != NULL) {
            $data['form'] = $this->m_products->set_form_edit($detail[0]);
            $data['detail'] = $detail[0];
        } else
            redirect('Products');

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_edit.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {
        $this->m_products->delete_product($id);
        redirect('Products', 'refresh');
    }

    public function cancle($id) {
        $data = array(
            'product_status' => '0',
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);

        redirect('Products', 'refresh');
    }

    public function active($id) {
        $data = array(
            'product_status' => '1',
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);

        redirect('Products', 'refresh');
    }

}
