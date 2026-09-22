<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($active_only = false) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('sliders')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('sliders', ['id' => $id])->row_array();
    }

    public function insert($data) {
        $this->db->insert('sliders', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('sliders', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('sliders');
    }

    public function toggle_status($id) {
        $slider = $this->get_by_id($id);
        if ($slider) {
            $new_status = $slider['is_active'] ? 0 : 1;
            $this->update($id, ['is_active' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function count_total() {
        return $this->db->count_all('sliders');
    }
}
