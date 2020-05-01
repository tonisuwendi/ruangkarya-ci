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
            $data['title'] = 'Tambah Kategori - Admin Panel';
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
            $data['title'] = 'Edit Kategori - Admin Panel';
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
        $this->db->where('category', $id);
        $this->db->delete('projects');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Kategori berhasil dihapus',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/categories');
    }

    // projects
    public function projects(){
        $data['title'] = 'Projek - Admin Panel';
        $config['base_url'] = base_url() . 'administrator/projects/';
        $config['total_rows'] = $this->Projects_model->getProjects("","")->num_rows();
        $config['per_page'] = 10;
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
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/projects', $data);
        $this->load->view('templates/footer_admin');
    }

    public function add_projects(){
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi']);
        $this->form_validation->set_rules('category', 'Kategori', 'required', ['required' => 'Kategori wajib diisi']);
        $this->form_validation->set_rules('description', 'Deskripsi', 'required', ['required' => 'Deskripsi wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Tambah Projek - Admin Panel';
            $data['categories'] = $this->Categories_model->getCategories();
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/add_projects', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $category = $this->input->post('category');
            $dbCat = $this->db->get_where('categories', ['type' => $category])->row_array();
            if($dbCat['type'] == 1){
                $data = array();
                $upload = $this->Projects_model->uploadFile('1');
                if($upload['result'] == 'success'){
                    if($_FILES['file4']['name'] != ""){
                        $upload1 = $this->Projects_model->uploadFile('4');
                        if($upload1['result'] == 'success'){
                            $nameFile = $upload['file']['file_name'];
                            $nameFile1 = $upload1['file']['file_name'];
                            $this->Projects_model->insertProjects($nameFile, $nameFile1);
                            $this->session->set_flashdata('upload', "<script>
                                swal({
                                text: 'Projek berhasil ditambahkan',
                                icon: 'success'
                                });
                                </script>");
                                redirect(base_url() . 'administrator/projects');
                        }else{
                            $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                            Gagal menambah projek, pastikan file pendukung berukuran maksimal 2mb dan berformat png, jpg, jpeg. Silakan ulangi lagi.
                          </div>");
                            redirect(base_url() . 'administrator/projects/add');
                        }
                    }else{
                        $nameFile = $upload['file']['file_name'];
                        $nameFile1 = "";
                        $this->Projects_model->insertProjects($nameFile, $nameFile1);
                        $this->session->set_flashdata('upload', "<script>
                            swal({
                            text: 'Projek berhasil ditambahkan',
                            icon: 'success'
                            });
                            </script>");
                            redirect(base_url() . 'administrator/projects');
                    }
                }else{
                    $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                    Gagal menambah projek, pastikan file berukuran maksimal 2mb dan berformat png, jpg, jpeg. Silakan ulangi lagi.
                  </div>");
                    redirect(base_url() . 'administrator/projects/add');
                }
            }else if($dbCat['type'] == 2){
                $data = array();
                $upload = $this->Projects_model->uploadFile('2');
                if($upload['result'] == 'success'){
                    if($_FILES['file4']['name'] != ""){
                        $upload1 = $this->Projects_model->uploadFile('4');
                        if($upload1['result'] == 'success'){
                            $nameFile = $upload['file']['file_name'];
                            $nameFile1 = $upload1['file']['file_name'];
                            $this->Projects_model->insertProjects($nameFile, $nameFile1);
                            $this->session->set_flashdata('upload', "<script>
                                swal({
                                text: 'Projek berhasil ditambahkan',
                                icon: 'success'
                                });
                                </script>");
                                redirect(base_url() . 'administrator/projects');
                        }else{
                            $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                            Gagal menambah projek, pastikan file pendukung berukuran maksimal 2mb dan berformat png, jpg, jpeg. Silakan ulangi lagi.
                          </div>");
                            redirect(base_url() . 'administrator/projects/add');
                        }
                    }else{
                        $nameFile = $upload['file']['file_name'];
                        $nameFile1 = "";
                        $this->Projects_model->insertProjects($nameFile, $nameFile1);
                        $this->session->set_flashdata('upload', "<script>
                            swal({
                            text: 'Projek berhasil ditambahkan',
                            icon: 'success'
                            });
                            </script>");
                            redirect(base_url() . 'administrator/projects');
                    }
                }else{
                    $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                    Gagal menambah projek, pastikan file berukuran maksimal 2mb dan berformat gif. Silakan ulangi lagi.
                  </div>");
                    redirect(base_url() . 'administrator/projects/add');
                }
            }else if($dbCat['type'] == 3){
                $data = array();
                if($_FILES['file4']['name'] != ""){
                    $upload1 = $this->Projects_model->uploadFile('4');
                    if($upload1['result'] == 'success'){
                        $nameFile = $this->input->post('file3');
                        $nameFile1 = $upload1['file']['file_name'];
                        $this->Projects_model->insertProjects($nameFile, $nameFile1);
                        $this->session->set_flashdata('upload', "<script>
                            swal({
                            text: 'Projek berhasil ditambahkan',
                            icon: 'success'
                            });
                            </script>");
                            redirect(base_url() . 'administrator/projects');
                    }else{
                        $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                        Gagal menambah projek, pastikan file pendukung berukuran maksimal 2mb dan berformat gif. Silakan ulangi lagi.
                      </div>");
                        redirect(base_url() . 'administrator/projects/add');
                    }
                }else{
                    $upload1 = "";
                    $nameFile = $this->input->post('file3');
                    $nameFile1 = $upload1['file']['file_name'];
                    $this->Projects_model->insertProjects($nameFile, $nameFile1);
                    $this->session->set_flashdata('upload', "<script>
                        swal({
                        text: 'Projek berhasil ditambahkan',
                        icon: 'success'
                        });
                        </script>");
                        redirect(base_url() . 'administrator/projects');
                }
            }
        }
    }

    public function edit_projects($id){
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Edit Projek - Admin Panel';
            $data['categories'] = $this->Categories_model->getCategories();
            $data['project'] = $this->Projects_model->getProjectById($id);
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/edit_projects', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $dt = $this->Projects_model->getProjectById($id);
            if($dt['type'] == 1){
                if($_FILES['file1']['name'] != ""){
                    $data = array();
                    $upload = $this->Projects_model->uploadFile('1');
                    if($upload['result'] == 'success'){
                        $nameFile = $upload['file']['file_name'];
                        $this->Projects_model->updateProject($nameFile, $id);
                        $this->session->set_flashdata('upload', "<script>
                            swal({
                            text: 'Projek berhasil diubah',
                            icon: 'success'
                            });
                            </script>");
                            redirect(base_url() . 'administrator/projects');
                    }else{
                        $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                        Gagal mengubah projek, pastikan file berukuran maksimal 2mb dan berformat png, jpg, jpeg. Silakan ulangi lagi.
                    </div>");
                    redirect(base_url() . 'administrator/project/'.$id);
                    }
                }else{
                    $nameFile = $dt['file'];
                    $this->Projects_model->updateProject($nameFile, $id);
                    $this->session->set_flashdata('upload', "<script>
                        swal({
                        text: 'Projek berhasil diubah',
                        icon: 'success'
                        });
                        </script>");
                        redirect(base_url() . 'administrator/projects');
                }
            }else if($dt['type'] == 2){
                if($_FILES['file2']['name'] != ""){
                    $data = array();
                    $upload = $this->Projects_model->uploadFile('2');
                    if($upload['result'] == 'success'){
                        $nameFile = $upload['file']['file_name'];
                        $this->Projects_model->updateProject($nameFile, $id);
                        $this->session->set_flashdata('upload', "<script>
                            swal({
                            text: 'Projek berhasil diubah',
                            icon: 'success'
                            });
                            </script>");
                            redirect(base_url() . 'administrator/projects');
                    }else{
                        $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
                        Gagal mengubah projek, pastikan file berukuran maksimal 2mb dan berformat gif. Silakan ulangi lagi.
                    </div>");
                        redirect(base_url() . 'administrator/project/'.$id);
                    }
                }else{
                    $nameFile = $dt['file'];
                    $this->Projects_model->updateProject($nameFile, $id);
                    $this->session->set_flashdata('upload', "<script>
                        swal({
                        text: 'Projek berhasil diubah',
                        icon: 'success'
                        });
                        </script>");
                        redirect(base_url() . 'administrator/projects');
                }
            }else if($dt['type'] == 3){
                $nameFile = $this->input->post('file3');
                $this->Projects_model->updateProject($nameFile, $id);
                $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Projek berhasil diubah',
                icon: 'success'
                });
                </script>");
                redirect(base_url() . 'administrator/projects');
            }
        }
    }

    public function delete_project($id){
        $this->db->where('id', $id);
        $this->db->delete('projects');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Projek berhasil dihapus',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/projects');
    }

    public function settings(){
        $this->form_validation->set_rules('app_name', 'Nama', 'required', ['required' => 'Nama wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Pengaturan - Admin Panel';
            $data['setting'] = $this->db->get('settings')->row_array();
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/settings', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $name = $this->input->post('app_name');
            $this->db->set('app_name', $name);
            $this->db->update('settings');
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Nama aplikasi berhasil diubah',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/settings');
        }
    }

    public function logo_setting(){
        $data['title'] = 'Pengaturan - Admin Panel';
        $data['setting'] = $this->db->get('settings')->row_array();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/logo_setting', $data);
        $this->load->view('templates/footer_admin');
    }

    public function upload_logo_setting(){
        $data = array();
        $upload = $this->Projects_model->uploadFile('6');
        if($upload['result'] == 'success'){
            $nameFile = $upload['file']['file_name'];
            $this->db->set('logo', $nameFile);
            $this->db->update('settings');
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Logo berhasil diubah',
                icon: 'success'
                });
                </script>");
                redirect(base_url() . 'administrator/setting/logo');
        }else{
            $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
            Gagal mengubah logo, pastikan file berukuran maksimal 2mb dan berformat jpg, jpeg, atau png. Silakan ulangi lagi.
        </div>");
            redirect(base_url() . 'administrator/setting/logo');
        }
    }

    public function favicon_setting(){
        $data['title'] = 'Pengaturan - Admin Panel';
        $data['setting'] = $this->db->get('settings')->row_array();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/favicon_setting', $data);
        $this->load->view('templates/footer_admin');
    }

    public function upload_favicon_setting(){
        $data = array();
        $upload = $this->Projects_model->uploadFile('6');
        if($upload['result'] == 'success'){
            $nameFile = $upload['file']['file_name'];
            $this->db->set('favicon', $nameFile);
            $this->db->update('settings');
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Favicon berhasil diubah',
                icon: 'success'
                });
                </script>");
                redirect(base_url() . 'administrator/setting/favicon');
        }else{
            $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
            Gagal mengubah favicon, pastikan file berukuran maksimal 2mb dan berformat jpg, jpeg, atau png. Silakan ulangi lagi.
        </div>");
            redirect(base_url() . 'administrator/setting/favicon');
        }
    }

    public function banner_setting(){
        $data['title'] = 'Pengaturan - Admin Panel';
        $data['setting'] = $this->db->get('settings')->row_array();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/banner_setting', $data);
        $this->load->view('templates/footer_admin');
    }

    public function upload_banner_setting(){
        $data = array();
        $upload = $this->Projects_model->uploadFile('5');
        if($upload['result'] == 'success'){
            $nameFile = $upload['file']['file_name'];
            $this->db->set('banner', $nameFile);
            $this->db->update('settings');
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Banner berhasil diubah',
                icon: 'success'
                });
                </script>");
                redirect(base_url() . 'administrator/setting/banner');
        }else{
            $this->session->set_flashdata('failed', "<div class='alert alert-danger' role='alert'>
            Gagal mengubah banner, pastikan file berukuran maksimal 2mb dan berformat jpg, jpeg, atau png. Silakan ulangi lagi.
        </div>");
            redirect(base_url() . 'administrator/setting/banner');
        }
    }

    public function text_setting(){
        $this->form_validation->set_rules('text', 'Teks', 'required', ['required' => 'Teks wajib diisi']);
        if($this->form_validation->run() == false){
            $data['title'] = 'Pengaturan - Admin Panel';
            $data['setting'] = $this->db->get('settings')->row_array();
            $this->load->view('templates/header_admin', $data);
            $this->load->view('administrator/text_setting', $data);
            $this->load->view('templates/footer_admin');
        }else{
            $text = $this->input->post('text');
            $this->db->set('text', $text);
            $this->db->update('settings');
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Teks banner berhasil diubah',
                icon: 'success'
                });
                </script>");
            redirect(base_url() . 'administrator/setting/text');
        }
    }

    // edit
    public function edit(){
        $data['title'] = 'Edit Profil Admin - Admin Panel';
        $admin = $this->db->get('admin')->row_array();
        $data['admin'] = $admin;
        $this->load->view('templates/header_admin', $data);
        $this->load->view('administrator/edit', $data);
        $this->load->view('templates/footer_admin');
    }

    public function edit_username(){
        $this->db->set('username', $this->input->post('username'));
        $this->db->update('admin');
        $this->session->set_flashdata('upload', "<script>
            swal({
            text: 'Username berhasil diubah',
            icon: 'success'
            });
            </script>");
        redirect(base_url() . 'administrator/edit');
    }

    public function edit_pass(){
        $admin = $this->db->get('admin')->row_array();
        if(password_verify($this->input->post('oldPassword'), $admin['password'])){
            if($this->input->post('newPassword') ==  $this->input->post('confirmPassword')){
                $pass = password_hash($this->input->post('newPassword'), PASSWORD_DEFAULT);
                $this->db->set('password', $pass);
                $this->db->update('admin');
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Password berhasil diubah',
                    icon: 'success'
                    });
                    </script>");
                redirect(base_url() . 'administrator/edit');
            }else{
                $this->session->set_flashdata('upload', "<script>
                    swal({
                    text: 'Konfirmasi password tidak sama. Silakan coba lagi',
                    icon: 'error'
                    });
                    </script>");
                redirect(base_url() . 'administrator/edit');
            }
        }else{
            $this->session->set_flashdata('upload', "<script>
                swal({
                text: 'Password lama salah. Silakan coba lagi',
                icon: 'error'
                });
                </script>");
            redirect(base_url() . 'administrator/edit');
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        delete_cookie('fkjrehs');
        redirect(base_url() . 'login');
    }


}