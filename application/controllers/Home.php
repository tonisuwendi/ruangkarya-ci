<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['title'] = 'Ruangkarya';
        $data['css'] = 'style';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('index');
        $this->load->view('templates/footer');
    }

}