<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function index($id){
        $db = $this->db->get_where('categories', ['id' => $id])->row_array();
        $data['title'] = 'Kategori ' . $db['name'];
        $data['css'] = 'style';
        $config['base_url'] = base_url() . 'categories/index/';
        $config['total_rows'] = $this->Projects_model->getProjectsByCategory("","", $id)->num_rows();
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
        $data['projects'] = $this->Projects_model->getProjectsByCategory($config['per_page'], $from, $id);
        $data['data'] = $db;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('page/category', $data);
        $this->load->view('templates/footer');
    }

}