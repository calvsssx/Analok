<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->has_userdata('auth')){
            $this->session->set_tempdata('msg', 'You are Already Logged in', 1);
                redirect(base_url('/index.php/HomeController/'));
        }
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->database();
    }

    public function index(){
        $this->load->view('register.php');
    }

    public function register(){
        $this->form_validation->set_rules('fname', 'First Name','trim|required|alpha');
        $this->form_validation->set_rules('lname', 'Last Name','trim|required|alpha');
        $this->form_validation->set_rules('uname', 'Username','trim|required|alpha_numeric|min_length[6]|is_unique[users.uname]');
        $this->form_validation->set_rules('pass', 'Password','trim|required|min_length[8]');
        $this->form_validation->set_rules('passcon', 'Password','trim|required|min_length[8]|matches[pass]');
        $this->form_validation->set_rules('address', 'Address','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('cnum', 'Number','trim|required|numeric');


        if($this->form_validation->run() == FALSE){
            $this->session->set_tempdata('msg','Registration Failed', 1);
            $this->index();
        }else{
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);
            $email = $this->input->post('email');
            $data = array(
                'fname' =>$this->input->post('fname'),
                'lname' =>$this->input->post('lname'),
                'uname' =>$this->input->post('uname'),
                'pass' =>$this->input->post('pass'),
                'address' =>$this->input->post('address'),
                'email' =>$email,
                'cnum' =>$this->input->post('cnum'),
                'code' => $code
            );

            $registerUser = new UserModel;
            $check = $registerUser->registerUser($data);
            if($check){
                $this->load->library('email');

                $to = $email;
                $laman = "
                <html>
                <head>
                    <title>Verification Code</title>
                </head>
                <body>
                    <h2>Thank you for Registering.</h2>
                    <p>Your Account:</p>
                    <p>Email: ".$email."</p>
                    <p>Please click the link below to activate your account.</p>
                    <h4><a href='".base_url()."index.php/RegisterController/verification/".$check."/".$code."'>Activate My Account</a></h4>
                </body>
                </html>
                ";

                $this->email->from('iicsgroupemail@gmail.com', 'IICS: E-Balot');
                $this->email->to($to);
                 $this->email->subject('E-Balot Verification');
                 $this->email->message($laman);

                if($this->email->send()){
                    $this->session->set_tempdata('msg', 'Registration Successful. Verify Email Address', 1);
                    redirect(base_url('/index.php/HomeController'));
                }else{
                    $this->session->set_tempdata('msg', 'Sending Failed. Something went Wrong', 1);
                    redirect(base_url('/index.php/HomeController'));
        }
            }else{
                $this->session->set_tempdata('msg','Registration Failed', 1);
                redirect(base_url('/index.php/RegistrationController/register'));
        }
    }
 

    }
    public function verification(){
        $id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
        
        $user = $this->UserModel->getUser($id);

        if($user['code'] == $code){

			$data['active'] = '1';
			$query = $this->UserModel->activate($data, $id);
 
			if($query){
                $this->session->set_tempdata('msg', 'Accout Activated Successfully', 1);
			}
			else{
                $this->session->set_tempdata('msg', 'Something went wrong in activating account', 1);
			}
		}
		else{
            $this->session->set_tempdata('msg', 'Cannot activate account. Code didnt match', 1);		
        }
        redirect(base_url('/index.php/HomeController'));
    }
}
?>