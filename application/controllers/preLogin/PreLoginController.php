<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreLoginController extends CI_Controller {

	public function loginUser() {
        $userEmail = $this->input->post('login-email');
        $userPassword = $this->input->post('login-password');
        $this->form_validation->set_rules('login-email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('login-password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $viewData = array('redirectUrl' => 'preLogin/login');
            $this->load->view('index',$viewData);
        } else {
            $count = $this->PreLoginModel->isUserExist($userEmail);
            if($count != 0) {
                $data = $this->PreLoginModel->loginUser($userEmail, $userPassword);
                if($data->isComplete == 0) {
                    $this->HomeModel->startSession($data->name,  $data->email, FALSE);
                    redirect('check-profile'); 
                } else {
                    $this->HomeModel->startSession($data->name,  $data->email, TRUE);
                    redirect('profile');
                }
            }
        }        
    }

    public function registerUser() {
        $fullName = $this->input->post('signup-fullName');
        $email = $this->input->post('signup-email');
        $password = $this->input->post('signup-password');
        $mobile = $this->input->post('signup-mobile');
        $dob = $this->input->post('signup-dob');

        $this->form_validation->set_rules('signup-fullName', 'Full Name', 'trim|required|min_length[5]|max_length[18]');
        $this->form_validation->set_rules('signup-email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('signup-password', 'Password', 'trim|required|min_length[8]|xss_clean');
        $this->form_validation->set_rules('signup-mobile', 'Mobile Number', 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');
        $this->form_validation->set_rules('signup-dob', 'DOB', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            $viewData = array('redirectUrl' => 'preLogin/login');
            $this->load->view('index',$viewData);
        } else {

        }
    }
}
