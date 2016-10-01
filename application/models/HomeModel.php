<?php

class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function startSession($name, $email, $flag) {
        $sessionArray = array(
            'name' => $name,
            'email' => $email,
            'loggedIn' => TRUE,
            'isProfileComplete' => $flag
        );
        $this->session->set_userdata('sessionData', $sessionArray);
    }

    public function stopSession() {
        $this->session->sess_destroy();
    }

    public function readSessionData() {
        return $sessionData = $this->session->all_userdata();
    }

    public function completeProfile() {
        $data = array(
            'isComplete' => 1,
            'organisation' => 'Fitterfox',
            'designation' => 'Developer',
            'country' => 'India',
            'state' => 'Rajasthan',
            'city' => 'Kota',
            'address' => 'Kota Beraj'
        );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
            $this->startSession('Pawan Singh', 'demo@gmail.com', TRUE);
            redirect('profile');
        } else {

        }
    }

    public function updateName($fullName) {
        $data = array(
                'name' => $fullName
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateMobile($mobileNumber) {
        $data = array(
                'mobile' => $mobileNumber
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateOrganisation($organisation) {
        $data = array(
                'organisation' => $organisation
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateDesignation($designation) {
        $data = array(
                'designation' => $designation
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateLocation($location) {
        $data = array(
                'address' => $location
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCity($city) {
        $data = array(
                'city' => $location
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateState($state) {
        $data = array(
                'state' => $state
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCountry($country) {
        $data = array(
                'country' => $country
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updatePincode($pincode) {
        $data = array(
                'pincode' => $pincode
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    /***************************** for products ************************************/

    public function showProducts($forWhich) {
        $condition = "isVisible =" . "'" . "1" . "' AND " . "forWhich =" . "'" . $forWhich . "'";
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $query = $this->db->get();
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $query->num_rows() 
                );
            return (object)$data;
        } else {
            $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(" { " . '"status"' . " : " . '"invalid credentials"' . " } ")
                    ->_display();
            exit();
        }
    }

    public function showProductsByCategory($category, $forWhich) {
        $condition = "isVisible =" . "'" . "1" . "' AND " . "forWhich =" . "'" . $forWhich . "' AND " . "productCategory =" . "'" . $category . "'   ";
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $query = $this->db->get();
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $query->num_rows() 
                );
            return (object)$data;
        } else {
            $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(" { " . '"status"' . " : " . '"invalid credentials"' . " } ")
                    ->_display();
            exit();
        }
    }

    public function getProductCategory() {
        $this->db->select('*');
        $this->db->from('Categories');
        $query = $this->db->get();
        if (isset($query)) {
            return $query->result();
        } 
    }

    public function getProductSubCategory($category) {
        $condition = array("category" => $category);
        $this->db->select('*');
        $this->db->from('Categories');
        $this->db->where($condition);
        $query = $this->db->get();
        if (isset($query)) {
            return $query->result();
        } 
    }




}