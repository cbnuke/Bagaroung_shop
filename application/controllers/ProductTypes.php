<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

 
    public function index() {       
        $this->m_template->set_Title('ประเภทสินค้า');

        $rs = $this->db->get('product_types');
        if (($rs->num_rows()) == 0) {
            $data['type'] = array();
        } else {
            $item = array();
            foreach ($rs->result_array() as $r) {
                $ar = array(
                    'id' => $r['id'],
                    'product_type' => unserialize($r['product_type'])
                );
                array_push($item, $ar);
            }
            $data['type'] = $item;
        }       

//        $this->m_template->set_Debug(json_decode(($data_)));
        $this->m_template->set_Content('admin/product_types.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {       
        $this->m_template->set_Title('เพิ่มประเภทสินค้า');
        $data = array('mode'=>'add');

        if ($this->input->post('save') != NULL) {

            $this->db->set('product_type', serialize($this->input->post('type')));
            $this->db->insert('product_types');

            redirect('ProductTypes', 'refresh');
            exit();
        }

//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {        
        $this->m_template->set_Title('แก้ไขประเภทสินค้า');
        $data = array('mode'=>'edit');
        $this->db->select('product_type');
        $rs = $this->db->get_where('product_types', array('id' => $id));

        $item = array();
        foreach ($rs->result_array() as $r) {
            $ar = array(
                'product_type' => unserialize($r['product_type'])
            );
            array_push($item, $ar);
        }
        $data['type'] = $item;

        if ($this->input->post('save') != NULL) {            
            $dt =array('product_type'=>serialize($this->input->post('type')));
            $this->db->where('id', $id);
            $this->db->update('product_types',$dt);

            redirect('ProductTypes', 'refresh');
            exit();
        }


//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }
}
?>



