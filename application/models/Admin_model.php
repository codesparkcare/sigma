<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->ensure_table_exists();
    }

    private function ensure_table_exists() {
        if (!$this->db->table_exists('admin_users')) {
            $this->load->dbforge();
            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ],
                'username' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'unique' => TRUE
                ],
                'password_hash' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 100,
                    'default' => 'Admin Manager'
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                    'default' => 'info@sigmaheightelevators.com'
                ],
                'last_login' => [
                    'type' => 'DATETIME',
                    'null' => TRUE
                ],
                'created_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => TRUE
                ]
            ];
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('admin_users', TRUE);

            // Seed default admin user
            $this->db->insert('admin_users', [
                'username'      => 'admin',
                'password_hash' => password_hash('5+years.com', PASSWORD_BCRYPT),
                'name'          => 'Admin Manager',
                'email'         => 'info@sigmaheightelevators.com'
            ]);
        } else {
            // Check if admin user exists, if not seed it or ensure password is correct
            $admin = $this->db->get_where('admin_users', ['username' => 'admin'])->row_array();
            if (!$admin) {
                $this->db->insert('admin_users', [
                    'username'      => 'admin',
                    'password_hash' => password_hash('5+years.com', PASSWORD_BCRYPT),
                    'name'          => 'Admin Manager',
                    'email'         => 'info@sigmaheightelevators.com'
                ]);
            }
        }
    }

    public function verify_credentials($username, $password) {
        $user = $this->db->get_where('admin_users', ['username' => trim($username)])->row_array();
        if ($user && password_verify($password, $user['password_hash'])) {
            $this->db->where('id', $user['id'])->update('admin_users', [
                'last_login' => date('Y-m-d H:i:s')
            ]);
            return $user;
        }
        return false;
    }

    public function get_by_id($id) {
        return $this->db->get_where('admin_users', ['id' => (int)$id])->row_array();
    }

    public function update_password($id, $new_password) {
        return $this->db->where('id', (int)$id)->update('admin_users', [
            'password_hash' => password_hash($new_password, PASSWORD_BCRYPT)
        ]);
    }
}
