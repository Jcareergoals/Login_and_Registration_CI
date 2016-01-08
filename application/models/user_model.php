<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user_model extends CI_Model {
	public function get_user_by_email($email)
	{
		$query = "SELECT * FROM users where email = ?";
		$values = array($email); 
		return $this->db->query($query, $values)->row_array();
	}
	public function create_user($user)
	{
		$query = "INSERT INTO users (first_name, last_name, email, password, date, created_at, updated_at)
				  VALUES (?,?,?,?,?,?,?)"; 
		$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], date('M jS Y g:iA'), "NOW()", "NOW()");
		return $this->db->query($query, $values);
	}
	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array(); 
	}
} 