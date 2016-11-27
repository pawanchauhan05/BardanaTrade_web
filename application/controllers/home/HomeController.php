<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function logoutUser() {
		echo $token = $this->facebook->get_access_token();
		if($token != '') {
			curl_exec($this->facebook->logout_url());
		}
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
		$email = $this->input->post('pk');
		$this->HomeModel->updateName($fullName, $email);
	}

	public function updateUserProfileMobile() {
		$mobile = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateMobile($mobile, $email);
	}

	public function updateUserProfileOrganisation() {
		$organisation = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateOrganisation($organisation, $email);
	}

	public function updateUserProfileDesignation() {
		$designation = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateDesignation($designation, $email);
	}


	public function updateUserProfileAddress() {
		$location = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateLocation($location, $email);
	}

	public function updateUserProfileCity() {
		$city = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateCity($city, $email);
	}


	public function updateUserProfileState() {
		$state = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateState($state, $email);
	}

	public function updateUserProfileCountry() {
		$country = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updateCountry($country, $email);
	}

	public function updateUserProfilePincode() {
		$pincode = $this->input->post('value');
		$email = $this->input->post('pk');
		$this->HomeModel->updatePincode($pincode, $email);
	}

	public function filterProductsBySubCategory() {
		$category = $this->input->post('category');
		$this->HomeModel->showProductsBySubCategory($category);
	}

	public function postProduct() {
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
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
				'max_height' => "768",
				'max_width' => "1024",
				'file_name' => $fileName
				);
        	//$this->load->library('upload', $config);
        	$this->upload->initialize($config);
        	if($this->upload->do_upload('product-form-image')) {

        		$whichCategory = array(
        							'New Jute Bag' => 'Bags',
        							'Old Jute Bag' => 'Bags',
        							'New Plastic Bag' => 'Bags',
        							'Old Plastic Bag' => 'Bags',
        							'Jute Twine' => 'TwineAndYarn',
        							'Thread/Yarn' => 'TwineAndYarn',
        							'Jute Roll' => 'TwineAndYarn',
        							'Plastic Roll' => 'TwineAndYarn',
        							'Hessian Clothe' => 'Hessian Clothe',
        							'Sewing/Stitching Machine' => 'Machines'
        							 );
        		$productCategory = element($name, $whichCategory, 'Others');
        		$sessionData = $this->HomeModel->readSessionData();
        		$email = $sessionData['sessionData']['email'];
        		// success
        		$data = array(
        			'productName' => $name,
        			'price' => $price,
        			'brand' => $brand,
        			'productDescription' => $description,
        			'forWhich' => $forWhich,
        			'productPic' => $fileName,
        			'productCategory' => $productCategory,
        			'isVisible' => 0,
        			'isLatest' => 0,
        			'postedOn' => time(),
        			'email' => $email
        		 );
        		
        		$viewData = array(
		            	'redirectUrl' => 'home/product-form',
		            	'forWhich' => $forWhich,
		            	'status' => '<p class="product-form-status">Product has been added successfully.</p>',
		            	'error'	=> ''
	            	);
        		$this->load->view('index',$viewData);
        		$this->resizeAndAddWatermark(dirname(BASEPATH)."/images/".$fileName);
        		$this->HomeModel->postProduct($data);
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
		$email = $this->input->post('change-password-email');
		$oldPassword = $this->input->post('change-password-old');
		$newPassword = $this->input->post('change-password-new');
		$comfirmPassword = $this->input->post('change-password-confirm');

		$this->form_validation->set_rules('change-password-old', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('change-password-new', 'New Password', 'trim|required|min_length[8]|xss_clean');
		$this->form_validation->set_rules('change-password-confirm', 'Confirm Password', 'trim|required|min_length[8]|xss_clean|matches[change-password-new]');

		if($this->form_validation->run() == FALSE) {
			$viewData = array('redirectUrl' => 'home/profile', 'status' => '' );
			$this->load->view('index',$viewData);
		} else {
			$data = array(
					'email' => $email,
					'oldPassword' => md5($oldPassword),
					'newPassword' => md5($newPassword)
				);
			$this->HomeModel->changePassword($data);
		}
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
        	$viewData = array('redirectUrl' => 'preLogin/contact-us',
        		'status' => '<p class="contact-us-status">Product has been added successfully.</p>');
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
        	$viewData = array('redirectUrl' => 'home/feedback',
        		'status' => '<p class="feedback-status">Product has been added successfully.</p>');
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

	public function loadMoreProducts() {
		$selectedProducts = $this->input->post('selectedProducts');
		$count = $this->input->post('group_no');
		$category = $this->input->post('category');
		$start = $count*3;
		if(isset($_SESSION['forWhich'])) {
			$forWhich = $_SESSION['forWhich'];
		} else {
			$forWhich = "Sell";	
		}
		if(isset($category)) {
			if($category != "") {
				$condition = array('isVisible' => 1, 'forWhich' => $forWhich, 'productCategory' => $category);
			} else { $condition = array('isVisible' => 1, 'forWhich' => $forWhich); }
		} 
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where_in("productName",$selectedProducts);
        $this->db->where($condition);
        $this->db->limit(3, $start);
        $query = $this->db->get();
        $data = $query->result();
		foreach ($data as $row) {
		echo "<div class='col-sm-4'>";
        echo 	"<div class='panel panel-default'>";
		echo 	    "<div class='panel-body'>";
		echo 			"<a href=". base_url() ."index.php/product-details/". $this->HomeModel->encode($row->id) .">";
		echo 	    	"<img data-src=' ". IMAGE_PATH . $row->productPic ."' class='b-lazy img-responsive center-block' src='" . IMAGE_PATH ."loading.gif' />";
		echo 	    	"<h3 class='text-center'> " . $row->productName . " </h3>";
		echo 	    	"<p>".word_limiter($row->productDescription, 5)."</p>";
		echo	    	"<div class=''>";
		echo	    		"<p class='pull-left'>". $row->price ." INR</p>";
		echo 	    		"<p class='pull-right'>Posted  ". date("d F", $row->postedOn) ."</p>";
		echo 	    	"</div>";
		echo 	    	"<div class='text-center'>";
		echo	    		"<a href='#' class='btn btn-primary' onClick='showSweetAlert(id)'>Contact</a>";
		echo	    	"</div>";
		echo	    "</div>";	
		echo	"</div>";
        echo "</div>";
    	}
    }

    public function loadProducts() {
    	if ($this->input->server('REQUEST_METHOD') == 'GET')
    		exit();
    	$selectedProducts = $this->input->post('selectedProducts');
    	$category = $this->input->post('category');
		if(isset($_SESSION['forWhich'])) {
			$forWhich = $_SESSION['forWhich'];
		} else {
			$forWhich = "Sell";	
		}
		if(isset($category)) {
			if($category != "") {
				$condition = array('isVisible' => 1, 'forWhich' => $forWhich, 'productCategory' => $category);
			} else { $condition = array('isVisible' => 1, 'forWhich' => $forWhich); }
		} 
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where_in("productName",$selectedProducts);
        $this->db->where($condition);
        $this->db->limit(3);
        $query = $this->db->get();
        $data = $query->result();
        $count = $query->num_rows();
        if($count != 0) {
	        foreach ($data as $row) {
			echo "<div class='col-sm-4'>";
	        echo 	"<div class='panel panel-default'>";
			echo 	    "<div class='panel-body'>";
			echo 			"<a href=". base_url() ."index.php/product-details/". $this->HomeModel->encode($row->id) .">";
			//echo 	    	"<img src=' ". base_url() ."images/". $row->productPic ."' class='img-responsive center-block' />";
			echo 	    	"<img data-src=' ". base_url() ."images/". $row->productPic ."' class='b-lazy img-responsive center-block' src='" . IMAGE_PATH ."loading.gif' />";
			echo  			"</a>";
			echo 	    	"<h3 class='text-center'> " . $row->productName . " </h3>";
			echo 	    	"<p>".word_limiter($row->productDescription, 5)."</p>";
			echo	    	"<div class=''>";
			echo	    		"<p class='pull-left'>". $row->price ." INR</p>";
			echo 	    		"<p class='pull-right'>Posted  ". date("d F", $row->postedOn) ."</p>";
			echo 	    	"</div>";
			echo 	    	"<div class='text-center'>";
			echo	    		"<a href='#' class='btn btn-primary' onClick='showSweetAlert(id)'>Contact</a>";
			echo	    	"</div>";
			echo	    "</div>";	
			echo	"</div>";
	        echo "</div>";
	    	}
	    } else {
	    	echo "<div class='col-sm-12'>";
	    	echo "<img data-src='".IMAGE_PATH."no-magento-product-found.jpg' src='" . IMAGE_PATH ."loading.gif' class='b-lazy img-responsive center-block' />";
	    	echo "</div>";
	    }
    }

    public function resizeAndAddWatermark($imagePath) {
    	$resize_config['image_library'] = 'gd2';
		$resize_config['source_image'] = $imagePath;
		$resize_config['maintain_ratio'] = TRUE;
		$resize_config['width']         = 499;
		$resize_config['height']       = 498;
		$this->image_lib->clear();
        $this->image_lib->initialize($resize_config);
		if (!$this->image_lib->resize()) {
		    $this->image_lib->display_errors();
		    exit();
		}

		$water_config['source_image'] = $imagePath;
		$water_config['wm_text'] = WATERMARK;
		$water_config['wm_type'] = 'text';
		$water_config['wm_font_path'] = dirname(BASEPATH).'/system/fonts/texb.ttf';
		$water_config['wm_font_size'] = '16';
		$water_config['wm_font_color'] = 'ffffff';
		$water_config['wm_vrt_alignment'] = 'bottom';
		$water_config['wm_hor_alignment'] = 'center';
		$this->image_lib->initialize($water_config);
		$this->image_lib->watermark();
    }

    public function registerUserLocation() {
    	$latitude = $this->input->post('latitude');
    	$longitude = $this->input->post('longitude');
    	$ip = $this->input->post('ip');
    	$userAgent = $this->input->post('userAgent');
    	if($latitude == null | $longitude == null)
    		exit();
    	$this->HomeModel->updateUserLocation($ip, $latitude, $longitude, $userAgent);
    }

}