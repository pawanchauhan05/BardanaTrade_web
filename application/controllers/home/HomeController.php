<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function logoutUser() {
		$this->HomeModel->stopSession();
		redirect('index');
	}

	public function userProfileComplete() {
		$this->HomeModel->completeProfile();
	}

	public function updateUserProfileName() {
		$fullName = $this->input->post('value');
		$this->HomeModel->updateName($fullName);
	}
}