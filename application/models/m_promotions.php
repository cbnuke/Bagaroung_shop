<?php

class m_promotions extends CI_Model {

    private $promotion_id = '';

    function set_promotion_id($id) {
        $this->promotion_id = $id;
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
//        return $promotion_id;
    }

    function update_promotion($f_data) {
        $this->db->where('id', $this->promotion_id);
        $this->db->update('promotions', $f_data);
//delete
        $this->db->where('promotion_id', $this->promotion_id);
        $this->db->delete('products_has_promotions');
//
        $product_id = $this->input->post('product_id');
        $promotion_price = $this->input->post('promotion_price');
        if ($product_id != NULL && count($product_id) > 0) {
            for ($i = 0; $i < count($product_id); $i++) {
                $itemp = array(
                    'promotion_id' => $this->promotion_id,
                    'product_id' => $product_id[$i],
                    'promotion_price' => $promotion_price[$i]
                );
                $this->db->insert('products_has_promotions', $itemp);
            }
        }
        return;
    }

    function delete_promotion($promoton_id) {
        //delete image
        $img_id = $this->get_image_id($promoton_id);
        $this->deleteImage($img_id);
        //delete data in images
        $this->db->where('id', $img_id);
        $this->db->delete('images');

        //delete on products has promotion 
        $this->db->where('promotion_id', $promoton_id);
        $this->db->delete('products_has_promotions');       

        //delete promotions
        $this->db->where('id', $promoton_id);
        $this->db->delete('promotions');
        return;
    }

    function validation_form_add() {
        $this->form_validation->set_rules('name[thai]', 'ชื่อโปรโมชั่น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name[english]', 'Promotion name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียด', 'required|trim|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start', 'วันเริ่มต้น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end', 'วันสิ้นสุด', 'trim|required|xss_clean');
        if (empty($_FILES['img_promotion']['name'])) {
            $this->form_validation->set_rules('img_promotion', 'รูปภาพ', 'required|xss_clean');
        }
//        $this->form_validation->set_rules('price_promotion[]', 'ราคาโปรโมชั่น', 'trim|required|xss_clean');

        return TRUE;
    }

    function validation_form_edit() {
        $this->form_validation->set_rules('name[thai]', 'ชื่อโปรโมชั่น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name[english]', 'Promotion name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียด', 'required|trim|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of product', 'required|trim|xss_clean');
        $this->form_validation->set_rules('start', 'วันเริ่มต้น', 'trim|required|xss_clean');
        $this->form_validation->set_rules('end', 'วันสิ้นสุด', 'trim|required|xss_clean');
        return TRUE;
    }

    function get_all_promotions() {
        $this->db->select('promotions.id,promotions.name,promotions.detail,promotions.start,promotions.end,promotions.status_promotion,images.img_full,images.img_small');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');
        $query = $this->db->get();
        $rs = $query->result_array();
        $i = 0;
        foreach ($rs as $value) {
            $rs[$i]['count_product'] = $this->count_product($rs[$i]['id']);
            $i++;
        }
        return $rs;
    }

    function count_product($promotion_id) {
        $rs = $this->db->get_where('products_has_promotions', array('promotion_id' => $promotion_id));
        return $rs->num_rows();
    }

    function get_promotions($id) {
        $this->db->select('promotions.id,promotions.name,promotions.detail,promotions.start,promotions.end,images.img_full');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');
        $this->db->where('promotions.id', $id);
        $query = $this->db->get();
        $rs = $query->row_array();
        return $rs;
    }

    function get_products_has_promotion($promotion_id = NULL) {
        $this->db->select('*');
        $this->db->from('products_has_promotions');
        $this->db->join('products', 'products.id = products_has_promotions.product_id');
        if ($promotion_id != NULL) {
            $this->db->where('promotion_id', $promotion_id);
        }
        $query = $this->db->get();
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
        $f_products = $this->set_products_list_add();

        $f_type = array();
        $temp = $this->get_product_type();
        foreach ($temp as $row) {
            $f_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }
//       product select
        $f_product_selects = $this->set_products_list_select_add();

        $f_data = array(
            'form' => form_open_multipart('promotions/add', array('class' => 'form-horizontal', 'id' => 'form_promotion')),
            'name[thai]' => form_input($f_name_th),
            'name[english]' => form_input($f_name_en),
            'detail[thai]' => form_textarea($f_detail_th),
            'detail[english]' => form_textarea($f_detail_en),
            'start' => form_input($f_start),
            'end' => form_input($f_end),
            'img_promotion' => form_upload($f_img),
            'image' => NULL,
            'products_select' => $f_product_selects,
            'product_type_id' => form_dropdown('product_type_id', $f_type, set_value('product_type_id'), 'class="form-control" id="product_type"'),
            'products' => $f_products,
        );

        return $f_data;
    }

    function set_form_edit($data) {
        $f_name_th = array(
            'name' => 'name[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อโปรโมชั่น',
            'value' => (set_value('name[thai]') == NULL) ? unserialize($data ['name'])['thai'] : set_value('[thai]')
        );
        $f_name_en = array(
            'name' => 'name[english]',
            'class' => 'form-control',
            'placeholder' => 'Promotion name',
            'value' => (set_value('name[english]') == NULL) ? unserialize($data ['name'])['english'] : set_value('[english]')
        );
        $f_detail_th = array(
            'name' => 'detail[thai]',
            'id' => 'detail[thai]',
            'rows' => "3",
            'class' => 'form-control',
            'placeholder' => 'รายละเอียดโปรโมชั่น',
            'value' => (set_value('detail[thai]') == NULL) ? unserialize($data ['detail'])['thai'] : set_value('[thai]')
        );
        $f_detail_en = array(
            'name' => 'detail[english]',
            'id' => 'detail[english]',
            'rows' => "3",
            'class' => 'form-control',
            'placeholder' => 'Detail of promotion',
            'value' => (set_value('detail[english]') == NULL) ? unserialize($data ['detail'])['english'] : set_value('[english]')
        );
        $f_start = array(
            'name' => 'start',
            'type' => 'datetime',
            'class' => 'form-control',
            'readonly' => 'TRUE',
            'placeholder' => 'เริ่มต้น',
            'value' => (set_value('start') == NULL) ? $data ['start'] : set_value('start')
        );
        $f_end = array(
            'name' => 'end',
            'type' => 'datetime',
            'class' => 'form-control',
            'readonly' => 'TRUE',
            'placeholder' => 'สิ้นสุด',
            'value' => (set_value('end') == NULL) ? $data ['end'] : set_value('end')
        );
        $f_img = array(
            'name' => 'img_promotion',
            'class' => 'form-control');

//        product all show in modal
        $f_products = $this->set_products_list_edit($this->promotion_id);

        $f_type = array();
        $temp = $this->get_product_type();
        foreach ($temp as $row) {
            $f_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }
//       product select show in table 
        $f_product_selects = $this->set_products_list_select_edit($this->promotion_id);

        $f_data = array(
            'form' => form_open_multipart('promotions/edit/' . $this->promotion_id, array('class' => 'form-horizontal', 'id' => 'form_promotion')),
            'name[thai]' => form_input($f_name_th),
            'name[english]' => form_input($f_name_en),
            'detail[thai]' => form_textarea($f_detail_th),
            'detail[english]' => form_textarea($f_detail_en),
            'start' => form_input($f_start),
            'end' => form_input($f_end),
            'img_promotion' => form_upload($f_img),
            'image' => img($data['img_full'], array('class' => 'img-responsive thumbnail', 'width' => '200', 'height' => '200')),
            'products_select' => $f_product_selects,
            'product_type_id' => form_dropdown('product_type_id', $f_type, set_value('product_type_id'), 'class="form-control" id="product_type"'),
            'products' => $f_products,
        );

        return $f_data;
    }

    function get_post_form_add() {

        $s = new DateTime($this->input->post('start'));
        $e = new DateTime($this->input->post('end'));

        $start = $s->format('Y-m-d H:i:s');
        $end = $e->format('Y-m-d H:i:s');

        $f_data = array(
            'name' => serialize($this->input->post('name')),
            'detail' => serialize($this->input->post('detail')),
            'start' => $start,
            'end' => $end,
            'image_id' => $this->upload_image('img_promotion'),
        );

        return $f_data;
    }

    function get_post_form_edit() {
        $s = new DateTime($this->input->post('start'));
        $e = new DateTime($this->input->post('end'));

        $start = $s->format('Y-m-d H:i:s');
        $end = $e->format('Y-m-d H:i:s');

        $f_data = array(
            'name' => serialize($this->input->post('name')),
            'detail' => serialize($this->input->post('detail')),
            'start' => $start,
            'end' => $end,
        );
        if (!empty($_FILES['img_promotion']['name'])) {
            $this->upload_image('img_promotion', $this->get_image_id($this->promotion_id));
        }

        return $f_data;
    }

//  add mode 
//  to modal    
    function set_products_list_add($type_id = NULL) {
        $row = '';

        $product_id = $this->input->post('product_id');
        if ($type_id != NULL) {
            $product = $this->get_product_by_type($type_id);
        } else {
            $product = $this->get_products();
        }
        $is_checked = FALSE;
        foreach ($product as $p) {
            $r = '<tr>';
            for ($i = 0; $i < count($product_id); $i++) {
                if ($product_id[$i] == $p['id']) {
                    $is_checked = TRUE;
                }
            }
            if ($is_checked) {
                $r.='<td align="center"  style="vertical-align: middle;"><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '" id = "' . $p['id'] . '"checked></td>';
            } else {
                $r.='<td align="center"  style="vertical-align: middle;"><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '"id = "' . $p['id'] . '"></td>';
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

    function set_products_list_select_add() {
        $row = '';
        $price_in = $this->input->post('promotion_price');
        $product_id = $this->input->post('product_id');
        if (count($price_in) > 0 && $price_in != NULL) {
            $i = 0;
            foreach ($price_in as $p) {
                $product = $this->get_products($product_id[$i]);
                $itemp = '<tr>';
                $itemp .= '<td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this,' . $product_id[$i] . ')"></td>';
                $itemp .= '<td align="center">' . img($product['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')) . '</td>';
                $itemp .= '<td>' . unserialize($product ['product_name'])['thai'] . '</td>';
                $itemp .= '<td align="center">' . $product['product_price'] . '</td>';
                $itemp .= '<td><input type="text" name="promotion_price[]" required="" value="' . $p . '"><span>&nbsp;บาท</span></td>';
                $itemp .= '</tr>';
                $i++;
                $row.= $itemp;
            }
        } else {
            $row = '<tr><td colspan="5" align="center"  style="vertical-align: middle;">ไม่มีสินค้าในโปรโมชั่น<td></tr>';
        }
        return $row;
    }

//    edit mode
    function set_products_list_edit($id, $type_id = NULL) {
        $product_has_promotion = $this->get_products_has_promotion($id);
        if ($type_id != NULL) {
            $product = $this->get_product_by_type($type_id);
        } else {
            $product = $this->get_products();
        }
        $row = '';
        $is_checked = FALSE;
        foreach ($product as $p) {
            $r = '<tr>';
            foreach ($product_has_promotion as $value) {
                if ($value['promotion_id'] == $id && $value['product_id'] == $p['id']) {
                    $is_checked = TRUE;
                }
            }
            if ($is_checked) {
                $r.='<td align="center"  style="vertical-align: middle;"><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '" id = "' . $p['id'] . '"checked></td>';
            } else {
                $r.='<td align="center"  style="vertical-align: middle;"><input type = "checkbox" class = "a" name = "product_id[]" value = "' . $p['id'] . '"id = "' . $p['id'] . '"></td>';
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

    function set_products_list_select_edit($id) {
        $row = '';
        $product_pro = $this->get_products_has_promotion($id);
        if (count($product_pro) > 0) {
            $i = 0;
            foreach ($product_pro as $p) {
                $itemp = '<tr>';
                $itemp .= '<td align="middle"><input type="button" class="btn btn-outline btn-circle btn-danger btn-sm" value="-" onclick="deleteRow(this,' . $p['id'] . ')"></td>';
                $itemp .= '<td align="center">' . img($p['img_front'], array('class' => 'img-responsive thumbnail', 'width' => '100', 'height' => '100')) . '</td>';
                $itemp .= '<td>' . unserialize($p['product_name'])['thai'] . '</td>';
                $itemp .= '<td align="center">1000</td>';
                $itemp .= '<td><input type="text" name="promotion_price[]" required="" value="' . $p['promotion_price'] . '"><span>&nbsp;บาท</span></td>';
                $itemp .= '</tr>';
                $i++;
                $row.= $itemp;
            }
        } else {
            $row = '<tr><td colspan="5" align="center"  style="vertical-align: middle;">ไม่มีสินค้าในโปรโมชั่น<td></tr>';
        }
        return $row;
    }

//  set itemps to modal when select dropdown
    function set_product_by_type($type_id, $promotion_id = NULL) {
        $rs = '';
        if ($promotion_id == NULL) {
            //add mode 
            $rs = $this->set_products_list_add($type_id);
        } else {
            //edit mode
            $rs = $this->set_products_list_edit($promotion_id, $type_id);
        }
        return $rs;
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

    function get_product_by_type($type_id) {
        $rs = '';
        $this->db->select('products.id,product_name,product_price,product_types.product_type,products.img_front');
        $this->db->from('products');
        $this->db->join('product_types', 'products.product_type_id = product_types.id');
        $this->db->where('products.product_type_id', $type_id);
        $query = $this->db->get();
        $rs = $query->result_array();
        return $rs;
    }

    function get_product_type() {
        $query = $this->db->get('product_types');
        $result = $query->result_array();
        return $result;
    }

    function get_promotion_price($product_id, $promotion_id = NULL) {
        $query = $this->db->get_where('products_has_promotions', array('product_id' => $product_id, 'promotion_id' => $promotion_id));
        $result = $query->row_array();
        if (count($result) > 0) {
            return $result['promotion_price'];
        } else {
            return '';
        }
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
                $config2 = array();
                $config2['image_library'] = 'gd2';
                $config2['source_image'] = $finfo['full_path'];
                $config2['create_thumb'] = TRUE;
                $config2['new_image'] = 'assets/img/promotions/thumbs/' . $finfo['file_name'];
                $config2['maintain_ratio'] = TRUE;
                $config2['thumb_marker'] = '';
                $config2['width'] = 100;
                $config2['height'] = 100;
                $this->load->library('image_lib', $config2);
                $this->image_lib->resize();

                $data_img = array(
                    'img_name' => $finfo['file_name'],
                    'img_full' => 'promotions/' . $finfo['file_name'],
                    'img_small' => 'promotions/thumbs/' . $finfo['file_name'],
                    'img_path' => $finfo['file_path'],
                );

                $data_img = array(
                    'img_name' => $finfo['file_name'],
                    'img_full' => 'promotions/' . $finfo['file_name'],
                    'img_path' => $finfo['file_path'],
                );
                if ($id == NULL) {
                    $this->db->trans_start();
                    $this->db->insert('images', $data_img);
                    $image_id = $this->db->insert_id();
                    $this->db->trans_complete();
                    return $image_id;
                } else {
                    $this->deleteImage($id);
                    $this->db->where('id', $id);
                    $this->db->update('images', $data_img);

                    return;
                }
            }
        }
    }

    function get_image($id) {
        $this->db->select('images.img_full');
        $this->db->from('images');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $row = $query->row_array();

        return $row['img_full'];
    }

    function get_image_id($promotion_id) {
        $this->db->select('images.id');
        $this->db->from('promotions');
        $this->db->join('images', 'images.id = promotions.image_id');
        $this->db->where('promotions.id', $promotion_id);
        $query = $this->db->get();
        $row = $query->row_array();

        return $row['id'];
    }
   
    public function deleteImage($image_id) {
        $this->db->select('img_path,img_name');
        $this->db->from('images');
        $this->db->where('id', $image_id);
        $query = $this->db->get();
        $row = $query->row_array();

        unlink($row['img_path'] . $row['img_name']);
        unlink($row['img_path'] . 'thumbs/' . $row['img_name']);
    }

}
