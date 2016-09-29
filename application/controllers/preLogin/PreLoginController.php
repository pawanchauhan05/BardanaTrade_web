<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PreLoginController extends CI_Controller {

	public function loginUser() {
        /*$userEmail = $this->input->post('email');
        $userPassword = $this->input->post('password');

        $count = $this->PreLoginModel->isUserExist($userEmail);
        if($count != 0) {
            $data = $this->PreLoginModel->loginUser($userEmail, $userPassword);
        }*/

        $data = $this->PreLoginModel->loginUser("demo@gmail.com", "12345");
        $this->HomeModel->startSession($data->name,  $data->email);
        redirect('profile');
    }
}
