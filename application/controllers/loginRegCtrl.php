<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class loginRegCtrl extends CI_Controller 
{



//----------- main display method -----------------------------------

//this method is for the main display
//also this will load the array of flashdata of errors if any
	public function index()
	{
		$this->load->view('loginRegMain');
	}



//----------- login validation method -------------------------------

//this method JUST brings the user to the welcome page after login
	public function loginValidation()
	{

		//the "library" here is a preset method in the Code Igniter library for form validation
		$this->load->library('form_validation');

		//these next two lines "set rules" for the form to check to see if the user can go foward, for example the email and password has to match the email and password in the database
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		//this "if" statement runs and is the "main method" for the validation
		if($this->form_validation->run() === FALSE)
		{
			//if this "if" statement is true then this line runs setting the FLASHDATA under an assosiative array with a key as "error" and the message as "Password and/or Email doesn't match"
			$this->session->set_flashdata("logInError", "Password and/or Email doesn't match");

			//then it redirects the user to the main page
			redirect('/');
		}
		else
		{
			//if no errors are present then it goes to this else statement putting the post data into this vairable "$post"
			$post = $this->input->post();

			//then this line loads in the model called "loginRegModel" btw don't put "models" in your model name its bad practice but i was too lazy to change it
			$this->load->model('loginRegModel');

			//then the model runs the method called "LoginUser" and puts the returned data into the variable "$user" as a row 
			$user = $this->loginRegModel->LoginUser($post);

			//this "if" statement is to validate if the user is in the database first, the row is recieved from the above model method "$user" which is passed here
			//if the $user comes back with a row that is filled, it means it's "true" 
			if ($user) 
			{
				//so it runs these botton lines, 
				//it sets the session to this specific user  
				$this->session->set_userdata($user);

				//and loads in the view "loginWelcomeView" and passes the row that was recived as an associate array into the model
				$this->load->view('loginWelcomeView', array("userDataDisplay"=>$user));	
			}
			//this else statement is for when the "$user" variable comes back as a null or nothing it means false so runs the "else"
			else
			{	
				//it sets a new flashdata and sends the user to the main page with the flashdata message preseent
				$this->session->set_flashdata("logInError", "Password and/or Email doesn't match or exist go regester or something");
				redirect('/');
			}
		}
	}

//------------ register validation method ------------------

	public function regValidation()
	{
		//these lines are explained on the "loginValidation" method above
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstName', 'First Name', 'required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required');
		$this->form_validation->set_rules('emailReg', 'Email', 'valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordConfirm', 'Confirm Password', "matches[password]|required");
		if($this->form_validation->run() === FALSE)
		{
			
			$this->session->set_flashdata("errorReg", "You have either missing or invalid fields");

			//then it redirects the user to the main page
			redirect('/');
		}

		//end of validation sends the data to database and retreaves it to dispaly at the log in page "loginWelcomeView"
		else
		{

			$post = $this->input->post();

			$this->load->model('loginRegModel');

			$displayData = $this->loginRegModel->addNewUser($post);

			$this->load->view('registerWelcomePage');
		}
	}

//------------ sucessfully registered -------------------------

//this controller method is connected to the a tag on the registered welcome page which calls a new route to redirect the user to the log in page to log in.
	public function regToLogin()
	{
		redirect('/');
	}

//-------------------- log off---------------------------------------

	//this method redirects the user ot the root page and kills the session
	public function logOffUser()
	{
		$this->session->sess_destroy();

		redirect('/');
	}


}
