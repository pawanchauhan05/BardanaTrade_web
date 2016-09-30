<?php

class PreLoginModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * to load view while user click on link
     */
    public function loadView() {
        $sessionData = $this->HomeModel->readSessionData();
        $content = $this->uri->segment(1);
        if ($this->uri->segment(1) != null && !$this->uri->segment(1) == '') {
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
                    } else if(isset($sessionData['sessionData'])  && $sessionData['sessionData']['isProfileComplete'] == TRUE ) {
                        $content = 'home/products';
                    } else { redirect('login'); }
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
            } else { $content = 'preLogin/main'; }
        }
        $this->load->view($content);
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
            return $query->row();
        } else {
            $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(" { " . '"status"' . " : " . '"invalid credentials"' . " } ")
                    ->_display();
            exit();
        }
    }

}
