<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_users');
    }

    public function index() {
        
        $data['users'] = $this->m_users->get_users();

        $this->m_template->set_Title('รายชื่อผู้ใช้งาน');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/users.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        $mode = 'add';
        $data = array('mode' => $mode);
        if ($this->input->post('save') != NULL) {
            $this->m_users->set_mode($mode);
            $data['config'] = $this->m_users->set_validation();
            if ($this->form_validation->run() == TRUE) {
                $f_data = $this->m_users->get_post();
                if ($this->m_users->insert_user($f_data)) {
                    redirect('users', 'refresh');
                    exit();
                }
            }
        }
        $this->m_template->set_Title('เพิ่มผู้ใช้งาน');
        // $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_user.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $mode = 'edit';
        $data = array('mode' => $mode);

        $this->m_users->set_mode($mode);
        $this->m_users->set_id($id);
        $data['user'] = $this->m_users->get_users();

        if ($this->input->post('save') != NULL) {
            $data['config'] = $this->m_users->set_validation();
            //$this->form_validation->set_rules('username', 'Username', 'callback_new_username_check');
            if ($this->form_validation->run() == TRUE) {
                $f_data = $this->m_users->get_post();
                if ($this->m_users->update_user($f_data)) {
                    redirect('users', 'refresh');
                    exit();
                }
            }
        }
        $this->m_template->set_Title('แก้ไขผู้ใช้งาน');
//        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_user.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {
        $this->m_users->set_id($id);
        if ($this->m_users->delete_user()) {
            redirect('users', 'refresh');
            exit();
        }
    }

    function username_check($str) {
        if ($this->m_users->username_check($str)) {
            return FALSE;
        } else {
            return TRUE;
        }
       
    }

    function new_username_check($str) {
        if ($this->m_users->new_username_check($str)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_old_pass($pass) {        
        return $this->m_users->check_old_pass($pass);
    }

}
