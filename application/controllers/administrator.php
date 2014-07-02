<?php

class administrator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_login');
        $this->load->model('m_template');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        if ($this->m_login->set_validation() && $this->form_validation->run() == TRUE) {
            $input = $this->m_login->get_post();
            $user = $this->m_login->select_user($input['username'], $input['password']); 
//            $user['loged_in'] = TRUE;
//            $this->session->set_userdata($user);
            redirect('Products', 'refresh');
        }
        $this->load->view('login');
    }

    public function logout() {        
        $this->session->sess_destroy();
        redirect('home');
    }

    public function username_check($str) {
        $check = $this->m_login->username_check($str);
        if ($check) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function password_check($str) {
        $check = $this->m_login->username_check($str);
        if ($check) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
