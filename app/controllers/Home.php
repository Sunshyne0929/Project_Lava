<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Home extends Controller {

    public function __construct() {
        parent::__construct();

        // Ensure the user is logged in before accessing the controller
        if (!logged_in()) {
            redirect('auth');
        }

        // Load the DiverModel
        $this->call->model('DiverModel');
    }

    public function index() {
        $this->call->view('homepage');
    }

    public function terms() {
        $this->call->view('terms_and_conditions');
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form data
            $data = [
                'last_name' => $this->xss_clean($_POST['last_name']),
                'first_name' => $this->xss_clean($_POST['first_name']),
                'middle_name' => $this->xss_clean($_POST['middle_name']),
                'dob' => $this->xss_clean($_POST['dob']),
                'gender' => $this->xss_clean($_POST['gender']),
                'address' => $this->xss_clean($_POST['address']),
                'contact_number' => $this->xss_clean($_POST['contact_number']),
                'emergency_contact_number' => $this->xss_clean($_POST['emergency_contact_number']),
                'emergency_contact_person' => $this->xss_clean($_POST['emergency_contact_person']),
                'experience' => $this->xss_clean($_POST['experience']),
                'diving_certification' => $this->xss_clean($_POST['diving_certification']),
            ];

            // Save data using the model
            if ($this->DiverModel->registerDiver($data)) {
                // Generate PDF certificate using the model
                $pdfPath = $this->DiverModel->generatePDF($data);

                // Store PDF path in session and redirect to success page
                $_SESSION['pdf_path'] = $pdfPath;
                redirect('/pdf_success');
            } else {
                die('Failed to register diver.');
            }
        }

        // Render registration form for GET requests
        $this->call->view('register_diver');
    }

    public function pdf_success() {
        $this->call->view('pdf_success');
    }

    private function xss_clean($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}
