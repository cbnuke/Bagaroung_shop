<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_Users extends CI_Model {

    private $mode = NULL;
    private $id = NULL;

    function set_mode($name) {
        $this->mode = $name;
    }

    function get_mode() {
        return $this->mode;
    }

    function set_id($id) {
        $this->id = $id;
    }

    public function insert_user($data) {

        try {
            $this->db->insert('users', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function update_user($data) {
        try {
            $this->db->where('id', $this->id);
            $this->db->update('users', $data);
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    public function delete_user() {
        try {
            $this->db->where('id', $this->id);
            $this->db->delete('users');
            return TRUE;
        } catch (Exception $exc) {
            return FALSE;
        }
    }

    function get_post() {
        $f_data = array(
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'user_type' => '2',
        );
        if ($this->mode == 'add') {
            $f_data['password'] = md5($this->input->post('password'));
            $f_data['created'] = date('Y-m-d H:i:s');
        } else {

            if ($this->input->post('password') != NULL) {
                $f_data['password'] = md5($this->input->post('password'));
            }
        }
        return $f_data;
    }

    function set_validation() {

        $config = array(
            array(
                'field' => 'firstname',
                'label' => 'ชื่อ',
                'rules' => 'required|xss_clean'
            ),
            array(
                'field' => 'lastname',
                'label' => 'นามสกุล',
                'rules' => 'required|xss_clean'
            )
        );

        $username = array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|xss_clean|callback_username_check'
        );
        $pass = array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|xss_clean|trim|min_length[4]|max_length[32]'
        );

        $pass_con = array(
            'field' => 'password_con',
            'label' => 'Password Confirmation',
            'rules' => 'required|xss_clean|trim|matches[password]'
        );


        if ($this->get_mode() == 'edit') {

            if ($this->check_username_change() == TRUE) {
                $username = array(
                    'field' => 'username',
                    'label' => 'Username',
                    'rules' => 'required|xss_clean|callback_new_username_check'
                );
                array_push($config, $username);
            }

            if ($this->input->post('password_old') != NULL) {
                $pass_old = array(
                    'field' => 'password_old',
                    'label' => 'Password Old',
                    'rules' => 'trim|max_length[32]|xss_clean|callback_check_old_pass'
                );
                array_push($config, $pass_old);
                array_push($config, $pass);
                array_push($config, $pass_con);
            }
        } else {
            array_push($config, $username);
            array_push($config, $pass);
            array_push($config, $pass_con);
        }

        $this->form_validation->set_message('username_check', '%s มีผู้ใช้งานแล้ว ');
        $this->form_validation->set_message('new_username_check', '%s มีผู้ใช้งาน ');
        $this->form_validation->set_message('check_old_pass', 'รหัสไม่ถูกต้อง');
        $rs1 = $this->form_validation->set_rules($config);

        $rs = $config;

        return $rs;
    }

    function get_users() {
        $id = $this->id;
        if ($id != NULL) {
            $this->db->where('id', $id);
            $query = $this->db->get('users');
            $rs = $query->row_array();
        } else {
            $query = $this->db->get('users');
            $rs = $query->result_array();
        }

        return $rs;
    }

    function check_username_change() {
        $this->db->where('id', $this->id);
        $query = $this->db->get('users');

        $user = $query->row_array();

        $old = $user['username'];
        $new = $this->input->post('username');

        if ($old == $new) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function username_check($str) {
        $this->db->where('username', $str);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {            
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function new_username_check($str) {
        $this->db->where('username', $str);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {           
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function check_old_pass($pass) {
        $this->db->where('password', md5($pass));
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
