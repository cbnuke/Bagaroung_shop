<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_gallery');
        if ($this->session->userdata('loged_in') != TRUE) {
            redirect('administrator');
        }
    }

    public function index() {

        $data['gallery'] = $this->m_gallery->get_all_gallery();

        $this->m_template->set_Title('แสดงภาพ');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/gallery.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        if ($this->input->post('save') != NULL) {
            if ($this->m_gallery->validation_add() && $this->form_validation->run() == TRUE) {
                $form_data = $this->m_gallery->get_post_set_form_add();
                //Insert data
                $this->m_gallery->insert_gallery($form_data);
                redirect('Gallery');
            }
        }
        //Load form add
        $data['form'] = $this->m_gallery->set_form_add();

        $this->m_template->set_Title('เพิ่มรูปภาพ');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_gallery.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $this->m_gallery->set_id($id);

        if ($this->m_gallery->validation_edit() && $this->form_validation->run() == TRUE) {
            $form_data = $this->m_gallery->get_post_set_form_edit();
            //Update data
            $this->m_gallery->update_gallery($form_data);
            redirect('Gallery');
        }

        //get detail and sent to load form
        $detail = $this->m_gallery->get_gallery($id);
        if ($detail[0] != NULL) {
            $data['form'] = $this->m_gallery->set_form_edit($detail[0]);
            $data['detail'] = $detail[0];
        } else {
            redirect('Gallery');
        }
        $this->m_template->set_Title('แก้ไขรูปภาพ');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_gallery.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {

        $this->m_gallery->delete_gallery($id);
        redirect('Gallery');
    }

    public function cancle($slide_id) {
        $data = array(
            'status' => '0',
        );

        $this->db->where('id', $slide_id);
        $this->db->update('gallery', $data);

        redirect('Gallery');
    }

    public function active($slide_id) {
        $data = array(
            'status' => '1',
        );

        $this->db->where('id', $slide_id);
        $this->db->update('gallery', $data);

        redirect('Gallery');
    }
        function check_products_by_type() {
        $type_id = $this->input->post('type_id');
        $rs = $this->m_gallery->set_products_list($type_id);
//        $rs = $this->m_gallery->check_all_product($type_id);
        echo json_encode($rs);
    }

}

?>