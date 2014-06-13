<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
    }

    public function index() {

        $this->m_template->set_Title('รายชื่อผู้ใช้งาน');
        $rs = $this->db->get('users');
        $data['users'] = $rs->result_array();
        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/users.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function add() {
        $this->m_template->set_Title('เพิ่มผู้ใช้งาน');
        $data = array('mode' => 'add');
        $frm = $this->form_validation;


        if ($this->input->post('save') != NULL) {
            $config = array(
                array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'callback_username_is_exist'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'trim|required|min_length[4]|max_length[32]'
                ),
                array(
                    'field' => 'password_con',
                    'label' => 'Password Confirmation',
                    'rules' => 'trim|required|matches[password]'
                )
            );

            $frm->set_message('callback_username_is_exist', 'มีผู้ใช้งานเเล้ว');
            $frm->set_rules($config);

            if ($this->form_validation->run() == TRUE) {

                $ar = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'password' => md5($this->input->post('password')),
                    'user_type' => '2',
                    'created'=>date('Y-m-d H:i:s'),
                );
                $this->db->insert('users',$ar);
                
                redirect('users', 'refresh');
                exit();
            } 
        }

        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_user.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function edit($id) {
        $this->m_template->set_Title('แก้ไขผู้ใช้งาน');
        $data = array('mode' => 'edit');

        $this->db->where('id', $id);
        $query = $this->db->get('users');

        $data['user'] = $query->row_array();

        if ($this->input->post('save') != NULL) {
            $frm = $this->form_validation;
            $check = TRUE;
            if ($this->input->post('password_old') != NULL) {
                $config = array(
                    array(
                        'field' => 'password_old',
                        'label' => 'Password Old',
                        'rules' => 'trim|min_length[4]|max_length[32]|callback_check_old_pass'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[4]|max_length[32]'
                    ),
                    array(
                        'field' => 'password_con',
                        'label' => 'Password Confirmation',
                        'rules' => 'trim|required|matches[password]'
                    )
                );
                $frm->set_rules($config);
                $check = $this->form_validation->run();
                //$check=  $this->check_old_pass();
            }




            if ($check) {
                $ar = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'user_type' => '2',
                );

                if ($this->input->post('password') != NULL) {
                    $ar['password'] = md5($this->input->post('password'));
                }

                $this->db->where('id', $id);
                $this->db->update('users', $ar);

                redirect('users', 'refresh');
                exit();
            }
        }

        $this->m_template->set_Debug($data);
        $this->m_template->set_Content('admin/form_user.php', $data);
        $this->m_template->showTemplateAdmin();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('users');
        redirect('users', 'refresh');
        exit();
    }

    function username_is_exist() {
        $this->db->where('username', trim($this->input->post('username')));
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function check_old_pass() {
        $pass = trim($this->input->post('password_old'));
        $this->db->where('password', md5($pass));
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
