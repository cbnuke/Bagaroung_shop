<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductTypes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_producttypes');
    }

    private $s = '';

    public function set_s($str) {
        $this->s = $str;
    }

    public function index() {
        $data = array();
        $data['type'] = $this->m_producttypes->get_types();

        $this->m_template->set_Title('ประเภทสินค้า');
    //    $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/product_types.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        $mode = 'add';
        $data = array('mode' => $mode);
        if ($this->input->post('save') != NULL) {
            $check = $this->m_producttypes->set_validation();
            if ($check == TRUE) {
                $f_data = $this->m_producttypes->get_post();
                $data['check_validate'] = 'TRUE';
                if ($this->m_producttypes->insert_type($f_data)) {
                    redirect('ProductTypes', 'refresh');
                    exit();
                }
            } else {
                $data['check_validate'] = 'FLASE';
            }
        }

        $this->m_template->set_Title('เพิ่มประเภทสินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $mode = 'edit';
        $data = array('mode' => 'edit');
        $this->m_producttypes->set_id($id);
        $this->m_producttypes->set_mode($mode);
        $data['type'] = $this->m_producttypes->get_types();

        if ($this->input->post('save') != NULL) {
            $check = $this->m_producttypes->set_validation();
            if ($check == TRUE) {
                $f_data = $this->m_producttypes->get_post();
                if ($this->m_producttypes->update_type($f_data)) {
                    redirect('ProductTypes', 'refresh');
                    exit();
                }
            }
        }

        $this->m_template->set_Title('แก้ไขประเภทสินค้า');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_product_type.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {
        $this->m_producttypes->set_id($id);
        if ($this->m_producttypes->delete_type()) {
            redirect('ProductTypes', 'refresh');
            exit();
        }
    }

//    public function set_type($data) {
//        $th = $data['thai'];
//        $en = $data['english'];
//        $this->set_th($th);
//        $this->set_en($en);
//    }
//
//    public $th = '';
//    public $en = '';
//
//    public function set_th($str) {
//        $this->th = $str;
//    }
//    public function get_th() {
//        return $this->th;
//    }
//
//    public function set_en($str) {
//        $this->en = $str;
//    }
//    public function test() {
//        $data = array('mode' => 'add');
//        if ($this->input->post('save') != NULL) {
//            $data['type'] = $this->input->post('type');
//            $this->set_type($data['type']);
//            $data['str_th']=$this->s;
//            $data['th'] = $this->th;
//            $data['en'] = $this->en;
//
//
//            $this->form_validation->set_rules('type[thai]', 'ชื่อประเภท', 'required|xss_clean|callback_check_type_th');
//            $this->form_validation->set_rules('type[english]', 'Type name', 'required|xss_clean|callback_check_type_en');
//
//            $this->form_validation->set_message('check_type_th', '%s ถูกใช้งานแล้ว');
//            $this->form_validation->set_message('check_type_en', '%s ถูกใช้งานแล้ว');
//
//            if ($this->form_validation->run() == TRUE) {
//                
//            }
//        }
//
//
//        $this->m_template->set_Title('เพิ่มประเภทสินค้า');
//        $this->m_template->set_Debug($data);
//        $this->m_template->set_Content('admin/form_product_type.php', $data);
//        $this->m_template->showTemplateAdmin();
//    }
//
//    public function check_type_th($str) {
//        $data['type'] = $this->input->post('type');
//        $this->set_type($data['type']);
//        $str = $this->th;
//        
//        $t = $this->m_producttypes->check_type_exit('thai', $str);
//        if ($str == $t) {
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }
//
//    public function check_type_en($str) {
//        $t = $this->m_producttypes->check_type_exit('english', $str);
//        if ($str == $t) {
//            return FALSE;
//        } else {
//            return TRUE;
//        }
//    }
}
?>



