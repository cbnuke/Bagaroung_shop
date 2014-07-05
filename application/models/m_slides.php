<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_slides extends CI_Model {

    public $slide_id = '';

    function set_id($id) {
        $this->slide_id = $id;
    }

    public function insert_slide($f_data) {
        $this->db->insert('slides', $f_data);
    }

    public function update_slide($f_data) {
        $this->db->where('id', $this->slide_id);
        $this->db->update('slides', $f_data);
    }

    public function delete_slide($slide_id) {
        
        //delete image
        $img_id = $this->get_image_id($slide_id);      
        $this->deleteImage($img_id);

        //delete slide
        $this->db->where('id', $slide_id);
        $this->db->delete('slides');
        
         //delete data in images
        $this->db->where('id', $img_id);
        $this->db->delete('images');  
    }

    function validation_add() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'trim|xss_clean');
        $this->form_validation->set_rules('subtitle[thai]', 'ชื่อเรื่องรอง', 'trim|xss_clean');
        $this->form_validation->set_rules('title[english]', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('subtitle[english]', 'subtitle', 'trim|xss_clean');
        $this->form_validation->set_rules('link_url', 'ลิ้งค์', 'trim|xss_clean');
        if (empty($_FILES['img_slide']['name'])) {
            $this->form_validation->set_rules('img_slide', 'รูปภาพ', 'required|xss_clean');
        }

        return TRUE;
    }

    function validation_edit() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'trim|xss_clean');
        $this->form_validation->set_rules('subtitle[thai]', 'ชื่อเรื่องรอง', 'trim|xss_clean');
        $this->form_validation->set_rules('title[english]', 'Title', 'trim|xss_clean');
        $this->form_validation->set_rules('subtitle[english]', 'subtitle', 'trim|xss_clean');
        $this->form_validation->set_rules('link_url', 'ลิ้งค์', 'trim|xss_clean');
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
            'name' => 'link_url',
            'class' => 'form-control',
            'placeholder' => 'ลิ้งค์',
            'value' => set_value('link_url'));
        $f_img = array(
            'name' => 'img_slide',
            'class' => 'form-control');
        $f_status = array(
            '1' => 'ใช้งาน',
            '0' => 'ไม่ใช้งาน',
        );

        $form_add = array(
            'form' => form_open_multipart('Slides/add', array('class' => 'form-horizontal', 'id' => 'form_slide')),
            'title[thai]' => form_input($f_title_th),
            'title[english]' => form_input($f_title_en),
            'subtitle[thai]' => form_input($f_sub_title_th),
            'subtitle[english]' => form_input($f_sub_title_en),
            'link_url' => form_input($f_link),
            'img_slide' => form_upload($f_img),
            'status_slide' => form_dropdown('status_slide', $f_status, set_value('status_slide'), 'class="form-control"'),
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

        $f_sub_title_th = array(
            'name' => 'subtitle[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อเรื่องรอง',
            'value' => ( set_value('subtitle[thai]') == NULL) ? unserialize($data ['subtitle'])['thai'] : set_value('subtitle[thai]'));

        $f_sub_title_en = array(
            'name' => 'subtitle[english]',
            'class' => 'form-control',
            'placeholder' => 'Sub Title',
            'value' => (set_value('subtitle[english]') == NULL) ? unserialize($data ['subtitle'])['english'] : set_value('subtitle[english]'));

        $f_link = array(
            'name' => 'link_url',
            'class' => 'form-control',
            'placeholder' => 'ลิ้งค์',
            'value' => (set_value('link_url') == NULL) ? $data ['link_url'] : set_value('link_url'));
//        'value' => (set_value('weight') == NULL) ? $data ['weight'] : set_value('weight'));
        $f_img = array(
            'name' => 'img_slide',
            'class' => 'form-control');
        $f_status = array(
            '1' => 'ใช้งาน',
            '0' => 'ไม่ใช้งาน',
        );

        $id = $data['id'];
        $form_edit = array(
            'form' => form_open_multipart('Slides/edit/' . $data['id'], array('class' => 'form-horizontal', 'id' => 'form_slide')),
            'title[thai]' => form_input($f_title_th),
            'title[english]' => form_input($f_title_en),
            'subtitle[thai]' => form_input($f_sub_title_th),
            'subtitle[english]' => form_input($f_sub_title_en),
            'link_url' => form_input($f_link),
            'img_slide' => form_upload($f_img),
            'status_slide' => form_dropdown('status_slide', $f_status, (set_value('status_slide') == NULL) ? $data ['status_slide'] : set_value('status_slide'), 'class="form-control"'),
            'image' => img($this->get_image($id), array('class' => 'img-responsive thumbnail', 'width' => '200', 'height' => '200')),
        );
        //Unset img if NULL        
        if ($form_edit['img_slide'] == NULL)
            unset($form_edit['img_slide']);

        return $form_edit;
    }

    function get_post_set_form_add() {

        $get_page_data = array(
            'title' => serialize($this->input->post('title')),
            'subtitle' => serialize($this->input->post('subtitle')),
            'link_url' => $this->input->post('link_url'),
            'image_id' => $this->upload_image('img_slide'),
            'status_slide' => $this->input->post('status_slide'),
        );

        return $get_page_data;
    }

    function get_post_set_form_edit() {
        $get_page_data = array(
            'title' => serialize($this->input->post('title')),
            'subtitle' => serialize($this->input->post('subtitle')),
            'link_url' => $this->input->post('link_url'),
            'status_slide' => $this->input->post('status_slide'),
        );
        //img_slide if not NULL
        if (!empty($_FILES['img_slide']['name'])) {
            $this->upload_image('img_slide', $this->get_image_id($this->slide_id));
        }
        return $get_page_data;
    }

    function get_all_slide() {
        $this->db->select('slides.id,slides.title,slides.subtitle,slides.link_url,slides.status_slide,slides.create_date,images.img_name,images.img_small,images.img_full ');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');

        $rs = $this->db->get();
// select slides.id,slides.title,slides.subtitle,slides.link_url,slides.status_slide,slides.create_date,images.name,images.small,images.full from slides join images  on images.id = slides.image_id
        if (($rs->num_rows()) == 0) {
            $item = array();
        } else {
            $item = array();
            foreach ($rs->result_array() as $r) {
                $ar = array(
                    'id' => $r['id'],
                    'title' => unserialize($r['title']),
                    'subtitle' => unserialize($r['subtitle']),
                    'link_url' => $r['link_url'],
                    'status_slide' => $r['status_slide'],
                    'create_date' => $r['create_date'],
                    'img_name' => $r['img_name'],
                    'img_small' => $r['img_small'],
                    'img_full' => $r['img_full'],
                );
                array_push($item, $ar);
            }
        }
        return $item;
    }

    function get_silde($id) {
        $this->db->select('slides.id,slides.title,slides.subtitle,slides.link_url,slides.status_slide,slides.create_date,images.img_name,images.img_small,images.img_full,images.img_path');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');
        $this->db->where('slides.id', $id);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;
    }

    function get_image($id) {
        $this->db->select('images.img_full');
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');
        $this->db->where('slides.id', $id);
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
            
            $config['upload_path'] ="assets/img/slides";
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

             $this->image_lib->resize();               
                // to re-size for thumbnail images un-comment and set path here and in json array
                $config2 = array();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $finfo['full_path'];
                $config2['create_thumb'] = TRUE;
                $config2['new_image'] = 'assets/img/slides/thumbs/' . $finfo['file_name'];
                $config2['maintain_ratio'] = TRUE;
                $config2['thumb_marker'] = '';
                 $config2['width'] = 1;
                $config2['height'] = 500;
                $config2['maintain_ratio'] = TRUE;
                $config2['master_dim'] = 'height';
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();

                $data_img = array(
                    'img_name' => $finfo['file_name'],
                    'img_full' => 'slides/' . $finfo['file_name'],
                    'img_small' => 'slides/thumbs/' . $finfo['file_name'],
                    'img_path' => $finfo['file_path'],
                );
//                unlink($finfo['full_path']);
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
                    return;
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
         
        unlink($row['img_path']. $row['img_name']);
        unlink($row['img_path'].'thumbs/' . $row['img_name']);
        
       
    }

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
