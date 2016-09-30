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


}