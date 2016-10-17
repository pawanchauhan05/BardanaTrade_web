<?php

class PreLoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * to load view while user click on link
     */
    public function loadView($redirectUrl) {
        $data = array(
                'category' => ''
            );
        $sessionData = $this->HomeModel->readSessionData();
        if($redirectUrl != null && $redirectUrl != '') {
            $content = $redirectUrl;
        } else {
            $content = $this->uri->segment(1);
        }

        if ($this->uri->segment(1) != null && !$this->uri->segment(1) == '' && $redirectUrl == '') {
            switch ($this->uri->segment(1)) {
                case 'about':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/about-us'; }
                    break;

                case 'benefits':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/benefits'; }
                    break;

                case 'contact':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/contact-us'; }
                    break;

                case 'faq':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/faq'; }
                    break;

                case 'login':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'preLogin/main';
                    } else { $content = "preLogin/login"; }
                	break;
                
                case 'vision-mission':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/vision-mission'; }
                    break;

                case 'quality':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/quality'; }
                    break;

                case 'profile':
                    if(isset($sessionData['sessionData']) && $sessionData['sessionData']['isProfileComplete'] == FALSE) {
                	   $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/profile';
                    } else { redirect('login'); }
                	break;

                case 'check-profile':
                    $sessionData = $this->HomeModel->readSessionData();
                    if(isset($sessionData['sessionData']) && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { redirect('login'); }
                    break;

                case 'products':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else {
                        $data = array('category' => $this->uri->segment(2));
                        $content = 'home/products';
                    }
                	break;

                case 'product-sell-form':
                    $data = array('forWhich' => 'Sell', 'error' => '');
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/product-form';
                    } else {
                        $this->session->set_userdata("REDIRECT_URL","product-sell-form"); 
                        redirect('login'); 
                    }
                    break;

                case 'product-buy-form':
                    $data = array('forWhich' => 'Buy', 'error' => '');
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/product-form';
                    } else { 
                        $this->session->set_userdata("REDIRECT_URL","product-buy-form");
                        redirect('login'); 
                    }
                    break;

                case 'product-details':
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/product-details';
                    } else { redirect('login'); }
                    break;

                case 'update-product':
                    $data = array('productId' => '', 'error' => '');
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/update-product';
                    } else { redirect('login'); }
                    break;

                case 'feedback':
                    $data = array('error' => '');
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/feedback';
                    } else {
                        $this->session->set_userdata("REDIRECT_URL","feedback"); 
                        redirect('login'); 
                    }
                    break;

                default:
                    if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
                       $content = 'home/check-profile';
                    } else { $content = 'preLogin/main'; }
                    break;
            }
        } else {
            if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == FALSE ) {
               $content = 'home/check-profile';
            } else { 
                $content = ($redirectUrl == '') ? 'preLogin/main' : $redirectUrl; 
            }
        }
        $this->load->view($content, $data);
    }



    public function isUserExist($userEmail) {
        $query = $this->db->query("SELECT * FROM Users WHERE email = '$userEmail' ");
        return $query->num_rows();
    }

    public function loginUser($userEmail, $userPassword) {
        $condition = "email =" . "'" . $userEmail . "' AND " . "password =" . "'" . $userPassword . "'";
        $this->db->select('*');
        $this->db->from('Users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        $row = $query->row();
        if (isset($row)) {
            return $data = array(
                'count' => $query->num_rows(),
                'data' => $query->row()
             );
        }
    }

}
