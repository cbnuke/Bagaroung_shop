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
        $this->form_validation->set_rules('title[thai]', 'ชื่อหลัก', 'required');
        $this->form_validation->set_rules('subtitle[thai]', 'ชื่อรอง', '');
        $this->form_validation->set_rules('title[english]', '', 'required');
        $this->form_validation->set_rules('subtitle[english]', '', '');
        $this->form_validation->set_rules('link', 'ลิ้งค์', 'required');
        $this->form_validation->set_rules('img', 'รูป', 'required');
    }

    function get_post() {
        $f_data = array(
            'title' => serialize($this->input->post('title')),
            'subtitle' => userialize($this->input->post('subtitle')),            
            'link' => $this->input->post('link'),
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

}
