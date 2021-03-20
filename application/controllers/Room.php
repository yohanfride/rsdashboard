<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class room extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");        
		$this->load->model('room_m');
    }

	public function index(){        
		$data=array();
		$data['menu']='room';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Patient Room';
		$data['success']='';
		$data['error']='';
		if($this->input->get('alert')=='success') $data['success']='Patient Room data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Patient Room data deleted failed";		
		$data['data'] = $this->room_m->search(array(),$data['user_now']->token)->data;
		$data['user_now'] = $this->session->userdata('rs_session');		        
		$this->load->view('room_v', $data);
	}

	public function add(){       
		$data=array();
		$data['menu']='room';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Add New Patient Room';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nomor_ruangan" => $this->input->post('room_number'),
        		"jenis_ruangan" => $this->input->post('type'),
        		"harga" => preg_replace("/[^0-9 ]/", "", $this->input->post('price') ),
				"keterangan" => $this->input->post('detail')
        	);
        	$respo = $this->room_m->add($input,$data['user_now']->token);
            if($respo->code == "C00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }    
        }
		$this->load->view('room_add_v', $data);
	}

	public function edit($id){       
		$data=array();
		$data['menu']='room';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Update Patient Room';
		$data['success']='';
		$data['error']='';
		if($this->input->post('save')){        	
        	$input = array(
        		"nomor_ruangan" => $this->input->post('room_number'),
        		"jenis_ruangan" => $this->input->post('type'),
        		"harga" => preg_replace("/[^0-9 ]/", "", $this->input->post('price') ),
				"keterangan" => $this->input->post('detail')
        	);
        	$respo = $this->room_m->edit($id,$input,$data['user_now']->token);
            if($respo->code == "C00"){             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            }                       
        }
        $data['data'] = $this->room_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('room_edit_v', $data);
	}
	public function delete($id){					
		$data['user_now'] =  $this->session->userdata('rs_session');
		$del=$this->room_m->del($id,$data['user_now']->token);
		if($del){
			redirect(base_url().'room/?alert=success') ; 			
		} 
		redirect(base_url().'room/?alert=failed') ; 			
	}

}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
