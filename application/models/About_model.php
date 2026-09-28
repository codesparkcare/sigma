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
            $default = [
                'badge' => 'Serving the UAE Since 2016',
                'title' => 'Complete Elevator Solutions Across Dubai and the UAE',
                'subtitle' => 'Sigma Height Elevators L.L.C. is a Dubai-based elevator company providing complete elevator supply, installation, testing, commissioning, maintenance, repair and modernization services across the UAE.',
                'story' => "Sigma Height Elevators L.L.C. is a Dubai-based elevator company providing complete elevator supply, installation, testing, commissioning, maintenance, repair and modernization services across the UAE.\n\nOur engineering solutions combine modern technology, safe operation, energy efficiency and responsive after-sales support.",
                'mission' => 'Providing turnkey project coordination, safe operation, and precision engineering compliant with EN 81-20 and EN 81-50 standards.',
                'vision' => 'To be the most trusted elevator solutions partner across Dubai and the UAE for new installations, AMC maintenance, and elevator modernization.',
                'experience_years' => 'Since 2016',
                'elevators_installed' => '500+',
                'client_satisfaction' => '100% Certified',
                'image' => 'assets/images/hero_luxury_home.jpg'
            ];
            $this->db->insert('about_cms', $default);
            return $default;
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
