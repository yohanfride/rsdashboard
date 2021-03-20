<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {

        parent::__construct();        
		if(!$this->session->userdata('rs_session')) 
			redirect(base_url() . "auth/login");
		$this->load->model('user_m');
    }

    public function myprofile(){       
		$data=array();
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'My Profil';
		$data['success']='';
		$data['error']='';
		$data['menu']='';
		if($this->input->post('save')){   
			$input = array(
        		"username" => $this->input->post('username'),
        		"name" => $this->input->post('name'),
				"nip" => $this->input->post('nip')
        	);
        	$respo = $this->user_m->edit($data['user_now']->id,$input,$data['user_now']->token);     
			if($respo->code == "B00"){
            	$role = $data['user_now']->user_role;
            	$data['user_now'] = $this->user_m->get_detail($data['user_now']->id,$data['user_now']->token)->data[0];
            	$array = (array) $data['user_now']; 
                $array["user_role"] = $role;
                $data['user_now'] = (object) $array;
                $this->session->set_userdata('easy_admin',$data['user_now']);             
                $data['success']=$respo->message;                  
            } else {                
                $data['error']=$respo->message;
            } 
        }
        $data['data']=$data['user_now'];                
		$this->load->view('profile_v', $data);
	}

	public function setting(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Password Setting';
		$data['menu']='';
		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('old_password', 'Password Lama', 'required');
			$this->form_validation->set_rules('password', 'Password Baru', 'required|matches[passconf]|min_length[6]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi password', 'required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('matches', '%s tidak sama dengan %s');
			// $this->form_validation->set_message('valid_email', 'Alamat email tidak valid');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = trim(validation_errors());
			}else{
				$input=array(
					'password' => $this->input->post('password'),
					'oldpassword' => $this->input->post('old_password')
				);
				$respo = $this->user_m->update_pass($data['user_now']->id,$input,$data['user_now']->token);
				if($respo->code == "B00"){				
					$data['success']=$respo->message;					
				} else {				
					$data['error']=$respo->message;
				}						
		    }
		}
		$this->load->view('user_setting_v', $data);
	}

	public function index(){        
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'User Management';
		$data['menu']='user';

		if($this->input->get('alert')=='success') $data['success']='Users data deleted successfully';	
		if($this->input->get('alert')=='failed') $data['error']="Users data deleted failed";	
		if($this->input->get('alert')=='success2') $data['success']='User account activation successfully';	
		if($this->input->get('alert')=='failed2') $data['error']="User account activation failed";
		if($this->input->get('alert')=='success3') $data['success']='User account suspend successfully';	
		if($this->input->get('alert')=='failed3') $data['error']="User account suspend failed";
		$data['title']='User List';
		$data['data'] = $this->user_m->search(array(),$data['user_now']->token)->data;
		$data['user_now'] = $this->session->userdata('rs_session');		        
		$this->load->view('user_v', $data);
	}

	public function add(){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Add New Users';
		$data['menu']='user';
        if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = trim(validation_errors());
			} else{
				$input = array(
					"username" => $this->input->post('username'),
        			"name" => $this->input->post('name'),
					"password" => md5($this->input->post('password')),
					"role" => $this->input->post('role'),
					"nip" => $this->input->post('nip')
	        	);
				$respo = $this->user_m->add($input,$data['user_now']->token);
	            if($respo->code == "B00"){             
	                $data['success']=$respo->message;                  
	            } else {                
	                $data['error']=$respo->message;
	            } 						
		    }
		}
		$this->load->view('user_add_v', $data);
	}

	public function update($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Update Users';	
		$data['menu']='user';

		if($this->input->post('save')){   
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required');			
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('is_unique', '%s sudah terdaftar'); 	
			if ($this->form_validation->run() == FALSE){
				$data['error'] = trim(validation_errors());
			} else{
				$input = array(
	        		"username" => $this->input->post('username'),
					"role" => $this->input->post('role'),
        			"name" => $this->input->post('name'),
					"nip" => $this->input->post('nip')
	        	);
	        	$respo = $this->user_m->edit($id,$input,$data['user_now']->token);
	            if($respo->code == "B00"){             
	                $data['success']=$respo->message;                  
	            } else {                
	                $data['error']=$respo->message;
	            }        
			}
        }
        $data['data'] = $this->user_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('user_edit_v', $data);
	}	

	public function delete($id=''){		
		$data['user_now'] =  $this->session->userdata('rs_session');
		$del=$this->user_m->del($id,$data['user_now']->token);
		if($del->code == "B00"){
			redirect(base_url().'user/?alert=success') ; 			
		} 
		redirect(base_url().'user/?alert=failed') ; 			
	}

	public function reset_pass($id){       
		$data=array();
		$data['success']='';
		$data['error']='';
		$data['user_now'] =  $this->session->userdata('rs_session');
		$data['title'] = 'Reset Password';
		$data['menu']='user';

		if($this->input->post('save')){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('password', 'New Password', 'required|min_length[6]');
			$this->form_validation->set_message('required', '%s tidak boleh kosong');
			$this->form_validation->set_message('matches', '%s tidak sama dengan %s');
			// $this->form_validation->set_message('valid_email', 'Alamat email tidak valid');
			if ($this->form_validation->run() == FALSE){
				$data['error'] = trim(validation_errors());
			}else{
		    	$input = array(
	        		"password" => $this->input->post('password')
	        	);
	        	$respo = $this->user_m->edit($id,$input,$data['user_now']->token);
	            if($respo->code == "B00"){             
	                $data['success']='Reset Password Succesfuly';                  
	            } else {                
	                $data['error']='Reset Password Failed';
	            }   
		    }
		}
		$data['data'] = $this->user_m->get_detail($id,$data['user_now']->token)->data[0];        
		$data['id'] = $id;
		$this->load->view('user_reset_pass_v', $data);
	}	

	
	public function active($id=''){
		$data['user_now'] =  $this->session->userdata('rs_session');
        $del = $this->user_m->status($id,'active',$data['user_now']->token);
        if($del->code == "B00"){         
            redirect(base_url().'user/?alert=success2');
        }
        redirect(base_url().'user/?alert=failed2');
    }

    public function nonactive($id=''){
		$data['user_now'] =  $this->session->userdata('rs_session');
       	$del = $this->user_m->status($id,'not-active',$data['user_now']->token);
        if($del->code == "B00"){          
            redirect(base_url().'user/?alert=success3');
        }
        redirect(base_url().'user/?alert=failed3');
    }

    
}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
