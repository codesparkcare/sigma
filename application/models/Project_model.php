<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($active_only = false, $category = null, $featured_only = false) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        if ($featured_only) {
            $this->db->where('is_featured', 1);
        }
        if (!empty($category) && $category !== 'all') {
            $this->db->where('category', $category);
        }
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('projects')->result_array();
    }

    public function get_categories() {
        $this->db->distinct();
        $this->db->select('category');
        $this->db->where('is_active', 1);
        $this->db->order_by('category', 'ASC');
        $res = $this->db->get('projects')->result_array();
        return array_column($res, 'category');
    }

    public function get_by_id($id) {
        return $this->db->get_where('projects', ['id' => $id])->row_array();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('projects', ['slug' => $slug])->row_array();
    }

    public function insert($data) {
        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->insert('projects', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        if (!empty($data['title']) && empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->where('id', $id);
        return $this->db->update('projects', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('projects');
    }

    public function toggle_status($id) {
        $project = $this->get_by_id($id);
        if ($project) {
            $new_status = $project['is_active'] ? 0 : 1;
            $this->update($id, ['is_active' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function toggle_featured($id) {
        $project = $this->get_by_id($id);
        if ($project) {
            $new_status = $project['is_featured'] ? 0 : 1;
            $this->update($id, ['is_featured' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function count_total() {
        return $this->db->count_all('projects');
    }
}
