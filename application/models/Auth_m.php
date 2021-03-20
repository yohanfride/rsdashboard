<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class auth_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			

	function login($user,$pass){
		$url = $this->config->item('url_node')."auth/login/";		
		$data = array('username'=>$user,'password'=>$pass);
		return json_decode($this->sendPostJson($url,$data));
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
