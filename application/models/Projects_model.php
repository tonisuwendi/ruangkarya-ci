<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects_model extends CI_Model {

    public function getProjects($number,$offset){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        return $this->db->get("projects", $number,$offset);
    }

    public function getProjectById($id){
        $this->db->select("*, projects.name AS pName, projects.id AS pId");
        $this->db->from("projects");
        $this->db->join("categories", "projects.category=categories.id");
        $this->db->order_by('projects.id', "desc");
        $this->db->where('projects.id', $id);
        return $this->db->get()->row_array(); 
    }

    public function uploadFile($type){
        $config['upload_path'] = './assets/images/projects/';
        if($type == '1'){
            $config['allowed_types'] = 'jpg|png|jpeg';
        }else{
            $config['allowed_types'] = 'gif';
        }
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

    public function insertProjects($nameFile){
        $name = $this->input->post('name');
        $category = $this->input->post('category');
        $file = $nameFile;
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
            "slug" => $slug . '-' . rand(),
            "date_input" => $date
        ];
        $this->db->insert('projects', $data);
    }

    public function updateProject($nameFile, $id){
        $name = $this->input->post('name');
        $file = $nameFile;
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
            "file" => $file
        ];
        $this->db->where('id', $id);
        $this->db->update('projects', $data);
    }

}