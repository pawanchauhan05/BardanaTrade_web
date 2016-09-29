<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function logoutUser() {
		$this->HomeModel->stopSession();
		redirect('index');
	}
}