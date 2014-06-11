<?php

class DetailProduct extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->library('form_validation');

        //Initial language
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('detailproduct', $this->session->userdata('site_lang'));
        } else {
            $this->lang->load('detailproduct', 'thai');
        }
    }

    public function index() {
        $data = array();
        //$this->load->view('test');



        $this->m_template->set_Content('detailproduct.php', $data);
        $temp = array('a' => lang('welcome'), 'b' => 2);
        //$this->m_template->set_Debug($temp);
        $this->m_template->showTemplate();
    }
      public function view() {
        $this->load->view('login');
    }

}
