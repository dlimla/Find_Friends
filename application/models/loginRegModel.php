<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class loginRegModel extends CI_Model 
{
	public function LoginUser($post)
	{
		//this query recieves the post data and retrieves the row in the database where the email and password match regardless if the row is empty or not
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$value = array($post['email'], $post['password']);

		//then returns the whole row of the user where the email and passwords match and sends it back to the controller if the email and passwords don't match any user it sends an empty row
		return $this->db->query($query, $value)->row_array();

	}

//----------------------------------------------------------------------


// this method sends data to the database to be inputed
	public function addNewUser($post)
	{		
		//make sure that when you write this query you match the TABLE name not the database name that's a common mistake you noob
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
		//this line fills all the post data to the cooresponding user colmns 
		$values = array($post['firstName'], $post['lastName'], $post['emailReg'], $post['password'], 'NOW()', 'NOW()');

		$this->db->query($query, $values);
	}
}
