<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('admin')){
            redirect(base_url() . 'login');
        }
        $this->load->library('form_validation');
        $this->load->helper('cookie');
    }

    public function index(){
        $data['title'] = 'Dashboard - Admin Panel';
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/index');
        $this->load->view('templates/footer_admin');
    }

    // categories
    public function categories(){
        $data['title'] = 'Kategori - Admin Panel';
        $data['categories'] = $this->Categories_model->getCategories();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/categories', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_categories(){
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Halaman - Admin Panel';
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/add_categories', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $this->Categories_model->insertCategory();
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Kategori berhasil dibuat',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/categories');
        }
    }

    public function edit_categories($id){
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Halaman - Admin Panel';
            $data['category'] = $this->Categories_model->getCategoryById($id);
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/edit_categories', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $this->Categories_model->updateCategory($id);
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Kategori berhasil diubah',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/categories');
        }
    }

    public function delete_category($id){
        $this->db->where('id', $id);
        $this->db->delete('categories');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Kategori berhasil dihapus',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/categories');
    }

    public function logout(){
        session_unset();
        session_destroy();
        delete_cookie('fkjrehs');
        redirect(base_url() . 'login');
    }


}