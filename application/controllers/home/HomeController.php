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

	public function updateUserProfileMobile() {
		$mobile = $this->input->post('value');
		$this->HomeModel->updateMobile($mobile);
	}

	public function updateUserProfileOrganisation() {
		$organisation = $this->input->post('value');
		$this->HomeModel->updateOrganisation($organisation);
	}

	public function updateUserProfileDesignation() {
		$designation = $this->input->post('value');
		$this->HomeModel->updateDesignation($designation);
	}


	public function updateUserProfileAddress() {
		$location = $this->input->post('value');
		$this->HomeModel->updateLocation($location);
	}

	public function updateUserProfileCity() {
		$city = $this->input->post('value');
		$this->HomeModel->updateCity($city);
	}


	public function updateUserProfileState() {
		$state = $this->input->post('value');
		$this->HomeModel->updateState($state);
	}

	public function updateUserProfileCountry() {
		$country = $this->input->post('value');
		$this->HomeModel->updateCountry($country);
	}

	public function updateUserProfilePincode() {
		$pincode = $this->input->post('value');
		$this->HomeModel->updatePincode($pincode);
	}

	public function filterProductsBySubCategory() {
		$category = $this->input->post('category');
		$this->HomeModel->showProductsBySubCategory($category);
	}
}