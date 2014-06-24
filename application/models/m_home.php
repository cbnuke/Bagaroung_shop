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
        $query = $this->db->get_where('products', array('product_type_id' => $type_id));
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

}
