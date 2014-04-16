<?php
// echo
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {
    /*
     * construct the class
     */

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
    }

    /*
     * login
     */
    
            
    function index() {
        //$check = $this->session->userdata('logged_in');
        if (isset($this->session->userdata['logged_in']['userID'])) {
            $session_data = $this->session->userdata('logged_in');
            if ($session_data['role'] == 1) {
                // redirect to admin page
                redirect('/admin', 'refresh');
            } else {
                // redirect to user page              
                redirect('/home/index/' . $session_data['userID'], 'refresh');
            }
        } else {
            $cookie_name = 'remember';
            if (isset($_COOKIE[$cookie_name])) {
                parse_str($_COOKIE[$cookie_name]);
                echo $userID;
                echo $role;
                $user_info = array(
                    'userID' => $userID,
                    'role' => $role
                );
                $this->session->set_userdata('logged_in', $user_info);
                echo 'have cookie';
                //redirect('/login/index/', 'refresh');
            } else {
                $this->load->helper(array('form'));
                $this->load->helper('third_library');
                $data['error'] = '';
                $data['module'] = 'login';
                $data['view_file'] = 'login_view';
                echo Modules::run('login/layout/render', $data);
                //echo 'no cookie';
            }
        }
    }

//    function mylogin() {
//        if ($this->session->userdata('logged_in')) {
//            $session_data = $this->session->userdata('logged_in');
//            if($session_data['role'] == 1){
//                // redirect to admin page
//                
//            } else {
//                // redirect to user page
//                $userID = $session_data['userID'];
//                redirect('/home/index/' . $userID, 'refresh');
//            }            
//        } else {
//            //If no session, redirect to login page            
//            redirect('login', 'refresh');
//        }
//    }

    function logout() {
	
        $this->session->sess_destroy();
        $cookiename = "remember";
        setcookie($cookiename, 'userID='."".'role='."", time() - 3600);
        //delete_cookie();
        
        redirect('/login/index');
    }
    
    function register(){
        $this->load->helper(array('form'));
        $data['error'] = '';
        $data['module'] = 'login';
        $data['view_file'] = 'register_view';
        echo Modules::run('login/layout/render', $data);
//        $this->load->helper('third_library');
//        $this->load->view('login/register_view');
    }
    
    function resetpassword(){
        $this->load->helper(array('form'));
        $data['message'] = '';
        $data['module'] = 'login';
        $data['view_file'] = 'resetpassword_view';
        echo Modules::run('login/layout/render', $data);
    }
}

?>
