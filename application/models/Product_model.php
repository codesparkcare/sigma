<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->check_table();
    }

    private function check_table() {
        if (!$this->db->table_exists('products')) {
            $this->load->dbforge();
            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ],
                'title' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ],
                'slug' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ],
                'subtitle' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => ''
                ],
                'description' => [
                    'type' => 'TEXT',
                    'null' => TRUE
                ],
                'image' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ],
                'is_featured' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1
                ],
                'sort_order' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'default' => 0
                ],
                'is_active' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1
                ],
                'created_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => TRUE
                ]
            ];
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('products', TRUE);
            $this->seed_defaults();
        }
    }

    public function seed_defaults() {
        $count = $this->db->count_all('products');
        if ($count == 0) {
            $initial = [
                [
                    'title'       => 'Luxury Panoramic Glass Elevators',
                    'slug'        => 'luxury-panoramic-glass-elevators',
                    'subtitle'    => 'Custom Architectural Showcase',
                    'description' => 'Ultra-luxurious 360-degree cylindrical and polygonal glass elevators engineered with frameless curved safety panels, stainless titanium trim, and whisper-silent traction drive for modern villas and atriums.',
                    'image'       => 'assets/images/service_panoramic.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 1,
                    'is_active'   => 1
                ],
                [
                    'title'       => 'Bespoke Villa & Home Elevators',
                    'slug'        => 'bespoke-villa-home-elevators',
                    'subtitle'    => 'Quiet Residential Mobility',
                    'description' => 'Compact, machine-room-less (MRL) residential lifts crafted for luxury residences and penthouses. Requires minimal pit depth, zero overhead room, and features custom Italian marble flooring.',
                    'image'       => 'assets/images/service_home.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 2,
                    'is_active'   => 1
                ],
                [
                    'title'       => 'High-Speed Commercial Passenger Lifts',
                    'slug'        => 'high-speed-commercial-passenger-lifts',
                    'subtitle'    => 'Smart High-Traffic Transportation',
                    'description' => 'Heavy-duty passenger elevators with speeds up to 4.0 m/s, destination dispatch algorithms, energy-regenerative braking, and contactless RFID floor access for corporate towers and luxury hotels.',
                    'image'       => 'assets/images/service_passenger.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 3,
                    'is_active'   => 1
                ],
                [
                    'title'       => 'Heavy-Duty Freight & Cargo Elevators',
                    'slug'        => 'heavy-duty-freight-cargo-elevators',
                    'subtitle'    => 'Industrial Strength & Capacity',
                    'description' => 'Robust goods lifts built to withstand heavy pallet and vehicle transit from 1,000 kg up to 10,000 kg capacity, featuring reinforced non-slip checkered steel floors and collision protection rails.',
                    'image'       => 'assets/images/service_freight.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 4,
                    'is_active'   => 1
                ],
                [
                    'title'       => 'Hospital & Stretcher Bed Elevators',
                    'slug'        => 'hospital-stretcher-bed-elevators',
                    'subtitle'    => 'JCI Compliant Medical Mobility',
                    'description' => 'Smooth micro-leveling hospital elevators designed with anti-bacterial stainless steel cabins, wide telescopic doors for rapid stretcher transfer, and emergency medical priority override systems.',
                    'image'       => 'assets/images/service_hospital.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 5,
                    'is_active'   => 1
                ],
                [
                    'title'       => 'Commercial Escalators & Moving Walks',
                    'slug'        => 'commercial-escalators-moving-walks',
                    'subtitle'    => 'Continuous Transit Solutions',
                    'description' => 'Weatherproof escalators and moving travelators featuring intelligent auto-standby radar sensors, LED skirt lighting, and safety comb plates for shopping malls, airports, and metro hubs.',
                    'image'       => 'assets/images/service_escalators.jpg',
                    'is_featured' => 1,
                    'sort_order'  => 6,
                    'is_active'   => 1
                ]
            ];
            $this->db->insert_batch('products', $initial);
        }
    }

    public function get_all($active_only = false, $featured_only = false, $limit = null) {
        if ($active_only) {
            $this->db->where('is_active', 1);
        }
        if ($featured_only) {
            $this->db->where('is_featured', 1);
        }
        $this->db->order_by('sort_order', 'ASC');
        $this->db->order_by('id', 'DESC');
        if (!empty($limit)) {
            $this->db->limit($limit);
        }
        return $this->db->get('products')->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where('products', ['id' => $id])->row_array();
    }

    public function get_by_slug($slug) {
        return $this->db->get_where('products', ['slug' => $slug])->row_array();
    }

    public function insert($data) {
        if (empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        if (!empty($data['title']) && empty($data['slug'])) {
            $data['slug'] = url_title($data['title'], 'dash', TRUE);
        }
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }

    public function toggle_status($id) {
        $item = $this->get_by_id($id);
        if ($item) {
            $new_status = $item['is_active'] ? 0 : 1;
            $this->update($id, ['is_active' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function toggle_featured($id) {
        $item = $this->get_by_id($id);
        if ($item) {
            $new_status = $item['is_featured'] ? 0 : 1;
            $this->update($id, ['is_featured' => $new_status]);
            return $new_status;
        }
        return false;
    }

    public function count_total() {
        return $this->db->count_all('products');
    }
}
