<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Model extends CI_Model {

	public function check_user_account($username, $password){
		$sql = "SELECT * FROM account WHERE username = '$username' and password = '$password'";
        $query = $this->db->query($sql);
        return $query->result_array();
	}

	public function insert_post($data){
		$sql = "INSERT INTO post (title, content, date, username)
				VALUES ('$data[title]', '$data[content]', now(), '$data[username]')";
		$this->db->query($sql);
	}	

	public function update_post($data, $post_id){
		$sql = "UPDATE post 
				   SET title = '$data[title]',
				       content = '$data[content]'
				WHERE idpost = $post_id";
		$this->db->query($sql);
	}

	public function delete_post($post_id){
		$sql = "DELETE FROM post WHERE idpost = $post_id";
		$this->db->query($sql);		
	}

	public function get_post($post_id=null){
		$filter_id = "";
		if(!empty($post_id)){
			$filter_id = "AND idpost = $post_id";
		}

		$sql = "SELECT * FROM post WHERE 1=1 $filter_id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function insert_account($data){
		$sql = "INSERT INTO account (username, password, name, role)
				VALUES ('$data[username]', '$data[password]', '$data[name]', '$data[role]')";
		$this->db->query($sql);
	}

	public function update_account($data, $old_username){
		$sql = "UPDATE account
				   SET username = '$data[username]',
				       password = '$data[password]',
					   name = '$data[name]',
					   role = '$data[role]'
				WHERE username = '$old_username'";
		$this->db->query($sql);
	}

	public function delete_account($username){
		$sql = "DELETE FROM account WHERE username = '$username'";
		$this->db->query($sql);
	}

	public function get_account($username=null){
		$filter_username = "";
		if(!empty($post_id)){
			$filter_username = "AND username = '$username'";
		}

		$sql = "SELECT * FROM account WHERE 1=1 $filter_username";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

}

?>