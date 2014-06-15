<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_products extends CI_Model {

    function set_form_add() {
        $i_product_name_th = array(
            'name' => 'product_name[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อสินค้า',
            'value' => set_value('product_name[thai]'));
        $i_product_name_en = array(
            'name' => 'product_name[english]',
            'class' => 'form-control',
            'placeholder' => 'Product Name',
            'value' => set_value('product_name[english]'));
        $i_price = array(
            'name' => 'product_price',
            'class' => 'form-control',
            'placeholder' => 'Price',
            'value' => set_value('product_price'));
        $i_width = array(
            'name' => 'width',
            'class' => 'form-control',
            'placeholder' => 'Width',
            'value' => set_value('product_price'));
        $i_hight = array(
            'name' => 'hight',
            'class' => 'form-control',
            'placeholder' => 'Hight',
            'value' => set_value('width'));
        $i_weight = array(
            'name' => 'weight',
            'class' => 'form-control',
            'placeholder' => 'Weight',
            'value' => set_value('weight'));
        $i_detail_th = array(
            'name' => 'detail[thai]',
            'class' => 'form-control',
            'value' => set_value('detail[thai]'),
            'rows' => '3',
            'placeholder' => 'รายละเอียดสินค้า');
        $i_detail_en = array(
            'name' => 'detail[english]',
            'class' => 'form-control',
            'rows' => '3',
            'placeholder' => 'Detail of Product',
            'value' => set_value('detail[english]'));
        $i_img_front = array(
            'name' => 'img_front',
            'class' => 'form-control');
        $i_img_back = array(
            'name' => 'img_back',
            'class' => 'form-control');
        $i_img_right = array(
            'name' => 'img_right',
            'class' => 'form-control');
        $i_img_left = array(
            'name' => 'img_left',
            'class' => 'form-control');



        $all_form = array(
            'form' => form_open('products/add', array('class' => 'form-horizontal')),
            'product_name[thai]' => form_input($i_product_name_th),
            'product_name[english]' => form_input($i_product_name_en),
            'product_price' => form_input($i_price),
            'width' => form_input($i_width),
            'hight' => form_input($i_hight),
            'weight' => form_input($i_weight),
            'detail[thai]' => form_textarea($i_detail_th),
            'detail[english]' => form_textarea($i_detail_en),
            'img_front' => form_upload($i_img_front),
            'img_back' => form_upload($i_img_back),
            'img_right' => form_upload($i_img_right),
            'img_left' => form_upload($i_img_left)
        );
        return $all_form;
    }

    function validation_set_form_add() {
        $this->form_validation->set_rules('product_name[thai]', 'ชื่อสินค้า', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_name[english]', 'Product Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_price', 'Price', 'trim|required|xss_clean');
        $this->form_validation->set_rules('width', 'Width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hight', 'Hight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียดสินค้า', 'required|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of Product', 'required|xss_clean');
        $this->form_validation->set_rules('img_front', 'Image front', 'required|xss_clean');
        $this->form_validation->set_rules('img_back', 'Image front', 'required|xss_clean');
        $this->form_validation->set_rules('img_right', 'Image front', 'required|xss_clean');
        $this->form_validation->set_rules('img_left', 'Image front', 'required|xss_clean');
        return TRUE;
    }

    function get_post_set_form_add() {
        $get_page_data = array(
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'width' => $this->input->post('width'),
            'hight' => $this->input->post('hight'),
            'weight' => $this->input->post('weight'),
            'detail' => $this->input->post('detail'),
        );
        return $get_page_data;
    }

}
