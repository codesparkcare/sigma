<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Smtp_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->ensure_table_exists();
    }

    private function ensure_table_exists() {
        if (!$this->db->table_exists('smtp_settings')) {
            $this->load->dbforge();
            $fields = [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ],
                'is_enabled' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 0
                ],
                'smtp_host' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'smtp.gmail.com'
                ],
                'smtp_port' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'default' => 587
                ],
                'smtp_crypto' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'default' => 'tls'
                ],
                'smtp_user' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => ''
                ],
                'smtp_pass' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => ''
                ],
                'from_email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'info@sigmaheightelevators.com'
                ],
                'from_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'Sigma Height Elevators LLC'
                ],
                'reply_to' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'info@sigmaheightelevators.com'
                ],
                'admin_email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'default' => 'info@sigmaheightelevators.com'
                ],
                'send_inquiry_notification' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1
                ],
                'send_customer_confirmation' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1
                ],
                'updated_at' => [
                    'type' => 'TIMESTAMP',
                    'null' => TRUE
                ]
            ];
            $this->dbforge->add_field($fields);
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('smtp_settings', TRUE);

            // Seed default row
            $this->db->insert('smtp_settings', [
                'is_enabled'                 => 1,
                'smtp_host'                  => 'smtp.hostinger.com',
                'smtp_port'                  => 465,
                'smtp_crypto'                => 'ssl',
                'smtp_user'                  => 'info@sigmaheightelevators.com',
                'smtp_pass'                  => '07Uis2742*',
                'from_email'                 => 'info@sigmaheightelevators.com',
                'from_name'                  => 'Sigma Height Elevators LLC',
                'reply_to'                   => 'info@sigmaheightelevators.com',
                'admin_email'                => 'info@sigmaheightelevators.com',
                'send_inquiry_notification'  => 1,
                'send_customer_confirmation' => 1
            ]);
        }
    }

    public function get_settings() {
        $row = $this->db->get('smtp_settings')->row_array();
        if (!$row) {
            return [
                'id'                         => 1,
                'is_enabled'                 => 1,
                'smtp_host'                  => 'smtp.hostinger.com',
                'smtp_port'                  => 465,
                'smtp_crypto'                => 'ssl',
                'smtp_user'                  => 'info@sigmaheightelevators.com',
                'smtp_pass'                  => '07Uis2742*',
                'from_email'                 => 'info@sigmaheightelevators.com',
                'from_name'                  => 'Sigma Height Elevators LLC',
                'reply_to'                   => 'info@sigmaheightelevators.com',
                'admin_email'                => 'info@sigmaheightelevators.com',
                'send_inquiry_notification'  => 1,
                'send_customer_confirmation' => 1
            ];
        }
        return $row;
    }

    public function update_settings($data) {
        $this->db->where('id', 1);
        $exists = $this->db->get('smtp_settings')->row_array();
        if ($exists) {
            $this->db->where('id', 1);
            return $this->db->update('smtp_settings', $data);
        } else {
            $data['id'] = 1;
            return $this->db->insert('smtp_settings', $data);
        }
    }

    /**
     * Send email using configured SMTP settings
     */
    public function send_email($to, $subject, $message, $reply_to = null, $from_name = null) {
        $settings = $this->get_settings();

        $this->load->library('email');

        $crypto = !empty($settings['smtp_crypto']) && $settings['smtp_crypto'] !== 'none'
            ? strtolower(trim($settings['smtp_crypto']))
            : '';

        $config = [
            'protocol'     => (!empty($settings['is_enabled']) && !empty($settings['smtp_host'])) ? 'smtp' : 'mail',
            'smtp_host'    => trim($settings['smtp_host']),
            'smtp_port'    => (int)($settings['smtp_port'] ?: 587),
            'smtp_user'    => trim($settings['smtp_user']),
            'smtp_pass'    => $settings['smtp_pass'],
            'smtp_crypto'  => $crypto,
            'smtp_timeout' => 15,
            'mailtype'     => 'html',
            'charset'      => 'utf-8',
            'wordwrap'     => TRUE,
            'newline'      => "\r\n",
            'crlf'         => "\r\n"
        ];

        $this->email->initialize($config);

        $from_email = !empty($settings['from_email']) ? trim($settings['from_email']) : 'info@sigmaheightelevators.com';
        $sender_name = $from_name ?: (!empty($settings['from_name']) ? $settings['from_name'] : 'Sigma Height Elevators');

        $this->email->from($from_email, $sender_name);
        $this->email->to($to);

        $reply_email = $reply_to ?: (!empty($settings['reply_to']) ? trim($settings['reply_to']) : $from_email);
        if ($reply_email) {
            $this->email->reply_to($reply_email, $sender_name);
        }

        $this->email->subject($subject);
        $this->email->message($message);

        $sent = $this->email->send();
        $debugger = $this->email->print_debugger(['headers', 'subject', 'body']);

        return [
            'success'  => $sent,
            'debugger' => $debugger
        ];
    }

    /**
     * Dispatch inquiry notification to admin
     */
    public function send_inquiry_notification($enquiry) {
        $settings = $this->get_settings();
        if (empty($settings['is_enabled']) || empty($settings['send_inquiry_notification'])) {
            return false;
        }

        $recipient = !empty($settings['admin_email']) ? $settings['admin_email'] : $settings['from_email'];
        if (empty($recipient)) {
            return false;
        }

        $subject = '⚡ New Elevator Inquiry from ' . (!empty($enquiry['name']) ? $enquiry['name'] : 'Website Visitor');

        $body = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; color: #1e293b; }
                .card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
                .header { background: linear-gradient(135deg, #0b0f19 0%, #1e293b 100%); color: #ffffff; padding: 28px 24px; text-align: center; border-bottom: 3px solid #e60000; }
                .header h1 { margin: 0 0 6px 0; font-size: 20px; font-weight: 700; letter-spacing: 0.5px; }
                .header p { margin: 0; font-size: 13px; color: #94a3b8; }
                .content { padding: 24px; }
                .lead-badge { display: inline-block; background: #fee2e2; color: #b91c1c; font-weight: 700; font-size: 11px; text-transform: uppercase; padding: 4px 10px; border-radius: 20px; margin-bottom: 16px; }
                .detail-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                .detail-table td { padding: 10px 12px; border-bottom: 1px solid #f1f5f9; font-size: 14px; }
                .detail-table td.label { font-weight: 600; color: #64748b; width: 35%; }
                .detail-table td.value { color: #0f172a; font-weight: 500; }
                .message-box { background: #f8fafc; border-left: 4px solid #e60000; padding: 14px 16px; border-radius: 0 8px 8px 0; font-size: 14px; line-height: 1.6; color: #334155; margin-bottom: 24px; }
                .footer { background: #f8fafc; padding: 16px 24px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
                .btn { display: inline-block; background: #e60000; color: #ffffff !important; text-decoration: none; padding: 10px 22px; border-radius: 6px; font-weight: 600; font-size: 13px; }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="header">
                    <h1>SIGMA HEIGHT ELEVATORS</h1>
                    <p>Customer Inquiry & Quote Dispatch</p>
                </div>
                <div class="content">
                    <span class="lead-badge">New Website Lead</span>
                    <h2 style="font-size: 18px; margin: 0 0 16px 0; color: #0f172a;">New Inquiry Details Received</h2>
                    
                    <table class="detail-table">
                        <tr>
                            <td class="label">Full Name:</td>
                            <td class="value"><strong>' . htmlspecialchars($enquiry['name'] ?? 'N/A') . '</strong></td>
                        </tr>
                        <tr>
                            <td class="label">Phone Number:</td>
                            <td class="value"><a href="tel:' . htmlspecialchars($enquiry['phone'] ?? '') . '" style="color: #e60000; font-weight: bold; text-decoration: none;">' . htmlspecialchars($enquiry['phone'] ?? 'N/A') . '</a></td>
                        </tr>
                        <tr>
                            <td class="label">Email Address:</td>
                            <td class="value">' . (!empty($enquiry['email']) ? '<a href="mailto:' . htmlspecialchars($enquiry['email']) . '" style="color: #2563eb;">' . htmlspecialchars($enquiry['email']) . '</a>' : '<span style="color: #94a3b8;">Not provided</span>') . '</td>
                        </tr>
                        <tr>
                            <td class="label">Service Required:</td>
                            <td class="value"><span style="background: #e2e8f0; padding: 2px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">' . htmlspecialchars($enquiry['service'] ?? 'General Inquiry') . '</span></td>
                        </tr>
                        <tr>
                            <td class="label">Submission Date:</td>
                            <td class="value">' . date('d M Y, h:i A') . ' (GST / Dubai)</td>
                        </tr>
                    </table>

                    <div style="font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 6px;">Client Message / Requirement:</div>
                    <div class="message-box">
                        ' . nl2br(htmlspecialchars($enquiry['message'] ?? 'No additional comments.')) . '
                    </div>

                    <div style="text-align: center; margin-top: 20px;">
                        <a href="' . site_url('admin/enquiries') . '" class="btn">View In Admin Dashboard</a>
                    </div>
                </div>
                <div class="footer">
                    Sigma Height Elevators L.L.C • Dubai, United Arab Emirates<br>
                    Automated system notification.
                </div>
            </div>
        </body>
        </html>';

        return $this->send_email($recipient, $subject, $body, !empty($enquiry['email']) ? $enquiry['email'] : null);
    }

    /**
     * Dispatch auto-confirmation email to the customer
     */
    public function send_customer_confirmation($enquiry) {
        $settings = $this->get_settings();
        if (empty($settings['is_enabled']) || empty($settings['send_customer_confirmation']) || empty($enquiry['email'])) {
            return false;
        }

        $recipient = trim($enquiry['email']);
        $customer_name = !empty($enquiry['name']) ? $enquiry['name'] : 'Valued Customer';
        $subject = 'Thank you for contacting Sigma Height Elevators LLC Dubai';

        $body = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; color: #1e293b; }
                .card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
                .header { background: linear-gradient(135deg, #0b0f19 0%, #1e293b 100%); color: #ffffff; padding: 32px 24px; text-align: center; border-bottom: 3px solid #e60000; }
                .header h1 { margin: 0 0 6px 0; font-size: 20px; font-weight: 700; letter-spacing: 0.5px; }
                .header p { margin: 0; font-size: 13px; color: #94a3b8; }
                .content { padding: 28px 24px; }
                .highlight-box { background: #f8fafc; border-left: 4px solid #e60000; padding: 16px; border-radius: 0 8px 8px 0; margin: 20px 0; font-size: 14px; color: #334155; }
                .footer { background: #f8fafc; padding: 20px 24px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
                .contact-badge { display: inline-block; background: #fee2e2; color: #b91c1c; font-weight: 600; padding: 6px 14px; border-radius: 6px; font-size: 13px; margin-top: 12px; }
            </style>
        </head>
        <body>
            <div class="card">
                <div class="header">
                    <h1>SIGMA HEIGHT ELEVATORS</h1>
                    <p>Luxury & Commercial Elevator Engineering • Dubai, UAE</p>
                </div>
                <div class="content">
                    <h2 style="font-size: 18px; margin: 0 0 12px 0; color: #0f172a;">Dear ' . htmlspecialchars($customer_name) . ',</h2>
                    <p style="font-size: 14px; line-height: 1.6; color: #475569; margin: 0 0 16px 0;">
                        Thank you for reaching out to <strong>Sigma Height Elevators L.L.C</strong>. We have successfully received your inquiry regarding <strong>' . htmlspecialchars($enquiry['service'] ?? 'Elevator Services') . '</strong>.
                    </p>
                    
                    <div class="highlight-box">
                        <strong>What happens next?</strong><br>
                        One of our specialized vertical transportation engineers will review your request and contact you within <strong>24 business hours</strong> to discuss your project requirements or provide a customized quote.
                    </div>

                    <p style="font-size: 14px; line-height: 1.6; color: #475569;">
                        If your inquiry is urgent or requires immediate 24/7 technical dispatch, please feel free to reach our engineering hotline directly:
                    </p>

                    <div style="text-align: center; margin: 18px 0;">
                        <a href="tel:+971526405622" class="contact-badge" style="text-decoration: none;">
                            📞 Hotline: 052-6405622 / +971 4 885 8454
                        </a>
                    </div>
                </div>
                <div class="footer">
                    <strong>Sigma Height Elevators L.L.C</strong><br>
                    Damascus Street, Al Qusais Industrial Area 2, Dubai, United Arab Emirates<br>
                    <a href="' . site_url('') . '" style="color: #e60000; text-decoration: none;">www.sigmaheightelevators.com</a>
                </div>
            </div>
        </body>
        </html>';

        return $this->send_email($recipient, $subject, $body);
    }
}
