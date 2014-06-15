<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class m_slides extends CI_Model {

    private $mode = NULL;
    private $id = NULL;

    function set_mode($name) {
        $this->mode = $name;
    }

    function get_mode() {
        return $this->mode;
    }

    function set_id($id) {
        $this->id = $id;
    }
}

