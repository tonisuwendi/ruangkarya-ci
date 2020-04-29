<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_model extends CI_Model {

    public function getCategories(){
        return $this->db->get('categories');
    }

    public function getCategoryById($id){
        $this->db->where('id', $id);
        return $this->db->get('categories')->row_array();
    }
    
    public function insertCategory(){
        $name = $this->input->post('name', true);
        $type = $this->input->post('type', true);
        $data = [
            'name' => $name,
            'type' => $type
        ];
        $this->db->insert('categories', $data);
    }

    public function updateCategory($id){
        $name = $this->input->post('name', true);
        $type = $this->input->post('type', true);
        $data = [
            'name' => $name,
            'type' => $type
        ];
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }

}