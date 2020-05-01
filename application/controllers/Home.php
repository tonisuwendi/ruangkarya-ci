<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $setting = $this->db->get('settings')->row_array();
        $data['title'] = $setting['app_name'];
        $data['css'] = 'style';
        $config['base_url'] = base_url() . 'home/index/';
        $config['total_rows'] = $this->Projects_model->getProjects("","")->num_rows();
        $config['per_page'] = 12;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['projects'] = $this->Projects_model->getProjects($config['per_page'], $from);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function search(){
        $q = $this->input->get('q');
        $setting = $this->db->get('settings')->row_array();
        $data['title'] = 'Hasil Pencarian : ' . $q;
        $data['css'] = 'style';
        $data['projects'] = $this->Projects_model->searchProjects($q);
        $data['q'] = $q;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('search', $data);
        $this->load->view('templates/footer');
    }

}