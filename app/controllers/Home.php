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
        // Render the success page for the PDF generation
        $this->call->view('pdf_success');
    }

    public function download_pdf() {
        // Initialize mPDF
        $mpdf = new \Mpdf\Mpdf();
        
        // Content for the PDF - First Page (Notice)
        $html = '
        <div style="text-align: center;">
            <br><br><br><br>
            <h1 style="font-weight: bold;">NOTICE OF SCUBA DIVING APPROVAL</h1>
            <p>This is to inform you that you are now cleared to participate in the Scuba Diving Activity at City of Tourism and Culture. By your participation, you have agreed to the terms and conditions, including the assumption of all associated risks and the release of liability for City of Tourism and Culture and its personnel.</p>
            <p>You have confirmed that you are in good health and fully understand the risks involved in scuba diving.</p>
            <p>We wish you a safe and enjoyable diving experience!</p>
        </div>';
    
        // Write the HTML content for the first page (Notice)
        $mpdf->WriteHTML($html);
        
        // Add a page break for the second page (Image)
        $mpdf->AddPage();
        
        // Add an image (ensure the image path is correct and centered)
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/public/images/cert.png'; // Absolute path to the image
        
        // Center the image on the page by setting the X position dynamically
        $pageWidth = $mpdf->w;  // Get the page width
        $imageWidth = 150;  // Set the desired image width
        $xPosition = ($pageWidth - $imageWidth) / 2;  // Center the image
    
        // Adjust the Y position to move the image higher
        $yPosition = 45; // Move the image up by adjusting this value
    
        // Add the image to the PDF with the calculated position
        $mpdf->Image($imagePath, $xPosition, $yPosition, $imageWidth, 0, 'png', '', true, false); // Centered image
    
        // Output the PDF to the browser
        $mpdf->Output();
    }
    
    
    
    
    private function xss_clean($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }
}
