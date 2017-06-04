<?php
    class Category_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function create_category(){
            $data = array(
                    'name' => $this->input->post('name')
                );
            return $this->db->insert('categories', $data);
        }
        public function get_categories($user_id){
            $this->db->order_by('name');
            $query = $this->db->get_where('categories', array('user_id' => $user_id,));
            return $query->result_array();
        }
        
        public function get_category($id){
            $query = $this->db->get_where('categories', array('id' => $id));
            
            return $query->row();
        }
        
        
    }