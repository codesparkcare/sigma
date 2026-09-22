<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiry_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all($limit = null) {
        $this->db->order_by('id', 'DESC');
        if ($limit) {
            $this->db->limit($limit);
        }
        return $this->db->get('enquiries')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('enquiries', ['id' => $id])->row_array();
    }

    public function insert($data) {
        $this->db->insert('enquiries', $data);
        return $this->db->insert_id();
    }

    public function update_status($id, $status) {
        $this->db->where('id', $id);
        return $this->db->update('enquiries', ['status' => $status]);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('enquiries');
    }

    public function count_total() {
        return $this->db->count_all('enquiries');
    }
}
