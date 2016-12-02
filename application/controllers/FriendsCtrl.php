<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FriendsCtrl extends CI_Controller 
{
	public function __construct() {
		parent::__construct();
		$this->output->enable_profiler();
	}


	public function index()
	{
		$this->load->model('FriendsModel');

		$friends['friends'] = $this->FriendsModel->getFriends();
		$this->load->view('loginWelcomeView', $friends);
		
		$this->load->model('FriendsModel');
	}

	public function showProfile($id)
	{

		$this->load->model('FriendsModel');
		$profile['data'] = $this->FriendsModel->getProfile($id);

		$this->load->view('showFriend', $profile);
	}

	public function removeFriend($id)
	{
		$this->load->model('FriendsModel');
		$this->FriendsModel->removeFriendFromList($id);
		redirect('FriendsCtrl');
	}
}























