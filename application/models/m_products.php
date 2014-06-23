<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_products extends CI_Model {

    function check_all_product() {
        $this->db->select('*,products.id');
        $this->db->from('products');
        $this->db->join('product_types', 'products.product_type_id=product_types.id', 'left');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function check_detail_product($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        $result = $query->result_array();
        return $result;
    }

    function check_product_type() {
        $query = $this->db->get('product_types');
        $result = $query->result_array();
        return $result;
    }

    function insert_product($data) {
        $this->db->insert('products', $data);
        $this->insert_img_to_database($this->db->insert_id());
        return TRUE;
    }

    function update_product($data) {
        $id = $data['id'];
        unset($data['id']);

        $temp = $this->check_detail_product($id);
        if (isset($data['img_front']))
            unlink(img_path() . $temp[0]['img_front']);
        if (isset($data['img_back']))
            unlink(img_path() . $temp[0]['img_back']);
        if (isset($data['img_right']))
            unlink(img_path() . $temp[0]['img_right']);
        if (isset($data['img_left']))
            unlink(img_path() . $temp[0]['img_left']);

        $this->db->where('id', $id);
        $this->db->update('products', $data);
        
        //Delete old images
        $this->delect_img_in_database($id);
        //Insert new images in temp
        $this->insert_img_to_database($id);
        
        return TRUE;
    }

    function set_form_add() {
        //Clear folder temp
        if ($this->form_validation->error_string() == NULL && $this->form_validation->run() != TRUE) {
            $this->clear_upload_temp();
        }

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
            'value' => set_value('width'));
        $i_hight = array(
            'name' => 'hight',
            'class' => 'form-control',
            'placeholder' => 'Hight',
            'value' => set_value('hight'));
        $i_base_width = array(
            'name' => 'base_width',
            'class' => 'form-control',
            'placeholder' => 'Base width',
            'value' => set_value('base_width'));
        $i_top_width = array(
            'name' => 'top_width',
            'class' => 'form-control',
            'placeholder' => 'Top width',
            'value' => set_value('top_width'));
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

        $i_type = array();
        $temp = $this->m_products->check_product_type();
        foreach ($temp as $row) {
            $i_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }

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
            'form' => form_open_multipart('products/add', array('class' => 'form-horizontal')),
            'product_name[thai]' => form_input($i_product_name_th),
            'product_name[english]' => form_input($i_product_name_en),
            'product_price' => form_input($i_price),
            'width' => form_input($i_width),
            'hight' => form_input($i_hight),
            'base_width' => form_input($i_base_width),
            'top_width' => form_input($i_top_width),
            'weight' => form_input($i_weight),
            'detail[thai]' => form_textarea($i_detail_th),
            'detail[english]' => form_textarea($i_detail_en),
            'product_type_id' => form_dropdown('product_type_id', $i_type, set_value('product_type_id'), 'class="form-control"'),
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
        $this->form_validation->set_rules('base_width', 'Base width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('top_width', 'Top width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hight', 'Hight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียดสินค้า', 'required|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of Product', 'required|xss_clean');
        $this->form_validation->set_rules('product_type_id', 'Product type', 'required|xss_clean');
        if (empty($_FILES['img_front']['name'])) {
            $this->form_validation->set_rules('img_front', 'Image front', 'required|xss_clean');
        }if (empty($_FILES['img_back']['name'])) {
            $this->form_validation->set_rules('img_back', 'Image back', 'required|xss_clean');
        }if (empty($_FILES['img_right']['name'])) {
            $this->form_validation->set_rules('img_right', 'Image right', 'required|xss_clean');
        }if (empty($_FILES['img_left']['name'])) {
            $this->form_validation->set_rules('img_left', 'Image left', 'required|xss_clean');
        }
        return TRUE;
    }

    function get_post_set_form_add() {
        $get_page_data = array(
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'width' => $this->input->post('width'),
            'hight' => $this->input->post('hight'),
            'base_width' => $this->input->post('base_width'),
            'top_width' => $this->input->post('top_width'),
            'weight' => $this->input->post('weight'),
            'detail' => $this->input->post('detail'),
            'product_type_id' => $this->input->post('product_type_id'),
            'img_front' => $this->upload_img('img_front'),
            'img_back' => $this->upload_img('img_back'),
            'img_right' => $this->upload_img('img_right'),
            'img_left' => $this->upload_img('img_left'),
        );
        return $get_page_data;
    }

    function upload_img($name) {
        if (!empty($_FILES[$name]['name'])) {
            $config['upload_path'] = "assets/img/products/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['encrypt_name'] = TRUE;
            $config['max_size'] = "5000";
            $config['max_width'] = "3840";
            $config['max_height'] = "2160";

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($name)) {
                return $this->upload->display_errors();
            } else {
                //Path img for insert to database
                return 'products/' . $this->upload->data()['file_name'];
            }
        } else {
            return NULL;
        }
    }

    function set_form_edit($data) {
        //Prepare folder temp
        if ($this->form_validation->error_string() == NULL && $this->form_validation->run() != TRUE) {
            $this->load_img_to_temp($data['id']);
        }

        $i_product_name_th = array(
            'name' => 'product_name[thai]',
            'class' => 'form-control',
            'placeholder' => 'ชื่อสินค้า',
            'value' => (set_value('product_name[thai]') == NULL) ? unserialize($data ['product_name'])['thai'] : set_value('product_name[thai]'));
        $i_product_name_en = array(
            'name' => 'product_name[english]',
            'class' => 'form-control',
            'placeholder' => 'Product Name',
            'value' => (set_value('product_name[english]') == NULL) ? unserialize($data ['product_name'])['english'] : set_value('product_name[english]'));
        $i_price = array(
            'name' => 'product_price',
            'class' => 'form-control',
            'placeholder' => 'Price',
            'value' => (set_value('product_price') == NULL) ? $data ['product_price'] : set_value('product_price'));
        $i_width = array(
            'name' => 'width',
            'class' => 'form-control',
            'placeholder' => 'Width',
            'value' => (set_value('width') == NULL) ? $data ['width'] : set_value('width'));
        $i_hight = array(
            'name' => 'hight',
            'class' => 'form-control',
            'placeholder' => 'Hight',
            'value' => (set_value('hight') == NULL) ? $data ['hight'] : set_value('hight'));
        $i_base_width = array(
            'name' => 'base_width',
            'class' => 'form-control',
            'placeholder' => 'Base width',
            'value' => (set_value('base_width') == NULL) ? $data ['base_width'] : set_value('base_width'));
        $i_top_width = array(
            'name' => 'top_width',
            'class' => 'form-control',
            'placeholder' => 'Top width',
            'value' => (set_value('top_width') == NULL) ? $data ['top_width'] : set_value('top_width'));
        $i_weight = array(
            'name' => 'weight',
            'class' => 'form-control',
            'placeholder' => 'Weight',
            'value' => (set_value('weight') == NULL) ? $data ['weight'] : set_value('weight'));
        $i_detail_th = array(
            'name' => 'detail[thai]',
            'class' => 'form-control',
            'value' => (set_value('detail[thai]') == NULL) ? unserialize($data ['detail'])['thai'] : set_value('detail[thai]'),
            'rows' => '3',
            'placeholder' => 'รายละเอียดสินค้า');
        $i_detail_en = array(
            'name' => 'detail[english]',
            'class' => 'form-control',
            'rows' => '3',
            'placeholder' => 'Detail of Product',
            'value' => (set_value('detail[english]') == NULL) ? unserialize($data ['detail'])['english'] : set_value('detail[english]'));

        $i_type = array();
        $temp = $this->m_products->check_product_type();
        foreach ($temp as $row) {
            $i_type[$row['id']] = unserialize($row['product_type'])['thai'];
        }

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
            'form' => form_open_multipart('products/edit/' . $data['id'], array('class' => 'form-horizontal')),
            'product_name[thai]' => form_input($i_product_name_th),
            'product_name[english]' => form_input($i_product_name_en),
            'product_price' => form_input($i_price),
            'width' => form_input($i_width),
            'hight' => form_input($i_hight),
            'base_width' => form_input($i_base_width),
            'top_width' => form_input($i_top_width),
            'weight' => form_input($i_weight),
            'detail[thai]' => form_textarea($i_detail_th),
            'detail[english]' => form_textarea($i_detail_en),
            'product_type_id' => form_dropdown('product_type_id', $i_type, (set_value('product_type_id') == NULL) ? $data ['product_type_id'] : set_value('product_type_id'), 'class="form-control"'),
            'img_front' => form_upload($i_img_front),
            'img_back' => form_upload($i_img_back),
            'img_right' => form_upload($i_img_right),
            'img_left' => form_upload($i_img_left)
        );
        return $all_form;
    }

    function validation_set_form_edit() {
        $this->form_validation->set_rules('product_name[thai]', 'ชื่อสินค้า', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_name[english]', 'Product Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('product_price', 'Price', 'trim|required|xss_clean');
        $this->form_validation->set_rules('width', 'Width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('hight', 'Hight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('base_width', 'Base width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('top_width', 'Top width', 'trim|required|xss_clean');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|xss_clean');
        $this->form_validation->set_rules('detail[thai]', 'รายละเอียดสินค้า', 'required|xss_clean');
        $this->form_validation->set_rules('detail[english]', 'Detail of Product', 'required|xss_clean');
        $this->form_validation->set_rules('product_type_id', 'Product type', 'required|xss_clean');
        if (empty($_FILES['img_front']['name'])) {
            $this->form_validation->set_rules('img_front', 'Image front', 'xss_clean');
        }if (empty($_FILES['img_back']['name'])) {
            $this->form_validation->set_rules('img_back', 'Image back', 'xss_clean');
        }if (empty($_FILES['img_right']['name'])) {
            $this->form_validation->set_rules('img_right', 'Image right', 'xss_clean');
        }if (empty($_FILES['img_left']['name'])) {
            $this->form_validation->set_rules('img_left', 'Image left', 'xss_clean');
        }
        return TRUE;
    }

    function get_post_set_form_edit() {
        $get_page_data = array(
            'product_name' => $this->input->post('product_name'),
            'product_price' => $this->input->post('product_price'),
            'width' => $this->input->post('width'),
            'hight' => $this->input->post('hight'),
            'base_width' => $this->input->post('base_width'),
            'top_width' => $this->input->post('top_width'),
            'weight' => $this->input->post('weight'),
            'detail' => $this->input->post('detail'),
            'product_type_id' => $this->input->post('product_type_id'),
            'img_front' => $this->upload_img('img_front'),
            'img_back' => $this->upload_img('img_back'),
            'img_right' => $this->upload_img('img_right'),
            'img_left' => $this->upload_img('img_left'),
        );
        //Unset img if NULL
        if ($get_page_data['img_front'] == NULL)
            unset($get_page_data['img_front']);
        if ($get_page_data['img_back'] == NULL)
            unset($get_page_data['img_back']);
        if ($get_page_data['img_right'] == NULL)
            unset($get_page_data['img_right']);
        if ($get_page_data['img_left'] == NULL)
            unset($get_page_data['img_left']);

        return $get_page_data;
    }

    function clear_upload_temp() {
        delete_files(img_path() . 'temp/');
    }

    function load_img_to_temp($product_id) {
        //Read images of product
        $this->db->select();
        $this->db->from('products_has_images');
        $this->db->join('images', 'products_has_images.image_id=images.id', 'left');
        $this->db->where('products_has_images.product_id', $product_id);
        $query = $this->db->get();
        $data = $query->result_array();
        
        //Copy images to temp
        foreach ($data as $row){
            copy(img_path().'products/'.$row['img_name'], img_path().'temp/'.$row['img_name']);
            copy(img_path().'products/thumbs/'.$row['img_name'], img_path().'temp/thumbs/'.$row['img_name']);
        }
    }

    function insert_img_to_database($product_id) {
        $data_images = array();
        //Prepare image and insert to images
        $img = $this->get_img_from_temp();
        foreach ($img as $row) {
            $this->db->insert('images', $row);
            $temp = array(
                'product_id' => $product_id,
                'image_id' => $this->db->insert_id()
            );
            array_push($data_images, $temp);
            //Move img to products
            rename(img_path() . 'temp/' . $row['img_name'], $row['img_path']);
            rename(img_path() . 'temp/thumbs/' . $row['img_name'], img_path() . 'products/thumbs/' . $row['img_name']);
        }
        //Insert to products_has_images
        $this->db->insert_batch('products_has_images', $data_images);
        return TRUE;
    }

    function delect_img_in_database($product_id){
        //Delect image in folder product
        $this->db->select();
        $this->db->from('products_has_images');
        $this->db->join('images', 'products_has_images.image_id=images.id', 'left');
        $this->db->where('products_has_images.product_id', $product_id);
        $query = $this->db->get();
        $data = $query->result_array();
        foreach ($data as $row){
            unlink(img_path().'products/'.$row['img_name']);
            unlink(img_path().'products/thumbs/'.$row['img_name']);
            //Delect image in images
            $this->db->delete('images', array('id' => $row['image_id']));
        }
        //Delect image in products_has_images
        $this->db->delete('products_has_images', array('product_id' => $product_id));
        return TRUE;
    }
            
    function get_img_from_temp() {
        $data = array();
        $name = get_filenames(img_path() . 'temp/thumbs/');
        for ($i = 0; $i < count($name); $i++) {
            $temp = array(
                'img_name' => $name[$i],
                'img_full' => 'products/' . $name[$i],
                'img_small' => 'products/thumbs/' . $name[$i],
                'img_path' => img_path() . 'products/' . $name[$i]
            );
            array_push($data, $temp);
        }
        return $data;
    }

}
