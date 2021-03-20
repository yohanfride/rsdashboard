<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class patient extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");        
		$this->load->model('patient_m');
    }

	public function index(){        
		$data=array();
		$data['menu']='patient';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Patient';
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Patient data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Patient data deleted failed";		
		$data['data'] = $this->patient_m->search(array(),$data['user_now']->token)->data;
		$data['user_now'] = $this->session->userdata('rs_session');		        
		$this->load->view('patient_v', $data);
	}

	public function add(){       
		$data=array();
		$data['menu']='patient';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Add New Patient';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama" => $this->input->post('name'),
        		"ktp" => $this->input->post('id'),
        		"tgl_lahir" => $this->input->post('birthday'),
        		"tempat_lahir" => $this->input->post('birthplace'),
        		"jenis_kelamin" => $this->input->post('gender'),
        		"alamat" => $this->input->post('address'),
        		"kota" => $this->input->post('city'),
        		"no_telp" => $this->input->post('phone'),
				"pekerjaan" => $this->input->post('job')
        	);
        	$respo = $this->patient_m->add($input,$data['user_now']->token);
            if($respo->code == "E00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }    
        }
		$this->load->view('patient_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['menu']='patient';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Update Patient';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nama" => $this->input->post('name'),
        		"ktp" => $this->input->post('id'),
        		"tgl_lahir" => $this->input->post('birthday'),
        		"tempat_lahir" => $this->input->post('birthplace'),
        		"jenis_kelamin" => $this->input->post('gender'),
        		"alamat" => $this->input->post('address'),
        		"kota" => $this->input->post('city'),
        		"no_telp" => $this->input->post('phone'),
				"pekerjaan" => $this->input->post('job')
        	);
        	$respo = $this->patient_m->edit($id,$input,$data['user_now']->token);
            if($respo->code == "E00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }                       
        }
        $data['data'] = $this->patient_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('patient_edit_v', $data);
	}
	public function delete($id){					
		$data['user_now'] =  $this->session->userdata('rs_session');
		$del=$this->patient_m->del($id,$data['user_now']->token);
		if($del){
			redirect(base_url().'patient/?alert=success') ; 			
		} 
		redirect(base_url().'patient/?alert=failed') ; 			
	}

}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
