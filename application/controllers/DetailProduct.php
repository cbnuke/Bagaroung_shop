<?php

class DetailProduct extends CI_Controller {

    private $language = 'thai';

    public function __construct() {
        parent::__construct();
        $this->load->model('m_template');
        $this->load->model('m_detailproduct');
        $this->load->library('form_validation');

        //Initial language
        $site_lang = $this->session->userdata('site_lang');
        if ($site_lang) {
            $this->lang->load('detailproduct', $this->session->userdata('site_lang'));
            $this->language = $this->session->userdata('site_lang');
        } else {
            $this->lang->load('detailproduct', 'thai');
            $this->language = 'thai';
        }
    }

    public function index() {
        redirect('home');
    }

    public function id($id) {
        $data = array();
        $data['language'] = $this->language;
        $data['location'] = uri_string();

        if (isset($id) == FALSE || $id == NULL)
            redirect('home');

        $temp = $this->m_detailproduct->check_detail_products($id);
        if ($temp == NULL)
            redirect('home');
        $data['detail'] = $temp[0];
        $data['img'] = $this->m_detailproduct->check_images($id);

        //Increse view count
        $this->m_detailproduct->update_view_count($id);

        //Check recommend
        $data['recommend'] = $this->m_detailproduct->check_recommend();

        $this->m_template->set_Content('detailproduct.php', $data);
//        $this->m_template->set_Debug($data);
        $this->m_template->showTemplate();
    }

}
