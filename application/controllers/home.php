<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->library('form_validation');

        //Initial language
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('home', $this->session->userdata('site_lang'));
        } else {
            $this->lang->load('home', 'thai');
        }
    }

    public function index() {
        $data = array();
        //$this->load->view('test');



        $this->m_template->set_Content('home.php', $data);
        $temp = array('a' => lang('welcome'), 'b' => 2);
//        $this->m_template->set_Debug($temp);
        $this->m_template->showTemplate();
    }

}
