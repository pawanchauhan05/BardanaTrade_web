<?php

class HomeModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function getUserInfo($email) {
        $condition = array('email' => $email);
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $query->row();
        }
    }

    public function getUserInfoById($id) {
        $condition = array('id' => $id);
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $query->row();
        } 
    }

    public function registerUser($data) {
        $data = array(
            'name' => $data['fullName'],
            'email' => $data['email'],
            'password' => $data['password'],
            'mobile' => $data['mobile'],
            'dob' => $data['dob'],
            'created_at' => time(),
            'updated_at' => time(),
            'isComplete' => 0
            );
        $count = $this->PreLoginModel->isUserExist($data['email']);
        if($count != 0) {
            $viewData = array('redirectUrl' => 'preLogin/login',
             'signUpStatus' => '<p class="login-status">User already exists.</p>',
             'status' => ''
             );
            $this->load->view('index',$viewData);
        } else {
            $query = $this->db->insert('Users', $data);
            if(isset($query)) {
                $this->HomeModel->startSession($data['name'],  $data['email'], FALSE);
                $viewData = array(
                    'name' => $data['name'], 
                    'email' => $data['email']
                    );
                $this->HomeModel->welcomeMail($viewData);
                redirect('check-profile');  

            } 
        }  
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

    public function completeProfile($data) {
        $data = array(
            'isComplete' => 1,
            'organisation' => $data['organisation'],
            'designation' => $data['designation'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'address' => $data['address'],
            'pincode' => $data['pincode']
        );
        $sessionData = $this->HomeModel->readSessionData();

        $this->db->set($data);
        $this->db->where("email", $sessionData['sessionData']['email'] );
        if($this->db->update("Users", $data)) {
            $this->startSession($sessionData['sessionData']['name'] , $sessionData['sessionData']['email'] , TRUE);
            redirect('profile');
        } else {

        }
    }

    public function postProduct($data) {
        $this->db->set($data);
        $this->db->insert('Products', $data);
    }

    public function getSlider() {
        $this->db->select('*');
        $this->db->from('Slider');
        $this->db->order_by("sequence", "asc");
        $this->db->limit(5);
        $query = $this->db->get();
        return $data =  $query->result();
    }

    public function updateName($fullName, $email) {
        $data = array(
                'name' => $fullName
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateMobile($mobileNumber, $email) {
        $data = array(
                'mobile' => $mobileNumber
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }

    }

    public function updateOrganisation($organisation, $email) {
        $data = array(
                'organisation' => $organisation
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateDesignation($designation, $email) {
        $data = array(
                'designation' => $designation
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateLocation($location, $email) {
        $data = array(
                'address' => $location
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCity($city, $email) {
        $data = array(
                'city' => $city
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateState($state, $email) {
        $data = array(
                'state' => $state
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updateCountry($country, $email) {
        $data = array(
                'country' => $country
            );
        $this->db->set($data);
        $this->db->where("email", $email);
        if($this->db->update("Users", $data)) {
        } else {

        }
    }

    public function updatePincode($pincode, $email) {
        $data = array(
                'pincode' => $pincode
            );
        $this->db->set($data);
        $this->db->where("email", $email);
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

    public function contactUs($data) {
        
        $contactData = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'subject' => $data['subject'],
                'message' => $data['message']
            );
        $this->HomeModel->adminInquiryMail($contactData);
        $this->HomeModel->contactUsMail($contactData);
    }

    public function sendfeedback($data) {
        $data = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'subject' => $data['subject'],
                'message' => $data['message']
            );

        $this->HomeModel->adminInquiryMail($data);
        $this->HomeModel->feedbackMail($data);
    }

    public function changePassword($data) {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['oldPassword'] . "'";
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $count = $query->num_rows();
        if($count != 0) {
            $data = array(
                'password' => $data['newPassword']
            );
            $this->db->set($data);
            $this->db->where("email", $data['email']);
            $this->db->update("Users", $data);
            $viewData = array('redirectUrl' => 'home/profile', 'status' => '<p class="change-password-status">Password has been changed successfuly</p>' );
        } else {
            $viewData = array('redirectUrl' => 'home/profile', 'status' => '<p class="change-password-status">Old Password does not match.</p>' );
            
        }
        $this->load->view('index',$viewData);
    }

    public function updateUserLocation($ip, $latitude, $longitude) {
        $data = array(
                'ipAddress' => $ip,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'updated_at' => time()
            );
        $count = $this->isIPExist($ip);
        if($count == 0) {
            $this->db->insert('Location', $data);
            echo "insert";
        } else {
            $this->db->set($data);
            $this->db->where("ipAddress", $ip);
            $this->db->update("Location", $data);
            echo "update";
        }
    }

    public function isIPExist($ip) {
        $query = $this->db->query("SELECT * FROM Location WHERE ipAddress = '$ip' ");
        return $query->num_rows();
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
        //$condition = "isVisible =" . "'" . "1" . "' AND " . "forWhich =" . "'" . $forWhich . "'";
        $condition = array('isVisible' => 1, 'forWhich' => $forWhich);
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

    public function getTotalProducts($email) {
        $condition = array("email" => $email);
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->num_rows();
    }

    /********************************** send emails *********************************************/

    public function welcomeMail($data){
        $config = Array(        
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pawanetm@gmail.com',
            'smtp_pass' => 'ourlab.tk',
            'smtp_timeout' => '4',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
    
        $this->email->from('pawanetm@gmail.com', 'Bardana Trade');
        $viewData = array(
             'name' => $data['name'],
             'email' => $data['email'],
             'login' => base_url()."index.php/login"
                 );
        $this->email->to($data['email']);  // replace it with receiver mail id
        $this->email->subject("Welcome to Bardana Trade"); // replace it with relevant subject 
    
        $body = $this->load->view('emails/welcome-to-bardana-trade.php',$viewData,TRUE);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->message($body); 
        $this->email->send();  
    }

    public function contactUsMail($data){
        $config = Array(        
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pawanetm@gmail.com',
            'smtp_pass' => 'ourlab.tk',
            'smtp_timeout' => '4',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
    
        $this->email->from('pawanetm@gmail.com', 'Bardana Trade');
        $viewData = array('name'=> 'Pawan Singh Chauhan');
        $this->email->to($data['email']);  // replace it with receiver mail id
        $this->email->subject("Thank you for contacting us"); // replace it with relevant subject 
    
        $body = $this->load->view('emails/contact-us.php',$viewData,TRUE);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->message($body); 
        $this->email->send();  
    }


    public function adminInquiryMail($data){
        $config = Array(        
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pawanetm@gmail.com',
            'smtp_pass' => 'ourlab.tk',
            'smtp_timeout' => '4',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
    
        $this->email->from($data['email'], $data['name']);
        $viewData = array(
            'name'=> $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'mobile' => $data['mobile'],
            'message' => $data['message']
            );
        $this->email->to('pawanetm@gmail.com');  // replace it with receiver mail id
        $this->email->subject($data['subject']); // replace it with relevant subject 
    
        $body = $this->load->view('emails/admin-inquiry.php',$viewData,TRUE);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->message($body); 
        $this->email->send();  
    }

    public function feedbackMail($data){
        $config = Array(        
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pawanetm@gmail.com',
            'smtp_pass' => 'ourlab.tk',
            'smtp_timeout' => '4',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
    
        $this->email->from('pawanetm@gmail.com', 'Bardana Trade');
        $viewData = array(
            'name'=> $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'mobile' => $data['mobile'],
            'message' => $data['message']
            );
        $this->email->to($data['email']);  // replace it with receiver mail id
        $this->email->subject("Thank you for valuable feedback"); // replace it with relevant subject 
    
        $body = $this->load->view('emails/feedback.php',$viewData,TRUE);
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');
        $this->email->message($body); 
        $this->email->send();  
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

    public function totolGroup() {
        if(isset($_SESSION['forWhich'])) {
            $forWhich = $_SESSION['forWhich'];
        } else {
            $forWhich = "Sell"; 
        }
        $condition = array('isVisible' => 1, 'forWhich' => $forWhich);
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $query = $this->db->get();
        return $group = ceil($query->num_rows()/3);

    }

    


}