<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promotions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_promotions');
    }

    public function index() {

        $data = array();

        $this->m_template->set_Title('โปรโมชั่น');
//      $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/promotions.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {

        if ($this->m_promotions->validation_form_add() && $this->form_validation->run() == TRUE) {
//            $form_data = $this->m_slides->get_post_set_form_add();
//            //Insert data
//            $this->m_slides->insert_slide($form_data);
//            redirect('slides', 'refresh');
//            exit();
        }


        $data['form'] = $this->m_promotions->set_form_add();

        $this->m_template->set_Title('เพิ่มโปรโมชั่น');
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
