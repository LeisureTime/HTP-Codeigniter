<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	
	function __construct()
	{
	parent::__construct();
	$this->load->model("user_profile_model","userObj");
	}
	
	public function index()
	{
	$generated_avatar_key = substr(md5($_FILES['photo']['name']),0,10);
	file_put_contents(APPPATH.'/images/'.$generated_avatar_key.'.jpg',file_get_contents($_FILES['photo']['tmp_name']));
	$_POST["photo"] = $generated_avatar_key;
	
	$this->userObj->insert($_POST);		
	$data["results"]= array(0=>array("status"=>1,"message"=>"User Created"));
	echo json_encode($data);
	}
	
	public function getuserlist(){
	$data["results"]= $this->userObj->find_all_user_profile();
	//log_message("MYLOG",$data["results"]);
	echo json_encode($data);
	}
}

