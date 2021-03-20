<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id,$token){
		$data = array(
			"id" => $id,
			"take" => 1
		);
		$url = $this->config->item('url_node')."user/get/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function add($data,$token){
		$url = $this->config->item('url_node')."user/insert/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function edit($id,$data,$token){
		$data+=["id" => $id];
		$url = $this->config->item('url_node')."user/update/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}
	
	function del($id,$token){
		$data = array(
			"id" => $id
		);
		$url = $this->config->item('url_node')."user/delete/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}	

	function search($data,$token){
		$url = $this->config->item('url_node')."user/get/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function search_count($data,$token){
		$url = $this->config->item('url_node')."user/total/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function status($id,$status,$token){
		$data = array(
			"id" => $id,
			"status" => $status
		);
		$url = $this->config->item('url_node')."user/status/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function login($username, $pass,$token){
		$data = array(
			"username" => $username,
			"password" => $pass
		);
		$url = $this->config->item('url_node')."user/login/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function reset_password($data,$token){
		$url = $this->config->item('url_node')."user/resetpassword/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function update_pass($id,$data,$token){
		$data+=["id" => $id];
		$url = $this->config->item('url_node')."user/updatepass/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}
	
	// function activation($user,$data){
	// 	$url = $this->config->item('url_node')."user/activation/".$user;				
	// 	return json_decode($this->sendPostJson($url,$data,$token));
	// }

	// function resetpass($user,$data){
	// 	$url = $this->config->item('url_node')."user/resetpass/".$user;				
	// 	return json_decode($this->sendPostJson($url,$data,$token));
	// }
}

/* End of file user_model.php */
/* Location: ./application/models/user_Model.php */
