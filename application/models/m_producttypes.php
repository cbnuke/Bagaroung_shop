<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_producttypes extends CI_Model {

    private $mode = NULL;
    private $id = NULL;

    function set_mode($name) {
        $this->mode = $name;
    }

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

    function get_post() {

        $f_data = array(
            'product_type' => serialize($this->input->post('type')),
        );

        return $f_data;
    }

    public function get_types() {
        $id = $this->id;
        $data = array();
        if ($id != NULL) {
            $this->db->where('id', $id);
            $query = $this->db->get('product_types');
            $rs = $query->row_array();
            $data = array(
                'id' => $rs['id'],
                'product_type' => unserialize($rs['product_type']),
            );
            return $data;
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

    function set_validation() {
        if ($this->mode == 'add') {
            $config = array(
                array(
                    'field' => 'type[thai]',
                    'label' => 'ชื่อประเภท',
                    'rules' => 'required|xss_clean|callback_check_type_th'
                ),
                array(
                    'field' => 'type[english]',
                    'label' => 'Type name',
                    'rules' => 'required|xss_clean|callback_check_type_en'
                )
            );
            $this->form_validation->set_message('check_type_th', '%s ถูกใช้งานแล้ว');
            $this->form_validation->set_message('check_type_en', '%s ถูกใช้งานแล้ว');
        } else {
            $config = array(
                array(
                    'field' => 'type[thai]',
                    'label' => 'ชื่อประเภท',
                    'rules' => 'required|xss_clean'
                ),
                array(
                    'field' => 'type[english]',
                    'label' => 'Type name',
                    'rules' => 'required|xss_clean'
                )
            );
        }
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_type_th($str) {
        $t = $this->check_type_exit('thai', $str);
        if ($str == 't') {
//            return 'FALSE';
            return FALSE;
        } else {
//            return 'TRUE';
            return TRUE;
        }
    }

    public function check_type_en($str) {
        $t = $this->check_type_exit('english', $str);
        if ($str == 't') {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_type_exit($lang, $str) {
        $rs = $this->db->get('product_types');
        $item = array();
        if ($rs->num_rows() > 0) {
            foreach ($rs->result_array() as $r) {
                $ar = array(
                    'product_type' => unserialize($r['product_type'])
                );
                array_push($item, $ar);
            }
            foreach ($item as $i) {
                if ($lang == 'thai') {
                    if ($i['product_type']['thai'] == $str) {
                        return $i['product_type']['thai'];
//                        return TRUE;
//                        return FALSE;
                    }
                } else {
                    if ($i['product_type']['english'] == $str) {
                        return $i['product_type']['english'];
//                        return TRUE;
                        //return FALSE;
                    }
                }
            }

            return $str;
//            return TRUE;
        } else {
            return $str;
//            return TRUE;
        }
    }

}
