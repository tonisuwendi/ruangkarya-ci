<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('admin')){
            redirect(base_url() . 'administrator');
        }
        $this->load->helper('cookie');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
        if($this->form_validation->run() == false){
            $this->load->view('login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');
            $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

            if($admin){
                if(password_verify($password, $admin['password'])){
                  $data = [
                    'id' => $admin['id']
				  ];
    
                if($remember != NULL){
                    $key = random_string('alnum', 64);
                    set_cookie('fkjrehs', $key, 3600*24*30*12);
                    $this->db->set('cookie', $key);
                    $this->db->update('admin');
                }
                                
                $this->session->set_userdata('admin', true);
                $this->session->set_userdata($data);

                redirect(base_url() . 'administrator');

                }else{
                    $this->session->set_flashdata('failed', '<div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      Password salah.
                    </div>
                  </div>');
                    redirect(base_url() . 'login');
                }
              }else{
              $this->session->set_flashdata('failed', '<div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                Username salah.
              </div>
            </div>');
              redirect(base_url() . 'login');
              }
        }
    }


}