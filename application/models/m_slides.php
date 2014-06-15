<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_slides extends CI_Model {

    public function insert_slide($f_data) {
        try {
            $this->db->insert('slides', $f_data);
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    function validation_add() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subtitle[thai]', 'ชื่อเรื่องรอง', 'required|trim|xss_clean');
        $this->form_validation->set_rules('title[english]', 'Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('subtitle[english]', 'subtitle', 'required|trim|xss_clean');
        $this->form_validation->set_rules('link', 'ลิ้งค์', 'trim|required|xss_clean');
        if (empty($_FILES['userfile']['name'])) {
            $this->form_validation->set_rules('userfile', 'รูปภาพ', '');
        }
        
        return TRUE;
    }

    function set_form_add() {
        $f_title_th = array(
            'name' => 'title[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อเรื่อง',
            'value' => set_value('title[thai]'));

        $f_title_en = array(
            'name' => 'title[english]',
            'class' => 'form-control',
            'placeholder' => 'Title',
            'value' => set_value('title[english]'));

        $f_sub_title_th = array(
            'name' => 'subtitle[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อเรื่องรอง',
            'value' => set_value('subtitle[thai]'));

        $f_sub_title_en = array(
            'name' => 'subtitle[english]',
            'class' => 'form-control',
            'placeholder' => 'Sub Title',
            'value' => set_value('subtitle[english]'));

        $f_link = array(
            'name' => 'link',
            'class' => 'form-control',
            'placeholder' => 'ลิ้งค์',
            'value' => set_value('link'));

        $form_add = array(
            'form' => form_open_multipart('slides/add', array('class' => 'form-horizontal', 'id' => 'form_slide')),
            'title[thai]' => form_input($f_title_th),
            'title[english]' => form_input($f_title_en),
            'subtitle[thai]' => form_input($f_sub_title_th),
            'subtitle[english]' => form_input($f_sub_title_en),
            'link' => form_input($f_link),
        );

        return $form_add;
    }

    function get_post() {

        $f_data = array(
            'title' => serialize($this->input->post('title')),
            'subtitle' => serialize($this->input->post('subtitle')),
            'link_url' => $this->input->post('link'),
            'image_id' => $this->upload_image(),
            'status_slide' => $this->input->post('status'),
        );

        return $f_data;
    }

    function get_slides() {
        $this->db->select('slides.id,slides.title,slides.subtitle,slides.status_slide,slides.create_date,images.name,images.small,images.full');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');

        $rs = $this->db->get();
// select slides.id,slides.title,slides.subtitle,slides.status_slide,slides.create_date,images.name,images.small,images.full from slides join images  on images.id = slides.image_id
        if (($rs->num_rows()) == 0) {
            $item = array();
        } else {
            $item = array();
            foreach ($rs->result_array() as $r) {
                $ar = array(
                    'id' => $r['id'],
                    'title' => unserialize($r['title']),
                    'subtitle' => unserialize($r['subtitle']),
                    'status_slide' => $r['status_slide'],
                    'create_date' => $r[''],
                    'name' => $r['name'],
                    'small' => $r['small'],
                    'full' => $r['full'],
                );
                array_push($item, $ar);
            }
        }
        return $item;
    }

    function get_silde($id) {
        $this->db->select('slides.id,slides.title,slides.subtitle,slides.status_slide,slides.create_date,images.name,images.small,images.full');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');
        $this->db->where('slides.id', $id);
        $rs = $this->db->get();
        $rs = $query->row_array();
        return $rs;
    }

    function upload_image() {

        $config['upload_path'] = "assets/img/slides";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $finfo = $this->upload->display_errors();
            return '0';
        } else {
            $finfo = $this->upload->data();

            $data_img = array(
                'name' => $finfo['file_name'],
                'full' => $finfo['full_path'],
                'path' => $finfo['file_path']
            );

            $this->db->insert('images', $data_img);

            $query = $this->db->get_where('images', $data_img);
            $rs = $query->row_array();
            return $rs['id'];
            /* echo '<pre>';

              print_r($finfo);

              echo '</pre>'; */
//            [file_name] => vord1.jpg
//                    [file_type] => image/jpeg
//                    [file_path] => /Applications/MAMP/htdocs/Bagaroung_shop/assets/img/slides/
//                    [full_path] => /Applications/MAMP/htdocs/Bagaroung_shop/assets/img/slides/vord1.jpg
//                    [raw_name] => vord1
//                    [orig_name] => vord.jpg
//                    [client_name] => vord.jpg
//                    [file_ext] => .jpg
//                    [file_size] => 51.88
//                    [is_image] => 1
//                    [image_width] => 585
//                    [image_height] => 844
//                    [image_type] => jpeg
//                    [image_size_str] => width="585" height="844"
        }
    }
}