<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_producttypes extends CI_Model {

 
    private $id = NULL;   

    function set_id($id) {
        $this->id = $id;
    }

    public function insert_type($data) {
        try {
            $this->db->insert('product_types', $data);
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    public function update_type($f_data) {
        try {
            $this->db->where('id', $this->id);
            $this->db->update('product_types', $f_data);
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    public function delete_type() {
        try {
            $this->db->where('id', $this->id);
            $this->db->delete('product_types');
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    function get_post_form_add() {
        $f_data = array(
            'product_type' => serialize($this->input->post('type')),
        );

        return $f_data;
    }

    function get_post_form_edit() {
        $f_data = array(
            'product_type' => serialize($this->input->post('type')),
        );

        return $f_data;
    }

    function get_post() {

        $f_data = array(
            'product_type' => serialize($this->input->post('type')),
        );

        return $f_data;
    }

    function validation_form_add() {
        $this->form_validation->set_rules('type[thai]', 'ชื่อประเภทสินค้า', 'required|trim|xss_clean|callback_check_type_exit_add');
        $this->form_validation->set_rules('type[english]', 'Product Type', 'trim|required|xss_clean|callback_check_type_exit_add');
        $this->form_validation->set_message('check_type_exit_add', ' %s ถูกใช้งานเเล้ว');
        return TRUE;
    }

    function validation_form_edit() {

        $this->form_validation->set_rules('type[thai]', 'ชื่อประเภทสินค้า', 'required|trim|xss_clean');
        $this->form_validation->set_rules('type[english]', 'Product Type', 'required|trim|xss_clean');
        $this->form_validation->set_message('check_type_exit_edit', ' %s ถูกใช้งานเเล้ว');

        return $this->form_validation->run();
    }

    function set_form_add() {
        $f_type_th = array(
            'name' => 'type[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อประเภทสินค้า',
            'value' => set_value('type[thai]'));

        $f_type_en = array(
            'name' => 'type[english]',
            'class' => 'form-control',
            'placeholder' => 'Product Type',
            'value' => set_value('type[english]'));

        $form_add = array(
            'form' => form_open_multipart('ProductTypes/add', array('class' => 'form-horizontal', 'id' => 'form_type')),
            'type[thai]' => form_input($f_type_th),
            'type[english]' => form_input($f_type_en),
        );
        return $form_add;
    }

    function set_form_edit($data) {
        $f_type_th = array(
            'name' => 'type[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อประเภทสินค้า',
            'value' => set_value('type[thai]') == NULL ? unserialize($data ['product_type'])['thai'] : set_value('type[thai]')
        );

        $f_type_en = array(
            'name' => 'type[english]',
            'class' => 'form-control',
            'placeholder' => 'Product Type',
            'value' => set_value('type[english]') == NULL ? unserialize($data ['product_type'])['english'] : set_value('type[english]')
        );

        $form_edit = array(
            'form' => form_open_multipart('ProductTypes/edit/' . $data['id'], array('class' => 'form-horizontal', 'id' => 'form_type')),
            'type[thai]' => form_input($f_type_th),
            'type[english]' => form_input($f_type_en),
        );
        return $form_edit;
    }

    public function get_types($id = NULL) {
        if ($id != NULL) {
            $this->db->where('id', $id);
            $query = $this->db->get('product_types');
            $rs = $query->row_array();
            return $rs;
        } else {
//            mode view
            $rs = $this->db->get('product_types');
            if ($rs->num_rows() != 0) {
                $item = array();
                foreach ($rs->result_array() as $r) {
                    $ar = array(
                        'id' => $r['id'],
                        'product_type' => unserialize($r['product_type']),
                        'number' => $this->count_product($r['id']),
                    );
                    array_push($item, $ar);
                }
                return $item;
            }
            return $item;
        }
    }

    function count_product($id) {
        $rs = $this->db->get_where('products', array('product_type_id' => $id));
        return $rs->num_rows();
    }

}
