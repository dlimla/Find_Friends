<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FriendsModel extends CI_Model 
{
	public function getFriends()
	{
		$user = $this->session->userdata('id');
	

		$query = "SELECT users1.name as user, users2.name as friend, users2.id FROM users_has_users INNER JOIN users AS users1 INNER JOIN users AS users2 ON users_has_users.user_id = users1.id AND users_has_users.friend_id = users2.id";

		return $this->db->query($query)->result_array();

	}

	public function getProfile($id)
	{

		$query = "SELECT name, email FROM users WHERE users.id = $id";
		return $this->db->query($query)->result_array();
	}

	public function removeFriendFromList($id)
	{
		$user = $this->session->userdata('id');
		$query = "DELETE FROM users_has_users WHERE friend_id = $id AND users_id = $user";
	}
}
