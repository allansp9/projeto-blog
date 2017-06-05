<?php
    class Lista_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        
        public function create_lista(){
            $data = array(
                    'name' => $this->input->post('name'),
                    'user_id' => $this->session->userdata('user_id')
                );
            return $this->db->insert('listas', $data);
        }
        public function get_listas($user_id){
            $this->db->order_by('name');
            $query = $this->db->get_where('listas', array('user_id' => $user_id));
            return $query->result_array();
        }
        
        public function get_lista($id){
            $query = $this->db->get_where('listas', array('id' => $id));
            
            return $query->row();
        }
        
        public function delete_lista($id){
			$this->db->where('id', $id);
			$this->db->delete('listas');
			return true;
        }
        
        
    }