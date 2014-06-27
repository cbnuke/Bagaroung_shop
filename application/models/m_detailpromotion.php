<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_detailpromotion extends CI_Model {

    function get_detail_promotion($id) {
        $this->db->select('promotions.id,promotions.name,promotions.detail,promotions.start,promotions.end,promotions.status_promotion,images.img_full,images.img_small');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');
        $this->db->where('status_promotion', 1);
        $this->db->where('promotions.id', $id);
        $query = $this->db->get();
        $rs = $query->row_array();

        return $rs;
    }

    function get_products_has_promotion($promotion_id = NULL) {
        $this->db->select('*');
        $this->db->from('products_has_promotions');
        $this->db->join('products', 'products.id = products_has_promotions.product_id');
        if ($promotion_id != NULL) {
            $this->db->where('promotion_id', $promotion_id);
        }
        $this->db->where('product_status', 1);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;
    }

    function get_recommend() {
        $this->db->select();
        $this->db->from('products');
        $this->db->where('product_status', 1);
        $this->db->order_by('view_count', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
