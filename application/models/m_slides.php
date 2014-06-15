<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_slides extends CI_Model {

    private $mode = NULL;
    private $id = NULL;

    function set_mode($name) {
        $this->mode = $name;
    }

    function get_mode() {
        return $this->mode;
    }

    function set_id($id) {
        $this->id = $id;
    }

    function insert_slide($data) {
        $img['image_id'] = $this->input->post('img');
    }

    function set_validation() {
        $this->form_validation->set_rules('title[thai]', 'ชื่อเรื่อง', 'required');
//        $this->form_validation->set_rules('subtitle[thai]', 'ชื่อเรื่องรอง', '');
//        $this->form_validation->set_rules('title[english]', 'Title', 'required');
//        $this->form_validation->set_rules('subtitle[english]', 'subtitle', '');
//        $this->form_validation->set_rules('link', 'ลิ้งค์', 'required');
//        $this->form_validation->set_rules('userfile', 'รูปภาพ', '');
        
        if ($this->form_validation->run()==TRUE)
        {
            return TRUE;
        }  else {
            return FALSE;    
        }
        
    }

    function get_post() {
        $f_data = array(
            'title' => serialize($this->input->post('title')),
            'subtitle' => serialize($this->input->post('subtitle')),
            'link' => $this->input->post('link'),
            'imades_id' =>  $this->upload_image(),
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

        $config['upload_path'] = "assets/upload";
        $config['allowed_types'] = "gif|jpg|jpeg|png";
        $config['max_size'] = "5000";      
        $config['max_width'] = "1907";
        $config['max_height'] = "1280";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $finfo ='error ->>>'. $this->upload->display_errors();
            return $finfo;
        } else {

            $finfo = $this->upload->data();
            $this->_createThumbnail($finfo['file_name']);
            $data['uploadInfo'] = $finfo;
            $data['thumbnail_name'] = $finfo['raw_name'] . '_thumb' . $finfo['file_ext'];      
            /* echo '<pre>';

              print_r($finfo);

              echo '</pre>'; */
            
            return '0';
        }
    }

    //Create Thumbnail function

    function _createThumbnail($filename) {

        $config['image_library'] = "gd2";
        $config['source_image'] = "assets/upload" . $filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = "100";
        $config['height'] = "100";

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

}
