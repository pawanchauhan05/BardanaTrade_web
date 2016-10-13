<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function logoutUser() {
		$this->HomeModel->stopSession();
		redirect('index');
	}

	public function userProfileComplete() {
		$organisation = $this->input->post('check-profile-organisation');
		$designation = $this->input->post('check-profile-designation');
		$country = $this->input->post('check-profile-country');
		$state = $this->input->post('check-profile-state');
		$city = $this->input->post('check-profile-city');
		$pincode = $this->input->post('check-profile-pincode');
		$address = $this->input->post('check-profile-address');

		$this->form_validation->set_rules('check-profile-organisation', 'Organisation', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('check-profile-designation', 'Designation', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('check-profile-country', 'Country', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('check-profile-state', 'State', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('check-profile-city', 'City', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('check-profile-pincode', 'City', 'trim|required|numeric|max_length[8]');
		$this->form_validation->set_rules('check-profile-address', 'Address', 'trim|required|max_length[70]');

		if($this->form_validation->run() == FALSE) {
            $viewData = array('redirectUrl' => 'home/check-profile');
            $this->load->view('index',$viewData);
        } else {
        	$data = array(
        			'organisation' => $organisation,
        			'designation' => $designation,
        			'country' => $country,
        			'state' => $state,
        			'city' => $city,
        			'pincode' => $pincode,
        			'address' => $address,
        		);
        	$this->HomeModel->completeProfile($data);
        }
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

	public function sellProduct() {
		$forWhich = $this->input->post('forWhich');
		$name = $this->input->post('product-form-name');
		$other = $this->input->post('product-form-other');
		$price = $this->input->post('product-form-price');
		$brand = $this->input->post('product-form-brand');
		$description = $this->input->post('product-form-description');
		if($name != null && $name == "Others") {
			$this->form_validation->set_rules('product-form-other', 'Product', 'trim|required|max_length[40]');
			$name = $other;
		}
		$this->form_validation->set_rules('product-form-name', 'Product', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('product-form-price', 'Price', 'trim|required|numeric');
		$this->form_validation->set_rules('product-form-brand', 'Brand', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('product-form-description', 'Description', 'trim|required|max_length[120]');

		if($this->form_validation->run() == FALSE) {
            $viewData = array(
            	'redirectUrl' => 'home/product-form',
            	'forWhich' => $forWhich,
            	'error' => ''
            	);
            $this->load->view('index',$viewData);
        } else {
        	$fileName = time().$_FILES["product-form-image"]['name'];
        	$config = array(
				'upload_path' => "./images/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024",
				'file_name' => $fileName
				);
        	//$this->load->library('upload', $config);
        	$this->upload->initialize($config);
        	if($this->upload->do_upload('product-form-image')) {
        		// success
        		$data = array(
        			'name' => $name,
        			'price' => $price,
        			'brand' => $brand,
        			'description' => $description,
        			'forWhich' => $forWhich,
        			'fileName' => $fileName
        		 );
        		$viewData = array(
		            	'redirectUrl' => 'home/product-form',
		            	'forWhich' => $forWhich,
		            	'status' => '<p class="product-form-status">Product has been added successfully.</p>'
	            	);
        		$this->load->view('index',$viewData);
        	} else {
        		$viewData = array(
		            	'redirectUrl' => 'home/product-form',
		            	'forWhich' => $forWhich,
		            	'error' => $this->upload->display_errors()
	            	);
        		$this->load->view('index',$viewData);
        	}
        }
	}

	public function updateProduct() {
		$productId = $this->input->post('update-product-productId');
		$name = $this->input->post('update-product-name');
		$other = $this->input->post('update-product-other');
		$price = $this->input->post('update-product-price');
		$brand = $this->input->post('update-product-brand');
		$description = $this->input->post('update-product-description');
		if($name != null && $name == "Others") {
			$this->form_validation->set_rules('update-product', 'Product', 'trim|required|max_length[40]');
			$name = $other;
		}
		$this->form_validation->set_rules('update-product-name', 'Product', 'trim|required|max_length[40]');
		$this->form_validation->set_rules('update-product-price', 'Price', 'trim|required|numeric');
		$this->form_validation->set_rules('update-product-brand', 'Brand', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('update-product-description', 'Description', 'trim|required|max_length[120]');

		if($this->form_validation->run() == FALSE) {
            $viewData = array(
            	'redirectUrl' => 'home/update-product',
            	'productId' => $productId,
            	'error' => ''
            	);
            $this->load->view('index',$viewData);
        } else {
        	$fileName = time().$_FILES["update-product-image"]['name'];
        	$config = array(
				'upload_path' => "./images/",
				'allowed_types' => "gif|jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024",
				'file_name' => $fileName
				);
        	$this->upload->initialize($config);
        	if($this->upload->do_upload('update-product-image')) {
        		// success
        		$data = array(
        			'name' => $name,
        			'price' => $price,
        			'brand' => $brand,
        			'description' => $description,
        			'forWhich' => $forWhich,
        			'fileName' => $fileName
        		 ); 

        		$viewData = array(
		            	'redirectUrl' => 'home/update-product',
		            	'forWhich' => $forWhich,
		            	'status' => '<p class="update-product">Product has been updated successfully.</p>'
	            	);
        	} else {
        		$viewData = array(
		            	'redirectUrl' => 'home/update-product',
            			'productId' => $productId,
		            	'error' => $this->upload->display_errors()
	            	);
        		$this->load->view('index',$viewData);
        	}
        }

	}

	public function changePassword() {
		$oldPassword = $this->input->post('change-password-old');
		$newPassword = $this->input->post('change-password-new');
		$comfirmPassword = $this->input->post('change-password-confirm');

		$this->form_validation->set_rules('change-password-old', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('change-password-new', 'New Password', 'trim|required|min_length[8]|xss_clean');
		$this->form_validation->set_rules('change-password-confirm', 'Confirm Password', 'trim|required|min_length[8]|xss_clean|matches[change-password-new]');

		if($this->form_validation->run() == FALSE) {
			$viewData = array('redirectUrl' => 'home/profile' );
			$this->load->view('index',$viewData);
		} else {}
	}

	public function contactToUser() {
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		// TODO send mail get email from id (to) from $email
	}

	public function contactUs() {
		$name = $this->input->post('contact-us-name');
        $email = $this->input->post('contact-us-email');
        $mobile = $this->input->post('contact-us-mobile');
        $subject = $this->input->post('contact-us-subject');
        $message = $this->input->post('contact-us-message');

        $this->form_validation->set_rules('contact-us-name', 'Name', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('contact-us-email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('contact-us-mobile', 'Mobile No.', 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');
        $this->form_validation->set_rules('contact-us-subject', 'Subject', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('contact-us-message', 'Message', 'trim|required|min_length[12]|max_length[180]');

        if($this->form_validation->run() == FALSE) {
        	$viewData = array('redirectUrl' => 'preLogin/contact-us','status' => '');
			$this->load->view('index',$viewData);
        } else {
        	$data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'subject' => $subject,
                'message' => $message
            );
            $this->HomeModel->contactUs($data);
        	$viewData = array('redirectUrl' => 'preLogin/contact-us','status' => 'Congo');
			$this->load->view('index',$viewData);
        }
	}

	public function sendFeedback() {
		$name = $this->input->post('feedback-name');
        $email = $this->input->post('feedback-email');
        $mobile = $this->input->post('feedback-mobile');
        $subject = $this->input->post('feedback-subject');
        $message = $this->input->post('feedback-message');

        $this->form_validation->set_rules('feedback-subject', 'Subject', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('feedback-message', 'Message', 'trim|required|min_length[12]|max_length[180]');

        if($this->form_validation->run() == FALSE) {
        	$viewData = array('redirectUrl' => 'home/feedback','status' => '');
			$this->load->view('index',$viewData);
        } else {
        	$data = array(
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'subject' => $subject,
                'message' => $message
            );
        	$this->HomeModel->sendfeedback($data);
        	$viewData = array('redirectUrl' => 'home/feedback','status' => 'Congo');
			$this->load->view('index',$viewData);
        }
	}

}