<?php

class m_promotions extends CI_Model {

    function validation_form_add() {
         $this->form_validation->set_rules('name[thai]', 'ชื่อโปรโมชั่น', 'trim|required|xss_clean');        
        $this->form_validation->set_rules('name[english]', 'Promotion name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียด', 'required|trim|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start','วันเริ่มต้น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end','วันสิ้นสุด', 'trim|required|xss_clean');
        if (empty($_FILES['img_promotion']['name'])) {
            $this->form_validation->set_rules('img_promotion', 'รูปภาพ', 'required|xss_clean');
        }

        return TRUE;
    }

    function set_form_add() {
        $f_name_th = array(
            'name' => 'name[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อโปรโมชั่น',
            'value' => set_value('name[thai]')
        );
        $f_name_en = array(
            'name' => 'name[english]',
            'class' => 'form-control',
            'placeholder' => 'Promotion name',
            'value' => set_value('name[english]')
        );
        $f_detail_th = array(
            'name' => 'detail[thai]',
            'id' => 'detail[thai]',
            'rows'=>"3",
            'class' => 'form-control',
            'placeholder' => 'รายละเอียดโปรโมชั่น',
            'value' => set_value('detail[thai]')
        );
        $f_detail_en = array(
            'name' => 'detail[english]',
            'id' => 'detail[english]',
            'rows'=>"3",
            'class' => 'form-control',
            'placeholder' => 'Detail of promotion',
            'value' => set_value('detail[english]')
        );
        $f_start = array(
            'name' => 'start',
            'class' => 'form-control',
            'readonly'=>'TRUE',
            'placeholder' => 'เริ่มต้น',
            'value' => set_value('start')
        );
        $f_end = array(
            'name' => 'end',
            'class' => 'form-control',
            'readonly'=>'TRUE',
            'placeholder' => 'สิ้นสุด',
            'value' => set_value('end')
        );
        $f_img = array(
            'name' => 'img_promotion',
            'class' => 'form-control');

        $f_data = array(
            'name[thai]' => form_input($f_name_th),
            'name[english]' => form_input($f_name_en),
            'detail[thai]' => form_textarea($f_detail_th),
            'detail[english]' => form_textarea($f_detail_en),
            'start' => form_input($f_start),
            'end' => form_input($f_end),
            'img_promotion' => form_upload($f_img),
        );

        return $f_data;
    }

}
