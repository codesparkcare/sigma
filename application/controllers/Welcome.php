<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->model('Slider_model');
        $this->load->model('Service_model');
        $this->load->model('Project_model');
        $this->load->model('Review_model');
        $this->load->model('Enquiry_model');
        $this->load->model('About_model');
        $this->load->model('Contact_model');
        $this->load->model('Smtp_model');
    }

    // Homepage with Dynamic Sliders, Services, Projects, and Reviews
    public function index()
    {
        $data['sliders']  = $this->Slider_model->get_all(true);
        $data['services'] = $this->Service_model->get_all(true);
        $data['projects'] = $this->Project_model->get_all(true);
        $data['reviews']  = $this->Review_model->get_all(true);

        $this->load->view('index', $data);
    }

    // Dedicated About Us Page (Dynamic CMS)
    public function about()
    {
        $data['title'] = 'About Us | Sigma Height Elevators Dubai, UAE';
        $data['about'] = $this->About_model->get_data();

        $this->load->view('about', $data);
    }

    // Dedicated Services Page
    public function services()
    {
        $data['title']    = 'Elevator Services & Engineering Solutions';
        $data['services'] = $this->Service_model->get_all(true);

        $this->load->view('services', $data);
    }

    // Single Service Detail Page (Redirected to Services)
    public function service_detail($id = null)
    {
        redirect('services');
    }

    // Dedicated Projects Showcase Page
    public function projects()
    {
        $data['title']      = 'Our Elevator Projects & Landmark Installations';
        $category           = $this->input->get('category');
        $data['category']   = $category;
        $data['projects']   = $this->Project_model->get_all(true, $category);
        $data['categories'] = $this->Project_model->get_categories();

        $this->load->view('projects', $data);
    }

    // Single Project Detail Page (Redirected to Projects)
    public function project_detail($id = null)
    {
        redirect('projects');
    }

    // Dedicated Contact Us Page (Dynamic CMS)
    public function contact()
    {
        $data['title']   = 'Contact Us | Sigma Height Elevators Dubai, UAE';
        $data['contact'] = $this->Contact_model->get_data();

        $this->load->view('contact', $data);
    }

    // Contact and Quote Inquiry Submission
    public function save_enquiry()
    {
        $phone = $this->input->post('phone');
        $digits = preg_replace('/[^0-9]/', '', (string)$phone);

        if (empty($phone) || strlen($digits) < 7) {
            if ($this->input->is_ajax_request()) {
                $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => 'error', 'message' => 'Please enter a valid phone number with UAE format (minimum 7 to 9 digits).']));
                return;
            }
            show_error('Please provide a valid contact number (minimum 7 digits).', 400);
            return;
        }

        $data = array(
            'name'    => $this->input->post('name'),
            'email'   => $this->input->post('email'),
            'phone'   => $phone,
            'service' => $this->input->post('service') ?: 'General Inquiry',
            'message' => $this->input->post('message'),
            'status'  => 'New'
        );

        try {
            $this->Enquiry_model->insert($data);

            // Dispatch automated email notifications via SMTP if enabled
            $this->Smtp_model->send_inquiry_notification($data);
            if (!empty($data['email'])) {
                $this->Smtp_model->send_customer_confirmation($data);
            }
        } catch (Throwable $e) {
            log_message('error', $e->getMessage());
        }

        if ($this->input->is_ajax_request()) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'success', 'message' => 'Thank you! Your inquiry has been submitted. Our engineering team will contact you shortly.']));
            return;
        }

        echo "<div style='font-family:sans-serif;text-align:center;padding:50px;'><h2>Enquiry Submitted Successfully</h2><p>Thank you for contacting Sigma Height Elevators LLC.</p><a href='".site_url('')."' style='color:#e60000;font-weight:bold;'>Return to Website</a></div>";
    }
}
