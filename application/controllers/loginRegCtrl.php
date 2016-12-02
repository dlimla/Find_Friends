<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginRegCtrl extends CI_Controller 
{



//----------- main display method ----------------------

	public function index()
	{
		$this->load->view('loginRegMain');
	}



//----------- login validation method ---------------------

	public function loginValidation()
	{

		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if($this->form_validation->run() === FALSE)
		{

			$this->session->set_flashdata("logInError", "Password and/or Email doesn't match");

	
			redirect('/');
		}
		else
		{
			$post = $this->input->post();

			$this->load->model('loginRegModel');

			$user = $this->loginRegModel->LoginUser($post);

			if($user) 
			{
				$this->session->set_userdata($user);
			
				redirect('/FriendsCtrl');	
			}
			else
			{	
				$this->session->set_flashdata("logInError", "Password and/or Email doesn't match or exist go regester or something");
				redirect('/');
			}
		}
	}

//------------ register validation method ------------------

	public function regValidation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Name', 'Name', 'required');
		$this->form_validation->set_rules('emailReg', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordConfirm', 'Confirm Password', "matches[password]|required");
		if($this->form_validation->run() === FALSE)
		{
			
			$this->session->set_flashdata("errorReg", "You have either missing or invalid fields");

			redirect('/');
		}
		else
		{

			$post = $this->input->post();

			$this->load->model('loginRegModel');

			$displayData = $this->loginRegModel->addNewUser($post);

			$this->load->view('registerWelcomePage');
		}
	}
//------------ sucessfully registered --------------


	public function regToLogin()
	{
		redirect('/');
	}

//-------------------- log off----------------------------

	
	public function logOffUser()
	{
		$this->session->sess_destroy();

		redirect('/');
	}


}
