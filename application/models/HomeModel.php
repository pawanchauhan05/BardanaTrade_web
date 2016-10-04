<?php

class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function startSession($name, $email, $flag) {
        $sessionArray = array(
            'name' => $name,
            'email' => $email,
            'loggedIn' => TRUE,
            'isProfileComplete' => $flag
        );
        $this->session->set_userdata('sessionData', $sessionArray);
    }

    public function stopSession() {
        $this->session->sess_destroy();
    }

    public function readSessionData() {
        return $sessionData = $this->session->all_userdata();
    }

    public function completeProfile() {
        $data = array(
            'isComplete' => 1,
            'organisation' => 'Fitterfox',
            'designation' => 'Developer',
            'country' => 'India',
            'state' => 'Rajasthan',
            'city' => 'Kota',
            'address' => 'Kota Beraj'
        );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
            $this->startSession('Pawan Singh', 'demo@gmail.com', TRUE);
            redirect('profile');
        } else {

        }
    }

    public function updateName($fullName) {
        $data = array(
                'name' => $fullName
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateMobile($mobileNumber) {
        $data = array(
                'mobile' => $mobileNumber
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateOrganisation($organisation) {
        $data = array(
                'organisation' => $organisation
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateDesignation($designation) {
        $data = array(
                'designation' => $designation
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateLocation($location) {
        $data = array(
                'address' => $location
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCity($city) {
        $data = array(
                'city' => $location
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateState($state) {
        $data = array(
                'state' => $state
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCountry($country) {
        $data = array(
                'country' => $country
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updatePincode($pincode) {
        $data = array(
                'pincode' => $pincode
            );
        $this->db->set($data);
        $this->db->where("email", 'demo@gmail.com');
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function getContactDetails($email) {
        $condition = array("email" => $email);
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $query->row();
        }
    }

    /***************************** for products ************************************/

    public function showOwnProducts($email, $configUrl) {
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        //$this->db->where_in('productName',$filter);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '5', $this->uri->segment(2));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $count->num_rows()
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 5;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
            $config['cur_tag_close'] = "</b><span></li>";
            $this->pagination->initialize($config);
            return (object)$data;
        }
    }

    public function showProducts($forWhich, $configUrl, $filter) {
        $condition = "isVisible =" . "'" . "1" . "' AND " . "forWhich =" . "'" . $forWhich . "'";
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        //$this->db->where_in('productName',$filter);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '5', $this->uri->segment(2));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $count->num_rows()
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 5;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
            $config['cur_tag_close'] = "</b><span></li>";
            $this->pagination->initialize($config);
            return (object)$data;
        }
    }

    public function showProductsByCategory($category, $forWhich, $configUrl) {
        $condition = "isVisible =" . "'" . "1" . "' AND " . "forWhich =" . "'" . $forWhich . "' AND " . "productCategory =" . "'" . $category . "'   ";
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '5', $this->uri->segment(3));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $query->num_rows() 
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 5;
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_open'] = '<li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class=\"active\"><span><b>";
            $config['cur_tag_close'] = "</b><span></li>";
            $this->pagination->initialize($config);
            return (object)$data;
        }
    }

    public function showProductsBySubCategory($subCategory) {
        if(!empty($subCategory)) {
            foreach($subCategory as $check) {
                    echo $check;
            }
        }
    }

    public function getProductCategory() {
        $this->db->select('*');
        $this->db->from('Categories');
        $query = $this->db->get();
        if (isset($query)) {
            return $query->result();
        } 
    }

    public function getProductSubCategory($category) {
        $condition = array("category" => $category);
        $this->db->select('*');
        $this->db->from('Categories');
        $this->db->where($condition);
        $query = $this->db->get();
        if (isset($query)) {
            return $query->result();
        } 
    }

    public function getProductDetails($id) {
        $condition = array("id" => $id);
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $query->row();
        }
    }


    /**************************** For Encryption only ******************************************* */

    var $skey = "SuPerEncRKey2016";

    public function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public function encode($value) {

        if (!$value) {
            return false;
        }
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }

    public function decode($value) {

        if (!$value) {
            return false;
        }
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }


}