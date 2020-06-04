<?php
class PostService extends CI_Model{
	function submitDetail($data){
		// var_dump($data);exit;
		$this->load->database();
		$SQL="INSERT INTO user (name, email, address, city, profile_url,published) VALUES ('".$data['firstname']."','".$data['email']."', '".$data['address']."', '".$data['city']."', '".$data['profile_url']."', 1);";
		$query = $this->db->query($SQL);	
	}
}	