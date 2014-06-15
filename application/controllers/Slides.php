<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slides extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_slides');
    }

    public function index() {

        $data['slides'] = $this->m_slides->get_slides();

        $this->m_template->set_Title('สไลด์');
        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/slides.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {

        $data = array('mode' => 'add');

        if ($this->input->post('save') != NULL) {

            $validation = $this->m_slides->set_validation();
            if ($validation == TRUE) {
//                $data['img_info'] = $this->m_slides->upload_image();
//                $data['f_post'] = $this->m_slides->get_post();
//            $this->db->set('title', serialize($this->input->post('s_title')));
//            $this->db->set('subtitle', serialize($this->input->post('s_subtitle')));
//            $this->db->set('link_url', $this->input->post('link'));
//            $this->db->set('status_slide', $this->input->post('status'));
//            $this->db->set('image_id', $this->input->post('img'));
//            $this->db->insert('slides');
//                redirect('slides', 'refresh');
//                exit();
            }
        }
        $this->m_template->set_Title('เพิ่มสไลด์');
        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_slide.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $this->m_template->set_Title('แก้ไขสไลด์');
        $data = array('mode' => 'edit');

//        $this->db->select('slides');
//        $rs = $this->db->get_where('slides', array('id' => $id));
//         
//            $item = array();
//            foreach ($rs->result_array() as $r) {
//                $ar = array(
//                    'title'=> unserialize('title'),
//                    'subtitle'=>unserialize('subtitle'),
//                    'link_url'=> 'link_url',
//                    'status_slide'=>'status_slide',
//                    'image_id'=>'image_id',                    
//                );
//                array_push($item, $ar);
//            }
//            $data['slide'] = $item;


        if ($this->input->post('save') != NULL) {

            $this->db->set('title', serialize($this->input->post('s_title')));
            $this->db->set('subtitle', serialize($this->input->post('s_subtitle')));
            $this->db->set('link_url', $this->input->post('link'));
            $this->db->set('status_slide', $this->input->post('status'));
            $this->db->set('image_id', $this->input->post('img'));
            //$this->db->update('product_types');

            redirect('slides', 'refresh');
            exit();
        }

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_slide.php', $data);
        $this->m_template->showTemplateAdmin();
    }

}

?>