<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class record extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");        
		$this->load->model('record_m');
		$this->load->model('patient_m');
    }

	public function index(){        
		$data=array();
		$data['menu']='record';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Medical Record';
		$data['success']='';
		$data['error']='';
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
		////
		$params = $_GET;
		unset($params['alert']);
		$data['params'] = http_build_query($params);
		$last_params = array(
			'params' => $data['params'],
			'menu' => $data['menu']
		);
		$this->session->set_userdata('lastparams',$last_params);
		/////
		$this->load->view('record_v', $data);
	}

	public function patient($norekam){        
		$data=array();
		$data['menu']='record';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Medical Record';
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Medical Record data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Medical Record data deleted failed";	
		$find = array(
			"no_rekam_medik"=>$norekam
		);
		$data['data'] = $this->record_m->search($find,$data['user_now']->token)->data;
		$data['pasien'] = $this->patient_m->search($find,$data['user_now']->token)->data[0];   
		////
		$params = $_GET;
		unset($params['alert']);
		$data['params'] = http_build_query($params);
		$last_params = array(
			'params' => 'patient/'.$norekam.'/'.$data['params'],
			'pasien' => true,
			'menu' => $data['menu']
		);
		$this->session->set_userdata('lastparams',$last_params);
		/////
		$this->load->view('record_user_v', $data);
	}

	public function detail($id,$norekam=""){       
		$data=array();
		$data['menu']='record';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Detail Medical Record';
		$data['success']='';
		$data['error']='';
        $data['data'] = $this->record_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		//////
		$data['params'] = '';
		$lastparams = (object)$this->session->userdata('lastparams');
		if($lastparams->menu == $data['menu']){
			$data['params'] = $lastparams->params;
			if(empty($lastparams->pasien)){
				$data['params']	= '?'.$data['params'];
			} else {
				$data['menu_pasien'] = true;
			}
		}
		/////
		// print('<pre>');
		// print_r($data);
		// print('<pre>');
		// exit();
		$this->load->view('record_detail_v', $data);
	}

	public function chart(){        
		$data=array();
		$data['menu']='report';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Medical Record Report';
		$data['success']='';
		$data['error']='';
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
			"end_pemeriksaan"=>$data['end_date'],
			"groupby" => "date"
		);
		$data['data'] = $this->record_m->group($find,$data['user_now']->token)->data;
		////
		$params = $_GET;
		unset($params['alert']);
		$data['params'] = http_build_query($params);
		$last_params = array(
			'params' => $data['params'],
			'menu' => $data['menu']
		);
		$this->session->set_userdata('lastparams',$last_params);
		/////
		$data['list'] = array();
		$data['item'] = array();
		$max = 8;
		foreach ($data['data'] as $d) {
			$data['list'][] = $d->date;	 
			$data['item'][] = $d->total_item;
			if($max<$d->total_item) $max = $d->total_item;	 
		} 
		$data['max']=$max;
		$this->load->view('record_chart_v', $data);
	}


	//////////////////////
	public function add(){       
		$data=array();
		$data['menu']='record';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Add New Medical Record';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama_dokter" => $this->input->post('name'),
        		"alamat" => $this->input->post('address'),
        		"no_telp" => $this->input->post('phone'),
				"spesialis" => $this->input->post('specialist')
        	);
        	$respo = $this->record_m->add($input,$data['user_now']->token);
            if($respo->code == "D00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }    
        }
		$this->load->view('record_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['menu']='record';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Update Medical Record';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama_dokter" => $this->input->post('name'),
        		"alamat" => $this->input->post('address'),
        		"no_telp" => $this->input->post('phone'),
				"spesialis" => $this->input->post('specialist')
        	);
        	$respo = $this->record_m->edit($id,$input,$data['user_now']->token);
            if($respo->code == "D00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }                       
        }
        $data['data'] = $this->record_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('record_edit_v', $data);
	}
	public function delete($id){					
		$data['user_now'] =  $this->session->userdata('rs_session');
		$del=$this->record_m->del($id,$data['user_now']->token);
		if($del){
			redirect(base_url().'record/?alert=success') ; 			
		} 
		redirect(base_url().'record/?alert=failed') ; 			
	}

}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
