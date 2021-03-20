<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

    public function login() {
        if ($this->session->userdata('rs_session')) {
            redirect(base_url('dashboard'));
        }
        $data['error'] = FALSE;
        $data['title'] = 'Login';
        $this->load->view('user_login_v',$data);        
    }

    public function dologin() {
        if ($this->session->userdata('rs_session')) {
            redirect(base_url('dashboard'));
        }
        $data['title'] = 'Login';
        
        $this->load->library('form_validation');
        $data['error'] = FALSE;
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        if ($this->form_validation->run($this) == FALSE) {
            $data['error'] = validation_errors();
            $message = [                    
                'status' => 'false',
                'error' => $data['error']
            ];
        } else {
            $username = $this->input->post("username");
            $pass = $this->input->post('password');
            $respo = $this->auth_m->login($username, $pass);
            if($respo->code == "00"){
                $user = $respo->data;
                $user->token = base64_encode("$username:$pass");            
                $this->session->set_userdata('rs_session',$user);
                redirect(base_url('dashboard'));
            } else {
                $data['error'] = $respo->message;                
            }
        }
        $this->load->view('user_login_v', $data);
    }

    function RandomString($j){
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $j; $i++) {           
            $randstring.= $characters[rand(0, strlen($characters)-1)];          
        }
        return $randstring;
    }
    
    public function logout(){
        $this->session->unset_userdata('rs_session');
        $this->session->unset_userdata('cart');
        redirect(base_url('auth/login'));
    }
}

/* End of file  */
/* Location: ./application/controllers/ */
