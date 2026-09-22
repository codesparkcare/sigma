<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data() {
        $row = $this->db->get('contact_cms')->row_array();
        if (!$row) {
            return [
                'heading' => 'Connect With Our Dubai Engineering Team',
                'subheading' => 'Speak directly with our Dubai engineering specialists today.',
                'address' => 'Flat No. 325, Abdul Razak Al zarouni Building(Bldg No. 326), Damascus Street, Al Qusais Industrial Area 2, Dubai, UAE',
                'phone' => '+048858454',
                'emergency_phone' => '052-6405622',
                'email' => 'sales@sigmaheightelevators.com',
                'working_hours' => 'Mon - Sat: 8:00 AM - 7:00 PM (24/7 Emergency Dispatch)',
                'map_iframe' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3607.7335463633776!2d55.38284137444449!3d25.27954732836204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f5d4e49e0588d%3A0x7b09691be44b0d24!2sSIGMA%20HEIGHT%20ELEVATORS%20LLC!5e0!3m2!1sen!2sin!4v1790062253852!5m2!1sen!2sin'
            ];
        }
        // If stored map_iframe contains full <iframe ...> tag, extract the clean src URL
        if (!empty($row['map_iframe']) && preg_match('/src=["\']([^"\']+)["\']/i', $row['map_iframe'], $m)) {
            $row['map_iframe'] = $m[1];
        }
        return $row;
    }

    public function update_data($data) {
        // Automatically extract clean URL if user pastes full <iframe src="..."></iframe> embed code
        if (!empty($data['map_iframe']) && preg_match('/src=["\']([^"\']+)["\']/i', $data['map_iframe'], $m)) {
            $data['map_iframe'] = $m[1];
        }

        $this->db->where('id', 1);
        $exists = $this->db->get('contact_cms')->row_array();
        if ($exists) {
            $this->db->where('id', 1);
            return $this->db->update('contact_cms', $data);
        } else {
            return $this->db->insert('contact_cms', $data);
        }
    }
}
