<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->check_table_schema();
    }

    private function check_table_schema() {
        if ($this->db->table_exists('sliders')) {
            $fields = $this->db->list_fields('sliders');
            if (!in_array('page', $fields)) {
                $this->load->dbforge();
                $this->dbforge->add_column('sliders', [
                    'page' => [
                        'type' => 'VARCHAR',
                        'constraint' => 50,
                        'default' => 'home'
                    ]
                ]);
            }
            $this->seed_page_defaults();
        }
    }

    public function seed_page_defaults() {
        $pages = ['services', 'products', 'projects', 'contact', 'about'];
        foreach ($pages as $p) {
            $count = $this->db->where('page', $p)->count_all_results('sliders');
            if ($count == 0) {
                $default_slide = $this->get_default_slide_for_page($p);
                if ($default_slide) {
                    $this->db->insert('sliders', $default_slide);
                }
            }
        }
    }

    private function get_default_slide_for_page($page) {
        $defaults = [
            'services' => [
                'page'           => 'services',
                'title'          => 'Expert Elevator Services &',
                'highlight_text' => 'Vertical Solutions',
                'badge_text'     => 'Dubai Civil Defense Certified',
                'subtitle'       => 'From bespoke luxury villa lifts to commercial high-speed towers, our precision-engineered elevator services comply with strict Dubai Civil Defense and EN81-20:50 European Compliance Standard.',
                'button_text'    => 'Request Free Consultation',
                'button_link'    => '#contact',
                'image'          => 'assets/images/service_passenger.jpg',
                'sort_order'     => 1,
                'is_active'      => 1
            ],
            'products' => [
                'page'           => 'products',
                'title'          => 'Engineered for Luxury &',
                'highlight_text' => 'Modern Architecture',
                'badge_text'     => 'European Safety Standards',
                'subtitle'       => 'Explore our comprehensive portfolio of panoramic glass lifts, bespoke residential elevators, heavy-duty cargo lifts, and advanced commercial transit solutions in UAE.',
                'button_text'    => 'Get Product Pricing',
                'button_link'    => 'contact',
                'image'          => 'assets/images/service_panoramic.jpg',
                'sort_order'     => 1,
                'is_active'      => 1
            ],
            'projects' => [
                'page'           => 'projects',
                'title'          => 'Signature Landmark',
                'highlight_text' => 'Elevator Installations',
                'badge_text'     => 'Over 450+ Installations Completed',
                'subtitle'       => 'Explore our prestigious portfolio across Palm Jumeirah, Downtown Dubai, Emirates Hills, and prime commercial districts across the UAE.',
                'button_text'    => 'Discuss Your Project',
                'button_link'    => 'contact',
                'image'          => 'assets/images/service_home.jpg',
                'sort_order'     => 1,
                'is_active'      => 1
            ],
            'contact' => [
                'page'           => 'contact',
                'title'          => 'Get in Touch with',
                'highlight_text' => 'Elevator Experts',
                'badge_text'     => '24/7 Rapid UAE Response',
                'subtitle'       => 'Contact Sigma Height Elevators LLC Dubai for bespoke installations, AMC maintenance agreements, modernize existing lifts, or emergency breakdown support.',
                'button_text'    => 'Schedule Site Inspection',
                'button_link'    => '#inquiry-form',
                'image'          => 'assets/images/service_passenger.jpg',
                'sort_order'     => 1,
                'is_active'      => 1
            ],
            'about' => [
                'page'           => 'about',
                'title'          => 'Engineering Dubai’s Future in',
                'highlight_text' => 'Vertical Mobility',
                'badge_text'     => 'Since 2012 in Dubai, UAE',
                'subtitle'       => 'Delivering German-grade engineering, bespoke Italian finishes, and ISO 9001:2015 safety across private luxury residences and landmark commercial developments.',
                'button_text'    => 'Explore Our Services',
                'button_link'    => 'services',
                'image'          => 'assets/images/service_panoramic.jpg',
                'sort_order'     => 1,
                'is_active'      => 1
            ]
        ];

        return isset($defaults[$page]) ? $defaults[$page] : null;
    }

    public function get_all($active_only = false, $page = null) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        if (!empty($page)) {
            $this->db->where('page', $page);
        }
        $this->db->order_by('page', 'ASC');
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('sliders')->result_array();
    }

    public function get_by_page($page = 'home', $active_only = false) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        $this->db->where('page', $page);
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'ASC');
        $results = $this->db->get('sliders')->result_array();
        
        // If searching for home and empty, fallback to any active slider with page='home' or NULL
        if (empty($results) && $page === 'home') {
            if ($active_only) {
                $this->db->where('is_active', 1);
            }
            $this->db->group_start();
            $this->db->where('page', 'home');
            $this->db->or_where('page IS NULL', null, false);
            $this->db->or_where('page', '');
            $this->db->group_end();
            $this->db->order_by('sort_order', 'ASC');
            $results = $this->db->get('sliders')->result_array();
        }
        
        return $results;
    }

    public function get_by_id($id) {
        return $this->db->get_where('sliders', ['id' => $id])->row_array();
    }

    public function insert($data) {
        if (empty($data['page'])) {
            $data['page'] = 'home';
        }
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

    public function count_total($page = null) {
        if (!empty($page)) {
            $this->db->where('page', $page);
        }
        return $this->db->count_all_results('sliders');
    }
}

