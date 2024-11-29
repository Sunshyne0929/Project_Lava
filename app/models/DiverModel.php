<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class DiverModel extends Model {

    public function registerDiver($data) {
        $sql = "INSERT INTO divers (last_name, first_name, middle_name, dob, gender, address, contact_number, 
                emergency_contact_number, emergency_contact_person, experience, diving_certification)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $params = [
            $data['last_name'],
            $data['first_name'],
            $data['middle_name'],
            $data['dob'],
            $data['gender'],
            $data['address'],
            $data['contact_number'],
            $data['emergency_contact_number'],
            $data['emergency_contact_person'],
            $data['experience'],
            $data['diving_certification']
        ];

        return $this->db->query($sql, $params);
    }

    public function generatePDF($data) {
        $pdf = new TCPDF();
        $pdf->SetCreator('Diver Registration System');
        $pdf->SetTitle('Diver Registration Certificate');
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        // Add a title
        $pdf->Cell(0, 10, 'Diver Registration Certificate', 0, 1, 'C');
        $pdf->Ln(10);

        // Add content
        $content = '';
        foreach ($data as $key => $value) {
            $key = ucfirst(str_replace('_', ' ', $key));
            $content .= "<strong>{$key}:</strong> {$value}<br>";
        }

        $pdf->writeHTML($content, true, false, true, false, '');

        // Save PDF file to a specific directory
        $pdfPath = 'uploads/certificates/' . $data['last_name'] . '_' . $data['first_name'] . '.pdf';
        $pdf->Output($pdfPath, 'F');

        return $pdfPath;
    }
}
