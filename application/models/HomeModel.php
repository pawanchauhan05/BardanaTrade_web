<?php

class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function startSession($name, $email) {
        $sessionArray = array(
            'name' => $name,
            'email' => $email,
            'loggedIn' => TRUE
        );
        $this->session->set_userdata('sessionData', $sessionArray);
    }

    public function stopSession() {
        $this->session->sess_destroy();
    }

    public function readSessionData() {
        return $sessionData = $this->session->all_userdata();
    }

}