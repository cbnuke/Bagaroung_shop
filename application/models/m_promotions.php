<?php

class m_promotions extends CI_Model {

    function view_promotions() {
        
    }

    function insert_promotion($data) {
        $this->db->trans_start();
        $this->db->insert('promotions', $data);
        $promotion_id = $this->db->insert_id();
        $this->db->trans_complete();

        $product_id = $this->input->post('product_id');
        $promotion_price = $this->input->post('promotion_price');
        if ($product_id != NULL && count($product_id) > 0) {
            for ($i = 0; $i < count($product_id); $i++) {
                $itemp = array(
                    'promotion_id' => $promotion_id,
                    'product_id' => $product_id[$i],
                    'promotion_price' => $promotion_price[$i]
                );
                $this->db->insert('products_has_promotions', $itemp);
            }
        }
        return $promotion_id;
    }

    function validation_form_add() {
        $this->form_validation->set_rules('name[thai]', 'ชื่อโปรโมชั่น', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('name[english]', 'Promotion name', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('detail[thai]', 'รายละเอียด', 'required|trim|xss_clean');
//        $this->form_validation->set_rules('detail[english]', 'Detail of product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start', 'วันเริ่มต้น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end', 'วันสิ้นสุด', 'trim|required|xss_clean');
//        if (empty($_FILES['img_promotion']['name'])) {
//            $this->form_validation->set_rules('img_promotion', 'รูปภาพ', 'required|xss_clean');
//        }
//        $this->form_validation->set_rules('price_promotion[]', 'ราคาโปรโมชั่น', 'trim|required|xss_clean');

        return TRUE;
    }

    function get_all_promotions() {
        $query = $this->db->get('promotions');
        $rs = $query->result_array();
        return $rs;
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
            'rows' => "3",
            'class' => 'form-control',
            'placeholder' => 'รายละเอียดโปรโมชั่น',
            'value' => set_value('detail[thai]')
        );
        $f_detail_en = array(
            'name' => 'detail[english]',
            'id' => 'detail[english]',
            'rows' => "3",
            'class' => 'form-control',
            'placeholder' => 'Detail of promotion',
            'value' => set_value('detail[english]')
        );
        $f_start = array(
            'name' => 'start',
            'type' => 'datetime',
            'class' => 'form-control',
            'readonly' => 'TRUE',
            'placeholder' => 'เริ่มต้น',
            'value' => set_value('start')
        );
        $f_end = array(
            'name' => 'end',
            'type' => 'datetime',
            'class' => 'form-control',
            'readonly' => 'TRUE',
            'placeholder' => 'สิ้นสุด',
            'value' => set_value('end')
        );
        $f_img = array(
            'name' => 'img_promotion',
            'class' => 'form-control');

//        product all 
        $f_products = $this->set_products_list();

        $f_type = array();
        $temp = $this->get_product_type();
        foreach ($temp as $row) {
            $f_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }
//       product select
        $f_product_selects = $this->set_products_list_select();

        $f_data = array(
            'form' => form_open_multipart('promotions/add', array('class' => 'form-horizontal', 'id' => 'form_promotion')),
            'name[thai]' => form_input($f_name_th),
            'name[english]' => form_input($f_name_en),
            'detail[thai]' => form_textarea($f_detail_th),
            'detail[english]' => form_textarea($f_detail_en),
            'start' => form_input($f_start),
            'end' => form_input($f_end),
            'img_promotion' => form_upload($f_img),
            'products_select' => $f_product_selects,
            'product_type_id' => form_dropdown('product_type_id', $f_type, set_value('product_type_id'), 'class="form-control"'),
            'products' => $f_products,
        );

        return $f_data;
    }

    function get_post_form_add() {
        $f_data = array(
            'name' => serialize($this->input->post('name')),
            'detail' => serialize($this->input->post('detail')),
            'start' => date("Y-m-d H:i:s", $this->input->post('start')),
            'end' => date("Y-m-d H:i:s", $this->input->post('end')),
            'image_id' => '55' //$this->upload_image('img_promotion'),
        );
//        'YYYY-MM-DD HH:MM:SS'

        return $f_data;
    }

    function set_products_list() {
        $row = '';
        $product_id = $this->input->post('product_id');
        $product = $this->get_products();
        foreach ($product as $p) {
            $r = '<tr>';
            if ($product_id != NULL && count($product_id) > 0) {
                foreach ($product_id as $p_id) {
                    if ($p_id == $p['id']) {
                        $r.='<td><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '" id = "' . $p['id'] . '"checked></td>';
                    } else {
                        $r.='<td><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '"id = "' . $p['id'] . '"></td>';
                    }
                }
            } else {
                $r.='<td><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '"id = "' . $p['id'] . '"></td>';
            }
            $r.='<td>' . img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')) . '</td>';
            $r.='<td>' . unserialize($p ['product_name'])['thai'] . '</td>';
            $r.='<td>' . $p['product_price'] . '</td>';
            $r.='<td>' . unserialize($p ['product_type'])['thai'] . '</td >';
            $r.='</tr>';
            $row.=$r;
        }
        return $row;
    }

    function set_products_list_select() {
        $row = '';
        $price_in = $this->input->post('promotion_price');
        if (count($price_in) > 0 && $price_in != NULL) {
            $i = 0;
            foreach ($price_in as $p) {
                $itemp = '<tr>';
                $itemp .= '<td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this)"></td>';
                $itemp .= '<td align="center"><img data-src="holder.js/100x100/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail"></td>';
                $itemp .= '<td>ชื่อกระเป๋าแบบที่ 3</td>';
                $itemp .= '<td align="center">1000</td>';
                $itemp .= '<td><input type="text" name="promotion_price[]" required="" value="' . $p . '"><span>&nbsp;บาท</span></td>';
                $itemp .= '</tr>';
                $i++;
                $row.= $itemp;
            }
        } else {
            $row = '<tr><td colspan="5">ไม่มีสินค้าในโปรโมชั่น<td></tr>';
        }
        return $row;
    }

    function get_products($id = NULL) {
        $rs = '';
        if ($id == NULL) {
            $this->db->select('products.id,product_name,product_price,product_types.product_type,products.img_front');
            $this->db->from('products');
            $this->db->join('product_types', 'products.product_type_id = product_types.id');
            $query = $this->db->get();
            $rs = $query->result_array();
        } else {
            $this->db->select('products.id,product_name,product_price,product_types.product_type,products.img_front');
            $this->db->from('products');
            $this->db->join('product_types', 'products.product_type_id = product_types.id');
            $this->db->where('products.id', $id);
            $query = $this->db->get();
            $rs = $query->row_array();
        }
        return $rs;
    }

    function get_product_type() {
        $query = $this->db->get('product_types');
        $result = $query->result_array();
        return $result;
    }

    function upload_image($name, $id = NULL) {

        if (!empty($_FILES[$name]['name'])) {
            $config['upload_path'] = "assets/img/promotions";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['encrypt_name'] = TRUE;
//            $config['overwrite']=TRUE;
            $config['max_size'] = "5000";
            $config['max_width'] = "2920";
            $config['max_height'] = "2080";

            $this->load->library('upload', $config);


            if (!$this->upload->do_upload($name)) {
                return $this->upload->display_errors();
            } else {
                //insert to database
                $finfo = $this->upload->data();

                $data_img = array(
                    'img_name' => $finfo['file_name'],
                    'img_full' => 'promotion/' . $finfo['file_name'],
                    'img_path' => $finfo['file_path'],
                );
                if ($id == NULL) {
                    $this->db->insert('images', $data_img);
                    $query = $this->db->get_where('images', $data_img);
                    $rs = $query->row_array();
                    return $rs['id'];
                } else {
                    unlink($this->get_image_path($id));
                    $this->db->where('id', $id);
                    $this->db->update('images', $data_img);
                    return;
                }
            }
        }
    }

    function mdate($format, $microtime = null) {
        $microtime = explode(' ', ($microtime ? $microtime : microtime()));
        if (count($microtime) != 2)
            return false;
        $microtime[0] = $microtime[0] * 1000000;
//        $format = str_replace('u', $microtime[0], $format);
        return date($format, $microtime[1]);
    }

}
