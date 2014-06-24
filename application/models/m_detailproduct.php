<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_detailproduct extends CI_Model {

    function check_detail_products($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        $result = $query->result_array();
        return $result;
    }

    function check_images($id) {
        $this->db->select();
        $this->db->from('products_has_images');
        $this->db->join('images', 'products_has_images.image_id=images.id', 'left');
        $this->db->where('products_has_images.product_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function check_recommend() {
        $this->db->select();
        $this->db->from('products');
        $this->db->order_by('view_count','desc');
        $this->db->limit(5);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function update_view_count($id) {
        $temp = $this->check_detail_products($id);
        $count = $temp[0]['view_count'];
        $count++;

        $data = array(
            'view_count' => $count
        );

        $this->db->where('id', $id);
        $this->db->update('products', $data);
    }

}
