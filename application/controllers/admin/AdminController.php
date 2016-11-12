<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin Controller to control all data flow
 */
class AdminController extends CI_Controller {
    
    /**
     * to load index page
     */
    public function index() {
        $data = array(
            'uri' => '',
            'success' => '');
        $this->load->view('admin/index', $data);
    }
    

    /**
     * to check admin exist or not
     */
    public function isAdminExist() {
        $userEmail = $this->input->post('email');
        $userPassword = $this->input->post('password');
        //$data = $this->User->loginUserMobile($userEmail, md5($userPassword));
        $data = $this->AdminModel->adminLogin($userEmail, $userPassword);
        if (isset($data)) {
            $this->AdminModel->startSession($data->name, $data->email);
            $this->index();
        }
    }

    /**
     * to logout admin
     */
    public function logout() {
        $this->AdminModel->stopSession();
        $this->index();
    }

}
