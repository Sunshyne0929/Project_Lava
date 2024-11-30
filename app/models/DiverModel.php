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
}
