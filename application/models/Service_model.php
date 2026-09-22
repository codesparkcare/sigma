<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($active_only = false) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'ASC');
        return $this->db->get('services')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('services', ['id' => $id])->row_array();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('services', ['slug' => $slug])->row_array();
    }

    public function insert($data) {
        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->insert('services', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        if (!empty($data['title']) && empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->where('id', $id);
        return $this->db->update('services', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }

    public function toggle_status($id) {
        $service = $this->get_by_id($id);
        if ($service) {
            $new_status = $service['is_active'] ? 0 : 1;
            $this->update($id, ['is_active' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function count_total() {
        return $this->db->count_all('services');
    }
}
