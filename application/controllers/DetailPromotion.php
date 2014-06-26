<?php

class DetailPromotion extends CI_Controller {

    private $language = 'thai';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_detailpromotion');
        $this->load->library('form_validation');

        //Initial language
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('detailpromotion', $this->session->userdata('site_lang'));
            $this->language = $this->session->userdata('site_lang');
        } else {
            $this->lang->load('detailpromotion', 'thai');
            $this->language = 'thai';
        }
    }

    public function id($id) {
        $data = array();
        $data['language'] = $this->language;
        $data['location'] = uri_string();

        if (isset($id) == FALSE || $id == NULL)
            redirect('home');

        $promotions = $this->m_detailpromotion->get_detail_promotion($id);
        if ($promotions == NULL)
            redirect('home');

        $data['promotion'] = $promotions;
        $data['products'] = $this->m_detailpromotion->get_products_has_promotion($id);

        //get recommend
        $data['recommend'] = $this->m_detailpromotion->get_recommend();



        $this->m_template->set_Content('detailpromotion.php', $data);
//        $this->m_template->set_Debug($data);
        $this->m_template->showTemplate();
    }

}
