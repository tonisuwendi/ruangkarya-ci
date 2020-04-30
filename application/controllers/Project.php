<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function index($slug){
        $check = $this->db->get_where('projects', ['slug' => $slug]);
        if($check->num_rows() < 1){
            redirect(base_url());
        }
        $data['title'] = $check->row_array()['name'];
        $data['css'] = 'detail';
        $data['project'] = $this->Projects_model->getProjectBySlug($slug);
        $data['projectMore'] = $this->Projects_model->getAllProjectsNotSlug($slug);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('page/detail', $data);
        $this->load->view('templates/footer');
    }

}