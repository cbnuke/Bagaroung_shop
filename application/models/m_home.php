<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_home extends CI_Model {

    function check_types() {
        $query = $this->db->get('product_types');
        $result = $query->result_array();
        return $result;
    }

    function check_product_in_types($type_id) {        
        $this->db->select('*,products.id');
        $this->db->from('products');
        $this->db->join('products_has_promotions', 'product_id = id', 'left');
        $this->db->join('promotions', 'promotions.id = promotion_id 
                                        and promotions.end > NOW()
                                         and promotions.start < NOW()', 'left'); 
        $this->db->where('product_status', 1);
        $this->db->where('product_type_id', $type_id);
         $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function check_all_products() {
        //Check type
        $types = $this->check_types();
        //Check product in type
        $data = array();
        foreach ($types as $row) {
            $temp = $this->check_product_in_types($row['id']);
            $temp2 = array(
                'id' => $row['id'],
                'product_type' => $row['product_type'],
                'list' => $temp
            );
            array_push($data, $temp2);
        }
        return $data;
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

    function check_all_products_has_promotion() {
        $dt_now = date('Y-m-d H:i:s');
        $this->db->select('*');
        $this->db->from('products_has_promotions');
        $this->db->join('products', 'products.id = products_has_promotions.product_id');
        $this->db->join('promotions', 'promotions.id = promotion_id AND status_promotion = 1', 'left');
        $this->db->where('start <',$dt_now);
        $this->db->where('end >',$dt_now);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;
    }

    function check_slide_enable() {
        $this->db->from('slides');
        $this->db->join('images', 'images.id = slides.image_id');
        $this->db->where('slides.status_slide', 1);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

}
