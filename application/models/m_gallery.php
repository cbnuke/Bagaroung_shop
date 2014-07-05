<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_gallery extends CI_Model {

    public $slide_id = '';

    function set_id($id) {
        $this->slide_id = $id;
    }

    public function insert_gallery($f_data) {
        $this->db->insert('gallery', $f_data);
    }

    public function update_gallery($f_data) {
        $this->db->where('id', $this->slide_id);
        $this->db->update('gallery', $f_data);
    }

    public function delete_gallery($slide_id) {

        //delete image
        $img_id = $this->get_image_id($slide_id);
        $this->deleteImage($img_id);

        //delete slide
        $this->db->where('id', $slide_id);
        $this->db->delete('gallery');

        //delete data in images
        $this->db->where('id', $img_id);
        $this->db->delete('images');
    }

    function validation_add() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'trim|xss_clean');
        $this->form_validation->set_rules('title[english]', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('link_url', 'ลิ้งค์', 'trim|xss_clean');
        if (empty($_FILES['img_upload']['name'])) {
            $this->form_validation->set_rules('img_upload', 'รูปภาพ', 'required|xss_clean');
        }

        return TRUE;
    }

    function validation_edit() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'trim|xss_clean');
        $this->form_validation->set_rules('title[english]', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('link_url', 'ลิ้งค์', 'trim|xss_clean');
        return TRUE;
    }

    function set_form_add() {
        $f_title_th = array(
            'name' => 'title[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อรูป',
            'value' => set_value('title[thai]'));

        $f_title_en = array(
            'name' => 'title[english]',
            'class' => 'form-control',
            'placeholder' => 'Title',
            'value' => set_value('title[english]'));

        $f_link = array(
            'name' => 'link_url',
            'class' => 'form-control',
            'placeholder' => 'ลิ้งค์',
            'value' => set_value('link_url'));
        $f_img = array(
            'name' => 'img_upload',
            'class' => 'form-control');
        $f_status = array(
            '1' => 'ใช้งาน',
            '0' => 'ไม่ใช้งาน',
        );

        $form_add = array(
            'form' => form_open_multipart('Gallery/add', array('class' => 'form-horizontal', 'id' => 'form_slide')),
            'title[thai]' => form_input($f_title_th),
            'title[english]' => form_input($f_title_en),
            'link_url' => form_input($f_link),
            'img_upload' => form_upload($f_img),
            'status' => form_dropdown('status', $f_status, set_value('status'), 'class="form-control"'),
            'image' => NULL,
        );

        return $form_add;
    }

    function set_form_edit($data) {
        $f_title_th = array(
            'name' => 'title[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อเรื่อง',
            'value' => (set_value('title[thai]') == NULL) ? unserialize($data ['title'])['thai'] : set_value('[thai]'));
        $f_title_en = array(
            'name' => 'title[english]',
            'class' => 'form-control',
            'placeholder' => 'Title',
            'value' => (set_value('title[english]') == NULL) ? unserialize($data ['title'])['english'] : set_value('title[english]'));
        $f_link = array(
            'name' => 'link_url',
            'class' => 'form-control',
            'placeholder' => 'ลิ้งค์',
            'value' => (set_value('link_url') == NULL) ? $data ['link_url'] : set_value('link_url'));
        $f_img = array(
            'name' => 'img_upload',
            'class' => 'form-control');
        $f_status = array(
            '1' => 'ใช้งาน',
            '0' => 'ไม่ใช้งาน',
        );

        $id = $data['id'];
        $form_edit = array(
            'form' => form_open_multipart('Gallery/edit/' . $data['id'], array('class' => 'form-horizontal', 'id' => 'form_slide')),
            'title[thai]' => form_input($f_title_th),
            'title[english]' => form_input($f_title_en),
            'link_url' => form_input($f_link),
            'img_upload' => form_upload($f_img),
            'status' => form_dropdown('status', $f_status, (set_value('status') == NULL) ? $data ['status'] : set_value('status'), 'class="form-control"'),
            'image' => img($this->get_image($id), array('class' => 'img-responsive thumbnail', 'width' => '200', 'height' => '200')),
        );
        //Unset img if NULL        
        if ($form_edit['img_upload'] == NULL)
            unset($form_edit['img_upload']);

        return $form_edit;
    }

    function get_post_set_form_add() {

        $get_page_data = array(
            'title' => serialize($this->input->post('title')),
            'link_url' => $this->input->post('link_url'),
            'image_id' => $this->upload_image('img_upload'),
            'status' => $this->input->post('status')
        );

        return $get_page_data;
    }

    function get_post_set_form_edit() {
        $get_page_data = array(
            'title' => serialize($this->input->post('title')),
            'link_url' => $this->input->post('link_url'),
            'status' => $this->input->post('status'),
        );
        //img_slide if not NULL
        if (!empty($_FILES['img_upload']['name'])) {
            $this->upload_image('img_upload', $this->get_image_id($this->slide_id));
        }
        return $get_page_data;
    }

    function get_all_gallery() {
        $this->db->select('*,gallery.id');
        $this->db->from('gallery');
        $this->db->join('images', 'images.id = gallery.image_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_gallery($id) {
        $this->db->select('*,gallery.id');
        $this->db->from('gallery');
        $this->db->join('images', 'images.id = gallery.image_id');
        $this->db->where('gallery.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_image($id) {
        $this->db->select('images.img_full');
        $this->db->from('gallery');
        $this->db->join('images', 'images.id = gallery.image_id');
        $this->db->where('gallery.id', $id);
        $query = $this->db->get();
        $row = $query->row_array();

        return $row['img_full'];
    }

    function get_image_id($slide_id) {
        $this->db->select('images.id');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');
        $this->db->where('slides.id', $slide_id);
        $query = $this->db->get();
        $row = $query->row_array();

        return $row['id'];
    }

    function upload_image($name, $id = NULL) {

        if (!empty($_FILES[$name]['name'])) {

            $config['upload_path'] = "assets/img/gallery";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = "5000";
            $config['max_width'] = "2920";
            $config['max_height'] = "2080";

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload($name)) {
                return $this->upload->display_errors();
            } else {
                //insert to database
                $finfo = $this->upload->data();

                $config2 = array();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $finfo['full_path'];
                $config2['create_thumb'] = TRUE;
                $config2['new_image'] = 'assets/img/gallery/thumbs/' . $finfo['file_name'];
                $config2['thumb_marker'] = '';
                $config2['width'] = 360;
                $config2['height'] = 1;
                $config2['maintain_ratio'] = TRUE;
                $config2['master_dim'] = 'width';
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();

                $data_img = array(
                    'img_name' => $finfo['file_name'],
                    'img_full' => 'gallery/' . $finfo['file_name'],
                    'img_small' => 'gallery/thumbs/' . $finfo['file_name'],
                    'img_path' => $finfo['file_path'],
                );
                if ($id == NULL) {
                    $this->db->trans_start();
                    $this->db->insert('images', $data_img);
                    $image_id = $this->db->insert_id();
                    $this->db->trans_complete();
                    return $image_id;
                } else {
                    $this->deleteImage($id);
                    $this->db->where('id', $id);
                    $this->db->update('images', $data_img);
                    return TRUE;
                }
            }
        }
    }

    public function deleteImage($image_id) {
        $this->db->select('img_path,img_name');
        $this->db->from('images');
        $this->db->where('id', $image_id);
        $query = $this->db->get();
        $row = $query->row_array();

        unlink($row['img_path'] . $row['img_name']);
        unlink($row['img_path'] . 'thumbs/' . $row['img_name']);
    }

}
