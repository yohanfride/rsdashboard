<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();   
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");
        $this->load->model('doctor_m');
		$this->load->model('record_m');
    }

	public function index(){        
		$data=array();
		$data['menu']='dashboard';
		$data['chart']=true;
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['dokter'] = $this->doctor_m->search(array(),$data['user_now']->token)->data;
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// exit();
		$data['str_date'] = date("Y-m-d");
		$data['end_date'] = date("Y-m-d");
		if($this->input->get('str')){
			$data['str_date'] = $this->input->get('str');
		}
		if($this->input->get('end')){
			$data['end_date'] = $this->input->get('end');
		}
		if($this->input->get('alert')=='success') $data['success']='Medical Record data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Medical Record data deleted failed";	
		$find = array(
			"str_pemeriksaan"=>$data['str_date'],
			"end_pemeriksaan"=>$data['end_date']
		);
		$data['data'] = $this->record_m->search($find,$data['user_now']->token)->data;
		$data['title'] ='Main Page';
        $this->load->view('dashboard_v', $data);
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
