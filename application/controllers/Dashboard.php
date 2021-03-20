<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function __construct() {
        parent::__construct();   
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");
        $this->load->model('doctor_m');
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
		$data['title'] ='Main Page';
        $this->load->view('dashboard_v', $data);
	}	
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
