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

       function check_all_promotions() {
        $dt_now = date('Y-m-d H:i:s');
        $this->db->select('promotions.id,promotions.name,promotions.detail,promotions.start,promotions.end,promotions.status_promotion,images.img_full,images.img_small');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');       
        $this->db->where('start <',$dt_now);
        $this->db->where('end >',$dt_now);
        $this->db->where('status_promotion',1); 
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;
    }

    function check_recommend() {        
        $this->db->select();
        $this->db->from('products');
        $this->db->join('products_has_promotions', 'product_id = id', 'left'); 
//        $this->db->join('promotions', 'promotions.id = promotion_id AND status_promotion = 1', 'left');  
        $this->db->where('product_status', 1);
        $this->db->order_by('view_count', 'desc');
        $this->db->limit(5);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function check_detail_promotion($product_id) {
        $dt_now = date('Y-m-d H:i:s');
        $this->db->select('promotions.id,promotions.name,promotions.detail,promotions.start,promotions.end,promotions.status_promotion,images.img_full,images.img_small,product_id,promotion_price');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');
        $this->db->join('products_has_promotions', 'promotion_id=promotions.id');
        $this->db->where('start <',$dt_now);
        $this->db->where('end >',$dt_now);
        $this->db->where('status_promotion',1);
        $this->db->where('product_id', $product_id);
        $query = $this->db->get();
        $rs = $query->row_array();

        return $rs;
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
