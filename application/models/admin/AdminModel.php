<?php

/**
 * AdminModel to handle admin action
 */
class AdminModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * to load view while user click on link
     */
    public function loadView($uri) {
        if($uri == '') {
            $content = 'admin/dashboard';  
        } else {
            $content = $uri; 
        }
        
        $data = array();
        if ($this->uri->segment(2) != null && $uri == '') {
            switch ($this->uri->segment(2)) {

                case 'users':
                    $content = 'admin/users/users';
                    break;

                case 'slider':
                    $content = 'admin/slider/slider';
                    break;

                case 'sell-products':
                    $content = 'admin/products/products';
                    break;

                case 'buy-products':
                    $content = 'admin/products/products';
                    break;

                case 'product-details':
                    $content = 'admin/products/product-details';
                    break;

                case 'sell-products-request':
                    $content = 'admin/products/product-request';
                    break;

                case 'buy-products-request':
                    $content = 'admin/products/product-request';
                    break;

                case 'product-request-details':
                    $content = 'admin/products/product-request-details';
                    break;

                case 'latest-bags':
                    $content = 'admin/products/latest-products';
                    break;

                case 'latest-product-details':
                    $content = 'admin/products/latest-product-details';
                    break;

                case 'latest-twines':
                    $content = 'admin/products/latest-products';
                    break;

                case 'latest-machines':
                    $content = 'admin/products/latest-products';
                    break;

                case 'user-info':
                    $content = 'admin/users/user-info';
                    break;
                
                case 'sendNotification':
                    $content = 'admin/sendNotification';
                    $email = $this->AdminModel->decode($this->uri->segment(3));
                    $row = $this->Token->getToken($email);
                    $data = array('key' => $row->token);
                    break;
                
                default:
                    $content = 'admin/dashboard';
                    break;
            }
        } else {  }
        $this->load->view($content, $data);
    }

    // TODO create common function for userDetails, customNumberDetails, tokenDetails
    public function userDetails() {
        $query = $this->db->query("SELECT * FROM Users");
        return $query->result();
    }

    public function customNumberDetails() {
        $query = $this->db->query("SELECT * FROM CustomNumbers");
        return $query->result();
    }

    public function tokenDetails() {
        $query = $this->db->query("SELECT * FROM Tokens");
        return $query->result();
    }

    public function sliderDetails() {
        $query = $this->db->query("SELECT * FROM Slider");
        return $query->result();
    }

    public function updateSliderSequence($sequence, $id) {
        $data = array(
                'sequence' => $sequence
            );
        $this->db->set($data);
        $this->db->where("id", $id);
        if($this->db->update("Slider", $data)) {
        } else {

        }

    }
    
    /**
     * to start session of admin
     * @param type $name    admin name
     * @param type $email   admin email address
     */
    public function startSession($name, $email) {
        $sessionArray = array(
            'name' => $name,
            'email' => $email,
            'loggedIn' => TRUE
        );
        $this->session->set_userdata('sessionData', $sessionArray);
    }

    /**
     * to stop session of admin
     */
    public function stopSession() {
        $this->session->sess_destroy();
    }

    /**
     * to read session data
     * @return type session data
     */
    public function readSessionData() {
        return $sessionData = $this->session->all_userdata();
    }
    
    /**
     * to total count number of records in table
     * @param type $tableName   table name
     * @return type total no. of records
     */
    public function totalCount($tableName) {
        $this->db->from($tableName);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function totalTypeProducts($forWhich) {
        $condition = array("isVisible" => "1", "forWhich" => $forWhich);
        $this->db->from("Products");
        $this->db->where($condition);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function totalTypeRequestProducts($forWhich) {
        $condition = array("isVisible" => "0", "forWhich" => $forWhich);
        $this->db->from("Products");
        $this->db->where($condition);
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    /**
     * to delete user
     * @param type $email   user email address
     */
    public function deleteUser($email) {
        $data = array(
            'email' => $email
        );
        $count = $this->isUserExist($email);
        if ($count > 0) {
            $this->db->where($data);
            $this->db->delete("Users");
        }
        $count = $this->isProductAvailable($email);
        if ($count > 0) {
            $this->db->where($data);
            $this->db->delete("Products");
        }
    }

    /**
     * to check user email exist or not
     * @param type $userEmail user email
     * @return type   number of rows in database
     */
    public function isUserExist($userEmail) {
        $query = $this->db->query("SELECT * FROM Users WHERE email = '$userEmail' ");
        return $query->num_rows();
    }

    public function isProductAvailable($userEmail) {
        $query = $this->db->query("SELECT * FROM Products WHERE email = '$userEmail' ");
        return $query->num_rows();
    }

    /**
     * to admin login
     * @param type $userEmail   admin email address
     * @param type $userPassword    admin password
     * @return type status based on result
     */
    public function adminLogin($userEmail, $userPassword) {
        $condition = "email =" . "'" . $userEmail . "' AND " . "password =" . "'" . $userPassword . "'";
        $this->db->select('*');
        $this->db->from('Admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $query->row();
        } else {
            return " { " . '"status"' . " : " . '"invalid credentials"' . " } ";
        }
    }
    
    
    public function customView($data) {
        $this->load->view('admin/index', $data);
    }


    public function showProducts($forWhich, $configUrl) {
        $condition = array('forWhich' => $forWhich );
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        //$this->db->where_in('productName',$filter);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '8', $this->uri->segment(2));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $count->num_rows()
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 8;
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

    public function showLatestProductsToAdd($category, $configUrl) {
        $condition = array('productCategory' => $category, 'isVisible' => '1', 'isLatest' => '0' );
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        //$this->db->where_in('productName',$filter);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '8', $this->uri->segment(2));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $count->num_rows()
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 8;
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

    public function showInActiveProducts($forWhich, $configUrl) {
        $condition = array('forWhich' => $forWhich , 'isVisible' => '0');
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        //$this->db->where_in('productName',$filter);
        $count = $this->db->get();
        $query = $this->db->get_where('Products', $condition, '8', $this->uri->segment(2));
        if (isset($query)) {
            $data = array(
                    'rows' => $query->result(),
                    'count' => $count->num_rows()
                );
            $config['base_url'] = $configUrl;
            $config['total_rows'] = $count->num_rows();
            $config['per_page'] = 8;
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

    public function showLatestProducts($category) {
        $condition = array('isLatest' => 1, 'productCategory' => $category, 'isVisible' => '1');  
        $this->db->select('*');
        $this->db->from('Products');
        $this->db->where($condition);
        $this->db->limit(5);
        $query = $this->db->get();
        $count = $query->num_rows();
        if($count >= 3) {
            return $query->result();
        } else {
            $condition = array('productCategory' => $category, 'isVisible' => '1');  
            $this->db->select('*');
            $this->db->from('Products');
            $this->db->where($condition);
            $this->db->order_by("id", "desc");
            $this->db->limit(5);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function getSlider() {
        $this->db->select('*');
        $this->db->from('Slider');
        $this->db->order_by("sequence", "desc");
        $query = $this->db->get();
        return $data =  $query->result();
    }

    public function removeProductFromLatest($id, $currentUrl) {
        $data = array(
                'isLatest' => '0'
            );
        $this->db->set($data);
        $this->db->where("id", $id);
        if($this->db->update("Products", $data)) {
            $this->session->set_flashdata('message', 'Product is successfuly removed from latest section.');
            redirect("admin/".$currentUrl, 'refresh');
        } else {

        }
    }

    public function addProductToLatest($id, $currentUrl) {
        $data = array(
                'isLatest' => '1'
            );
        $this->db->set($data);
        $this->db->where("id", $id);
        if($this->db->update("Products", $data)) {
            $this->session->set_flashdata('message', 'Product is successfuly listed in latest section.');
            redirect("admin/".$currentUrl, 'refresh');
        } else {

        }
    }

    public function approveProduct($id, $currentUrl) {
        $data = array(
                'isVisible' => '1'
            );
        $this->db->set($data);
        $this->db->where("id", $id);
        if($this->db->update("Products", $data)) {
            $this->session->set_flashdata('message', 'Product is live on website.');
            redirect("admin/".$currentUrl, 'refresh');
        } else {

        }
    }

    public function deleteProduct($id, $currentUrl, $productPic) {
        $condition = array('id' => $id);
        $this->db->where($condition);
        $this->db->delete("Products");
        $this->session->set_flashdata('message', 'Product has been successfuly deleted.');
        unlink(dirname(BASEPATH)."/images/".$productPic);
        redirect("admin/".$currentUrl, 'refresh');
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
