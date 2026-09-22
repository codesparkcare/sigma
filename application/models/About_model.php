<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data() {
        $row = $this->db->get('about_cms')->row_array();
        if (!$row) {
            return [
                'badge' => 'German Engineered • Dubai Certified',
                'title' => 'Pioneering Luxury & Commercial Vertical Mobility Across the UAE',
                'subtitle' => 'Sigma Height Elevators L.L.C is Dubai’s premier elevator engineering firm.',
                'story' => 'Sigma Height Elevators delivers world-class elevator systems across the UAE.',
                'mission' => 'Safe, smooth, and luxury vertical transportation.',
                'vision' => 'The leading elevator contractor in Dubai.',
                'experience_years' => '15+',
                'elevators_installed' => '500+',
                'client_satisfaction' => '99.9%',
                'image' => 'assets/images/hero_luxury_home.jpg'
            ];
        }
        return $row;
    }

    public function update_data($data) {
        $this->db->where('id', 1);
        $exists = $this->db->get('about_cms')->row_array();
        if ($exists) {
            $this->db->where('id', 1);
            return $this->db->update('about_cms', $data);
        } else {
            return $this->db->insert('about_cms', $data);
        }
    }
}
