<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Record_m extends My_Model{
	private $aes;
	
	function __construct() {
		parent::__construct();		
	}			
	
	function get_detail($id,$token){
		$data = array(
			"id" => $id,
			"take" => 1
		);
		$url = $this->config->item('url_node')."rekammedik/get/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function add($data,$token){
		$url = $this->config->item('url_node')."rekammedik/insert/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function edit($id,$data,$token){
		$data+=["id" => $id];
		$url = $this->config->item('url_node')."rekammedik/update/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}
	
	function del($id,$token){
		$data = array(
			"id" => $id
		);
		$url = $this->config->item('url_node')."rekammedik/delete/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}	

	function search($data,$token){
		$url = $this->config->item('url_node')."rekammedik/get/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function search_count($data,$token){
		$url = $this->config->item('url_node')."rekammedik/total/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}

	function group($data,$token){
		$url = $this->config->item('url_node')."rekammedik/group/";				
		return json_decode($this->sendPostJson($url,$data,$token));
	}


}

/* End of file admin_model.php */
/* Location: ./application/models/admin_Model.php */
