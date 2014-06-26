<?php

class Home extends CI_Controller {

    private $language = 'thai';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_home');
        $this->load->library('form_validation');

        //Initial language
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('home', $this->session->userdata('site_lang'));
            $this->language = $this->session->userdata('site_lang');
        } else {
            $this->lang->load('home', 'thai');
            $this->language = 'thai';
        }
    }

    public function index() {
        $data = array();

        $data['language'] = $this->language;
        $data['all_pro'] = $this->m_home->check_all_products();
        $data['promotion']=$this->m_home->check_all_promotions();
        $data['products_has_promotion']=$this->m_home->check_all_products_has_promotion();
        $data['slide'] = $this->m_home->check_slide_enable();

        $this->m_template->set_Content('home.php', $data);
//        $this->m_template->set_Debug($data['slide']);
        $this->m_template->showTemplate();
    }

    public function view() {
        $this->load->view('login');
    }

}
