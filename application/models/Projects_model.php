<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {

    public function getProjects($number,$offset){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        return $this->db->get("projects", $number,$offset);
    }

    public function getProjectsByCategory($number,$offset,$id){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        $this->db->where('projects.category', $id);
        return $this->db->get("projects", $number,$offset);
    }

    public function searchProjects($q){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        $this->db->like('projects.name', $q);
        $this->db->or_like('categories.name', $q);
        return $this->db->get("projects");
    }

    public function getProjectById($id){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->from("projects");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        $this->db->where('projects.id', $id);
        return $this->db->get()->row_array(); 
    }

    public function getProjectBySlug($slug){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->from("projects");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        $this->db->where('projects.slug', $slug);
        return $this->db->get()->row_array(); 
    }

    public function getAllProjectsNotSlug($slug){
        $this->db->limit(7);
        $this->db->order_by('id', 'desc');
        $this->db->where('projects.slug !=', $slug);
        return $this->db->get("projects"); 
    }

    public function uploadFile($type){
        if($type == '5'){
            $config['upload_path'] = './assets/images/bg/';
        }else if($type == '6'){
            $config['upload_path'] = './assets/images/logo/';
        }else{
            $config['upload_path'] = './assets/images/projects/';
        }
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true)*1000);

        $this->load->library('upload', $config);
        if($this->upload->do_upload('file'.$type)){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function insertProjects($nameFile, $nameFile1){
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $file = $nameFile;
        $file2 = $nameFile1;
        $linkyt = $this->input->post('linkyt');
        $description = $this->input->post('description');
        function textToSlug($text='') {
            $text = trim($text);
            if (empty($text)) return '';
            $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
            $text = strtolower(trim($text));
            $text = str_replace(' ', '-', $text);
            $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
            return $text;
        }
        $slug =  textToSlug($name);
        $date = date("Y-m-d H:i:s");
        $data = [
            "name" => $name,
            "category" => $category,
            "file" => $file,
            "file2" => $file2,
            "linkyt" => $linkyt,
            "description" => $description,
            "slug" => $slug . '-' . rand(),
            "date_input" => $date
        ];
        $this->db->insert('projects', $data);
    }

    public function updateProject($nameFile, $id){
        $name = $this->input->post('name');
        $file = $nameFile;
        $description = $this->input->post('description');
        function textToSlug($text='') {
            $text = trim($text);
            if (empty($text)) return '';
            $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
            $text = strtolower(trim($text));
            $text = str_replace(' ', '-', $text);
            $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
            return $text;
        }
        $data = [
            "name" => $name,
            "file" => $file,
            "description" => $description
        ];
        $this->db->where('id', $id);
        $this->db->update('projects', $data);
    }

}