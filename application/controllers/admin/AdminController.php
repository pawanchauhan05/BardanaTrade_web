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
        redirect('admin');
    }

    public function removeProductFromLatest() {
        $id = $this->input->post('id');
        $currentUrl = $this->input->post('currentUrl');
        $this->AdminModel->removeProductFromLatest($id, $currentUrl);
    }

    public function addProductToLatest() {
        $id = $this->input->post('id');
        $currentUrl = $this->input->post('currentUrl');
        $this->AdminModel->addProductToLatest($id, $currentUrl);
    }

    public function approveProduct() {
        $id = $this->input->post('id');
        $currentUrl = $this->input->post('currentUrl');
        $this->AdminModel->approveProduct($id, $currentUrl);
    }

    public function deleteProduct() {
        $id = $this->input->post('id');
        $currentUrl = $this->input->post('currentUrl');
        $productPic = $this->input->post('productPic');
        $this->AdminModel->deleteProduct($id, $currentUrl, $productPic);
    }

    public function addSlider() {
        $sliderImage = $this->input->post('slider-image');
        $sliderName = $this->input->post('slider-name');
        $fileName = time().$_FILES["slider-image"]['name'];
        $config = array(
                'upload_path' => "./images/slider/",
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE,
                'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                'max_height' => "768",
                'max_width' => "1024",
                'file_name' => $fileName
                );
        $this->upload->initialize($config);
        if($this->upload->do_upload('slider-image')) {
            $resize_config['image_library'] = 'gd2';
            $resize_config['source_image'] = dirname(BASEPATH)."/images/slider/".$fileName;
            $resize_config['width']         = 860;
            $resize_config['height']       = 420;
            $this->image_lib->clear();
            $this->image_lib->initialize($resize_config);
            if (!$this->image_lib->resize()) {
                $this->session->set_flashdata('message', $this->image_lib->display_errors());
            } else {
                $this->session->set_flashdata('message', "New slider image added successfuly.");
            }
        } else {
            $this->session->set_flashdata('message', $this->upload->display_errors());
        }
        $data = array("name" => $sliderName, "sliderPic" => $fileName, "sequence" => '0');
        $this->db->set($data);
        $this->db->insert('Slider', $data);
        redirect("admin/slider", 'refresh');
    }

    public function updateSliderSequence() {
        $sequence = $this->input->post('value');
        $id = $this->input->post('pk');
        $this->AdminModel->updateSliderSequence($sequence, $id);
    }
}
