<?php
class User_profile_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function insert($post)
	{
		return  $this->db->insert('user_profile', $post);
	}
	
	function find_all_user_profile(){
		$this->db->select('id,name,photo');
		
		$query = $this->db->get('user_profile');
		return $query->result();
	}

}