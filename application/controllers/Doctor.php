<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class doctor extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");        
		$this->load->model('doctor_m');
    }

	public function index(){        
		$data=array();
		$data['menu']='doctor';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Doctor';
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Doctor data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Doctor data deleted failed";		
		$data['data'] = $this->doctor_m->search(array(),$data['user_now']->token)->data;
		$data['user_now'] = $this->session->userdata('rs_session');		        
		$this->load->view('doctor_v', $data);
	}

	public function add(){       
		$data=array();
		$data['menu']='doctor';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Add New Doctor';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama_dokter" => $this->input->post('name'),
        		"alamat" => $this->input->post('address'),
        		"no_telp" => $this->input->post('phone'),
				"spesialis" => $this->input->post('specialist')
        	);
        	$respo = $this->doctor_m->add($input,$data['user_now']->token);
            if($respo->code == "D00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }    
        }
		$this->load->view('doctor_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['menu']='doctor';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Update Doctor';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama_dokter" => $this->input->post('name'),
        		"alamat" => $this->input->post('address'),
        		"no_telp" => $this->input->post('phone'),
				"spesialis" => $this->input->post('specialist')
        	);
        	$respo = $this->doctor_m->edit($id,$input,$data['user_now']->token);
            if($respo->code == "D00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }                       
        }
        $data['data'] = $this->doctor_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('doctor_edit_v', $data);
	}
	public function delete($id){					
		$data['user_now'] =  $this->session->userdata('rs_session');
		$del=$this->doctor_m->del($id,$data['user_now']->token);
		if($del){
			redirect(base_url().'doctor/?alert=success') ; 			
		} 
		redirect(base_url().'doctor/?alert=failed') ; 			
	}

}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
