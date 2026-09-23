<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form', 'string']);
        $this->load->library(['session']);
        $this->load->model('Slider_model');
        $this->load->model('Service_model');
        $this->load->model('Project_model');
        $this->load->model('Review_model');
        $this->load->model('Enquiry_model');
        $this->load->model('About_model');
        $this->load->model('Contact_model');
        $this->load->model('Smtp_model');
        $this->load->model('Admin_model');

        // Check authentication for protected admin pages
        $current_method = $this->router->fetch_method();
        if ($current_method !== 'login' && $current_method !== 'do_login') {
            if (!$this->session->userdata('admin_logged_in')) {
                redirect('admin/login');
            }
        }
    }

    // Helper for file upload
    private function upload_image($field_name, $subfolder = 'general') {
        if (!empty($_FILES[$field_name]['name'])) {
            $target_dir = FCPATH . 'assets/uploads/' . $subfolder . '/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $ext = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
            if (in_array($ext, $allowed)) {
                $filename = time() . '_' . random_string('alnum', 8) . '.' . $ext;
                $dest = $target_dir . $filename;
                if (move_uploaded_file($_FILES[$field_name]['tmp_name'], $dest)) {
                    return 'assets/uploads/' . $subfolder . '/' . $filename;
                }
            }
        }
        return null;
    }

    // =========================================================================
    // DASHBOARD
    // =========================================================================
    public function index() {
        $data['title'] = 'Dashboard Overview';
        $data['count_sliders'] = $this->Slider_model->count_total();
        $data['count_services'] = $this->Service_model->count_total();
        $data['count_projects'] = $this->Project_model->count_total();
        $data['count_reviews'] = $this->Review_model->count_total();
        $data['count_enquiries'] = $this->Enquiry_model->count_total();
        $data['recent_enquiries'] = $this->Enquiry_model->get_all(6);

        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    // =========================================================================
    // SLIDERS MANAGEMENT
    // =========================================================================
    public function sliders() {
        $data['title'] = 'Manage Sliders';
        $data['sliders'] = $this->Slider_model->get_all();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/sliders/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function add_slider() {
        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'sliders');
            $image_url = $uploaded ? $uploaded : $this->input->post('image_url');

            $data = [
                'title'          => $this->input->post('title'),
                'highlight_text' => $this->input->post('highlight_text'),
                'subtitle'       => $this->input->post('subtitle'),
                'badge_text'     => $this->input->post('badge_text'),
                'button_text'    => $this->input->post('button_text'),
                'button_link'    => $this->input->post('button_link'),
                'image'          => $image_url ?: 'assets/images/hero_panoramic.jpg',
                'sort_order'     => (int)$this->input->post('sort_order'),
                'is_active'      => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Slider_model->insert($data);
            $this->session->set_flashdata('success', 'Hero slide added successfully!');
            redirect('admin/sliders');
        }

        $data['title'] = 'Add New Slide';
        $data['slider'] = null;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/sliders/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function edit_slider($id) {
        $slider = $this->Slider_model->get_by_id($id);
        if (!$slider) {
            redirect('admin/sliders');
        }

        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'sliders');
            $image_url = $uploaded ? $uploaded : ($this->input->post('image_url') ?: $slider['image']);

            $data = [
                'title'          => $this->input->post('title'),
                'highlight_text' => $this->input->post('highlight_text'),
                'subtitle'       => $this->input->post('subtitle'),
                'badge_text'     => $this->input->post('badge_text'),
                'button_text'    => $this->input->post('button_text'),
                'button_link'    => $this->input->post('button_link'),
                'image'          => $image_url,
                'sort_order'     => (int)$this->input->post('sort_order'),
                'is_active'      => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Slider_model->update($id, $data);
            $this->session->set_flashdata('success', 'Hero slide updated successfully!');
            redirect('admin/sliders');
        }

        $data['title'] = 'Edit Slide #' . $id;
        $data['slider'] = $slider;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/sliders/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function delete_slider($id) {
        $this->Slider_model->delete($id);
        $this->session->set_flashdata('success', 'Slide deleted successfully!');
        redirect('admin/sliders');
    }

    public function toggle_slider($id) {
        $new_status = $this->Slider_model->toggle_status($id);
        $this->session->set_flashdata('success', 'Slider status updated!');
        redirect('admin/sliders');
    }

    // =========================================================================
    // SERVICES MANAGEMENT
    // =========================================================================
    public function services() {
        $data['title'] = 'Manage Services';
        $data['services'] = $this->Service_model->get_all();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/services/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function add_service() {
        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'services');
            $image_url = $uploaded ? $uploaded : $this->input->post('image_url');

            $data = [
                'title'       => $this->input->post('title'),
                'slug'        => url_title($this->input->post('title'), 'dash', TRUE),
                'icon_svg'    => $this->input->post('icon_svg'),
                'short_desc'  => $this->input->post('short_desc'),
                'full_desc'   => $this->input->post('full_desc'),
                'features'    => $this->input->post('features'),
                'image'       => $image_url ?: 'assets/images/service_passenger.jpg',
                'button_text' => $this->input->post('button_text') ?: 'Get A Quote',
                'sort_order'  => (int)$this->input->post('sort_order'),
                'is_active'   => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Service_model->insert($data);
            $this->session->set_flashdata('success', 'Service added successfully!');
            redirect('admin/services');
        }

        $data['title'] = 'Add New Service';
        $data['service'] = null;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/services/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function edit_service($id) {
        $service = $this->Service_model->get_by_id($id);
        if (!$service) {
            redirect('admin/services');
        }

        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'services');
            $image_url = $uploaded ? $uploaded : ($this->input->post('image_url') ?: $service['image']);

            $data = [
                'title'       => $this->input->post('title'),
                'slug'        => url_title($this->input->post('title'), 'dash', TRUE),
                'icon_svg'    => $this->input->post('icon_svg'),
                'short_desc'  => $this->input->post('short_desc'),
                'full_desc'   => $this->input->post('full_desc'),
                'features'    => $this->input->post('features'),
                'image'       => $image_url,
                'button_text' => $this->input->post('button_text') ?: 'Get A Quote',
                'sort_order'  => (int)$this->input->post('sort_order'),
                'is_active'   => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Service_model->update($id, $data);
            $this->session->set_flashdata('success', 'Service updated successfully!');
            redirect('admin/services');
        }

        $data['title'] = 'Edit Service: ' . $service['title'];
        $data['service'] = $service;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/services/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function delete_service($id) {
        $this->Service_model->delete($id);
        $this->session->set_flashdata('success', 'Service deleted successfully!');
        redirect('admin/services');
    }

    public function toggle_service($id) {
        $this->Service_model->toggle_status($id);
        $this->session->set_flashdata('success', 'Service status updated!');
        redirect('admin/services');
    }

    // =========================================================================
    // PROJECTS MANAGEMENT
    // =========================================================================
    public function projects() {
        $data['title'] = 'Manage Projects';
        $data['projects'] = $this->Project_model->get_all();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/projects/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function add_project() {
        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'projects');
            $image_url = $uploaded ? $uploaded : $this->input->post('image_url');

            $data = [
                'title'           => $this->input->post('title'),
                'slug'            => url_title($this->input->post('title'), 'dash', TRUE),
                'category'        => $this->input->post('category'),
                'location'        => $this->input->post('location'),
                'client_name'     => $this->input->post('client_name'),
                'completion_year' => $this->input->post('completion_year'),
                'description'     => $this->input->post('description'),
                'image'           => $image_url ?: 'assets/images/hero_panoramic.jpg',
                'is_featured'     => $this->input->post('is_featured') ? 1 : 0,
                'sort_order'      => (int)$this->input->post('sort_order'),
                'is_active'       => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Project_model->insert($data);
            $this->session->set_flashdata('success', 'Project added successfully!');
            redirect('admin/projects');
        }

        $data['title'] = 'Add New Project';
        $data['project'] = null;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/projects/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function edit_project($id) {
        $project = $this->Project_model->get_by_id($id);
        if (!$project) {
            redirect('admin/projects');
        }

        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'projects');
            $image_url = $uploaded ? $uploaded : ($this->input->post('image_url') ?: $project['image']);

            $data = [
                'title'           => $this->input->post('title'),
                'slug'            => url_title($this->input->post('title'), 'dash', TRUE),
                'category'        => $this->input->post('category'),
                'location'        => $this->input->post('location'),
                'client_name'     => $this->input->post('client_name'),
                'completion_year' => $this->input->post('completion_year'),
                'description'     => $this->input->post('description'),
                'image'           => $image_url,
                'is_featured'     => $this->input->post('is_featured') ? 1 : 0,
                'sort_order'      => (int)$this->input->post('sort_order'),
                'is_active'       => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Project_model->update($id, $data);
            $this->session->set_flashdata('success', 'Project updated successfully!');
            redirect('admin/projects');
        }

        $data['title'] = 'Edit Project: ' . $project['title'];
        $data['project'] = $project;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/projects/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function delete_project($id) {
        $this->Project_model->delete($id);
        $this->session->set_flashdata('success', 'Project deleted successfully!');
        redirect('admin/projects');
    }

    public function toggle_project($id) {
        $this->Project_model->toggle_status($id);
        $this->session->set_flashdata('success', 'Project status updated!');
        redirect('admin/projects');
    }

    public function toggle_project_featured($id) {
        $this->Project_model->toggle_featured($id);
        $this->session->set_flashdata('success', 'Featured status updated!');
        redirect('admin/projects');
    }

    // =========================================================================
    // REVIEWS MANAGEMENT
    // =========================================================================
    public function reviews() {
        $data['title'] = 'Manage Client Reviews';
        $data['reviews'] = $this->Review_model->get_all();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/reviews/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function add_review() {
        if ($this->input->post()) {
            $uploaded = $this->upload_image('avatar_file', 'reviews');
            $avatar_url = $uploaded ? $uploaded : $this->input->post('client_avatar');

            $data = [
                'client_name'   => $this->input->post('client_name'),
                'client_title'  => $this->input->post('client_title'),
                'company'       => $this->input->post('company'),
                'rating'        => (int)$this->input->post('rating'),
                'review_text'   => $this->input->post('review_text'),
                'client_avatar' => $avatar_url,
                'sort_order'    => (int)$this->input->post('sort_order'),
                'is_active'     => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Review_model->insert($data);
            $this->session->set_flashdata('success', 'Review added successfully!');
            redirect('admin/reviews');
        }

        $data['title'] = 'Add New Review';
        $data['review'] = null;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/reviews/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function edit_review($id) {
        $review = $this->Review_model->get_by_id($id);
        if (!$review) {
            redirect('admin/reviews');
        }

        if ($this->input->post()) {
            $uploaded = $this->upload_image('avatar_file', 'reviews');
            $avatar_url = $uploaded ? $uploaded : ($this->input->post('client_avatar') ?: $review['client_avatar']);

            $data = [
                'client_name'   => $this->input->post('client_name'),
                'client_title'  => $this->input->post('client_title'),
                'company'       => $this->input->post('company'),
                'rating'        => (int)$this->input->post('rating'),
                'review_text'   => $this->input->post('review_text'),
                'client_avatar' => $avatar_url,
                'sort_order'    => (int)$this->input->post('sort_order'),
                'is_active'     => $this->input->post('is_active') ? 1 : 0
            ];
            $this->Review_model->update($id, $data);
            $this->session->set_flashdata('success', 'Review updated successfully!');
            redirect('admin/reviews');
        }

        $data['title'] = 'Edit Review: ' . $review['client_name'];
        $data['review'] = $review;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/reviews/form', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function delete_review($id) {
        $this->Review_model->delete($id);
        $this->session->set_flashdata('success', 'Review deleted successfully!');
        redirect('admin/reviews');
    }

    public function toggle_review($id) {
        $this->Review_model->toggle_status($id);
        $this->session->set_flashdata('success', 'Review status updated!');
        redirect('admin/reviews');
    }

    // =========================================================================
    // ENQUIRIES MANAGEMENT
    // =========================================================================
    public function enquiries() {
        $data['title'] = 'Customer Inquiries & Quotes';
        $data['enquiries'] = $this->Enquiry_model->get_all();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/enquiries/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function update_enquiry_status($id) {
        $status = $this->input->post('status') ?: 'Contacted';
        $this->Enquiry_model->update_status($id, $status);
        $this->session->set_flashdata('success', 'Inquiry status updated!');
        redirect('admin/enquiries');
    }

    public function delete_enquiry($id) {
        $this->Enquiry_model->delete($id);
        $this->session->set_flashdata('success', 'Inquiry deleted successfully!');
        redirect('admin/enquiries');
    }

    // =========================================================================
    // DYNAMIC ABOUT US MANAGEMENT
    // =========================================================================
    public function about() {
        if ($this->input->post()) {
            $uploaded = $this->upload_image('image_file', 'about');
            $current = $this->About_model->get_data();
            $image_url = $uploaded ? $uploaded : ($this->input->post('image_url') ?: $current['image']);
            $image_url = str_replace('\\', '/', trim($image_url));

            $data = [
                'badge'               => $this->input->post('badge'),
                'title'               => $this->input->post('title'),
                'subtitle'            => $this->input->post('subtitle'),
                'story'               => $this->input->post('story'),
                'mission'             => $this->input->post('mission'),
                'vision'              => $this->input->post('vision'),
                'experience_years'    => $this->input->post('experience_years'),
                'elevators_installed' => $this->input->post('elevators_installed'),
                'client_satisfaction' => $this->input->post('client_satisfaction'),
                'image'               => $image_url
            ];
            $this->About_model->update_data($data);
            $this->session->set_flashdata('success', 'About Us page updated successfully!');
            redirect('admin/about');
        }

        $data['title'] = 'Manage About Us Page';
        $data['about'] = $this->About_model->get_data();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/about/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    // =========================================================================
    // DYNAMIC CONTACT US MANAGEMENT
    // =========================================================================
    public function contact_settings() {
        if ($this->input->post()) {
            $data = [
                'heading'         => $this->input->post('heading'),
                'subheading'      => $this->input->post('subheading'),
                'address'         => $this->input->post('address'),
                'phone'           => $this->input->post('phone'),
                'emergency_phone' => $this->input->post('emergency_phone'),
                'email'           => $this->input->post('email'),
                'working_hours'   => $this->input->post('working_hours'),
                'map_iframe'      => $this->input->post('map_iframe')
            ];
            $this->Contact_model->update_data($data);
            $this->session->set_flashdata('success', 'Contact page details updated successfully!');
            redirect('admin/contact_settings');
        }

        $data['title'] = 'Manage Contact Us Page & Info';
        $data['contact'] = $this->Contact_model->get_data();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/contact/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    // =========================================================================
    // SMTP & EMAIL CONFIGURATION
    // =========================================================================
    public function smtp_settings() {
        if ($this->input->post()) {
            $data = [
                'is_enabled'                 => 1,
                'smtp_host'                  => trim($this->input->post('smtp_host')),
                'smtp_port'                  => (int)$this->input->post('smtp_port'),
                'smtp_crypto'                => trim($this->input->post('smtp_crypto')),
                'smtp_user'                  => trim($this->input->post('smtp_user')),
                'smtp_pass'                  => $this->input->post('smtp_pass'),
                'from_email'                 => trim($this->input->post('from_email')),
                'from_name'                  => trim($this->input->post('from_name')),
                'reply_to'                   => trim($this->input->post('reply_to')),
                'admin_email'                => trim($this->input->post('admin_email')),
                'send_inquiry_notification'  => 1,
                'send_customer_confirmation' => 1
            ];

            $this->Smtp_model->update_settings($data);
            $this->session->set_flashdata('success', 'SMTP and Email configuration saved successfully!');
            redirect('admin/smtp_settings');
        }

        $data['title'] = 'SMTP & Email Configuration';
        $data['smtp']  = $this->Smtp_model->get_settings();
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar', $data);
        $this->load->view('admin/smtp/index', $data);
        $this->load->view('admin/layout/footer', $data);
    }

    public function test_smtp() {
        $recipient = $this->input->post('test_email');
        if (empty($recipient) || !filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $resp = [
                'status'  => 'error',
                'message' => 'Please provide a valid recipient email address for testing.'
            ];
            if ($this->input->is_ajax_request()) {
                $this->output->set_content_type('application/json')->set_output(json_encode($resp));
                return;
            }
            $this->session->set_flashdata('error', $resp['message']);
            redirect('admin/smtp_settings');
        }

        $subject = '✅ Sigma Height Elevators - SMTP Test Email Delivery';
        $time = date('Y-m-d H:i:s');
        $body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 20px auto; border: 1px solid #e2e8f0; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);'>
            <div style='background: #0b0f19; color: #ffffff; padding: 24px; text-align: center; border-bottom: 3px solid #e60000;'>
                <h2 style='margin: 0; font-size: 20px;'>SIGMA HEIGHT ELEVATORS</h2>
                <p style='margin: 4px 0 0 0; font-size: 13px; color: #94a3b8;'>SMTP Test Message Confirmation</p>
            </div>
            <div style='padding: 24px; background: #ffffff;'>
                <div style='background: #dcfce7; color: #15803d; padding: 12px 16px; border-radius: 6px; font-weight: 600; font-size: 14px; margin-bottom: 20px;'>
                    ✔ SMTP Connection and Authentication Verified Successfully!
                </div>
                <p style='color: #334155; font-size: 14px; line-height: 1.6;'>
                    This is a live test email sent from the <strong>Sigma Height Elevators Admin Dashboard</strong>. Your mail server configuration is operating properly and ready to dispatch lead alerts and notifications.
                </p>
                <table style='width: 100%; border-collapse: collapse; margin-top: 16px; font-size: 13px;'>
                    <tr>
                        <td style='padding: 8px 0; color: #64748b; width: 35%;'>Timestamp:</td>
                        <td style='padding: 8px 0; color: #0f172a; font-weight: 600;'>{$time} (UTC)</td>
                    </tr>
                    <tr>
                        <td style='padding: 8px 0; color: #64748b;'>Delivered To:</td>
                        <td style='padding: 8px 0; color: #0f172a; font-weight: 600;'>{$recipient}</td>
                    </tr>
                </table>
            </div>
            <div style='background: #f8fafc; padding: 14px 24px; font-size: 12px; color: #94a3b8; text-align: center; border-top: 1px solid #e2e8f0;'>
                Sigma Height Elevators L.L.C • Dubai, UAE
            </div>
        </div>";

        $result = $this->Smtp_model->send_email($recipient, $subject, $body);

        if ($result['success']) {
            $resp = [
                'status'   => 'success',
                'message'  => 'Test email was dispatched successfully to <strong>' . htmlspecialchars($recipient) . '</strong>! Check your inbox/spam folder.',
                'debugger' => $result['debugger']
            ];
            if ($this->input->is_ajax_request()) {
                $this->output->set_content_type('application/json')->set_output(json_encode($resp));
                return;
            }
            $this->session->set_flashdata('success', $resp['message']);
        } else {
            $resp = [
                'status'   => 'error',
                'message'  => 'Failed to send test email. Please verify your SMTP host, port, username, and password credentials.',
                'debugger' => $result['debugger']
            ];
            if ($this->input->is_ajax_request()) {
                $this->output->set_content_type('application/json')->set_output(json_encode($resp));
                return;
            }
            $this->session->set_flashdata('error', $resp['message']);
        }

        redirect('admin/smtp_settings');
    }

    // =========================================================================
    // AUTHENTICATION & LOGIN
    // =========================================================================
    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }
        $data['title'] = 'Admin Login';
        $this->load->view('admin/login', $data);
    }

    public function do_login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('admin');
        }

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username) || empty($password)) {
            $this->session->set_flashdata('error', 'Please enter both username and password.');
            redirect('admin/login');
        }

        $user = $this->Admin_model->verify_credentials($username, $password);

        if ($user) {
            $this->session->set_userdata([
                'admin_logged_in' => TRUE,
                'admin_id'        => $user['id'],
                'admin_username'  => $user['username'],
                'admin_name'      => $user['name'],
                'admin_email'     => $user['email']
            ]);
            $this->session->set_flashdata('success', 'Welcome back, ' . htmlspecialchars($user['name']) . '!');
            redirect('admin');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('admin/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['admin_logged_in', 'admin_id', 'admin_username', 'admin_name', 'admin_email']);
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}

