<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->load->model('Login_model');
    }
	public function index()
	{
		 $this->load->view('user/register');
	}

    	public function user_login()
	{
		$this->load->view('user/login');
	}

    public function register(){
         if(isset($_POST['register']) && !empty($this->security->get_csrf_hash())){
             /* checking the validation of the form input */
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|xss_clean|min_length[3]|max_length[30]',array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|xss_clean|min_length[3]|max_length[30]',array('required' => 'You must provide a %s.'));
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha|xss_clean|min_length[3]|max_length[30]|is_unique[tbl_users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean',
                        array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_message('is_unique', 'Username already exists. Kindly check');
                  if($this->form_validation->run()==FALSE){
                  $this->index();
                  }
                  /* End of validation */

                  /* Start of form processing */
                  else{
                    $newpass= $this->getHashedPassword(html_escape($this->input->post('password')));
                    /* collecting inputs from the form and putting them in an array */
                    $params=array(
                    'fname'=>$this->input->post('fname'),
                    'lname'=>html_escape($this->input->post('lname')),
                    'username'=>html_escape($this->input->post('username')),
                    'password'=>$newpass
                    );
                    /* forwarding inputs into the model for saving into the database */
                   $result= $this->Login_model->register($params);
                    if($result){
                      $this->session->set_flashdata('msg1','<div class="alert alert-success"> <strong>Success</strong> Your data successfully saved. </div>');
                     redirect('Welcome/index');
                    }
                    else{
                       $this->session->set_flashdata('msg1','<div class="alert alert-danger">Sorry!! An error occured while processing. </div>');
                       redirect('Welcome/index');
                    }
                  }
          }
         else{
              echo "Invalid authentication";
         }

    }

    /* PASSWORD ENCRIPTOR FUNCTIONS */
    function getHashedPassword($pass){
     $newhashed= password_hash($pass,PASSWORD_DEFAULT);
      return $newhashed;
      }
    function verifyPassword($inputPassword,$hashedPassword){
    if(password_verify($inputPassword,$hashedPassword)){
              return true;
            }
            else{
                return false;
            }
    }



 /* FROM MODEL DATABASE */
 public function login(){
     if(isset($_POST['btn_login']) && !empty($this->security->get_csrf_hash())){
        $this->form_validation->set_rules('txt_username', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('txt_password', 'Password', 'required|xss_clean',
                                            array('required' => 'You must provide a %s.'));
    if($this->form_validation->run()==FALSE) {
    $this->user_login();
    }
    else{
           $new=$this->Login_model->login($this->input->post('txt_username'));
        if($this->verifyPassword($this->input->post('txt_password'),$new)){
           $userdata=array(
             'email'=>$this->input->post('txt_username'),
             'currently_logged'=>1
           );
           $this->session->set_userdata($userdata);
           redirect('Welcome/profile');
           }
           else{
           $this->session->set_flashdata('msg','<div class="alert alert-danger">Sorry!! Username or Password is wrong. </div>');
           redirect('Welcome/user_login');
           }
        }
     }
     else{
         echo "Invalid authentication";
     }

    }


    public function profile(){
        if($this->session->userdata('currently_logged')) {
           $data['user']=$this->Login_model->getUser($this->session->userdata('email'));
           $this->load->view('profile',$data);
        }
        else{
         redirect('Welcome/user_login');
        }

    }

    //logout function
    function logout(){
         $this->session->unset_userdata('currently_logged');
        $this->session->unset_userdata('email');
         $this->session->sess_destroy();
         redirect('Welcome/user_login');
    }

 }
