<?php
    class User_model extends CI_Model{
        public function register($enc_password){
            
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => $enc_password
            );
            
            return $this->db->insert('users', $data);
        }
        
        public function login($username, $password){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            
            $result = $this->db->get('users'); //mesma coisa que get users where username and password
            
            if($result->num_rows() == 1){ //se retornar 1 é porque o usuario existe no banco
                return $result->row(0)->id; // retorna a id do usuario
            }else {
                return false;
            }
        }
        
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            
            if(empty($query->row_array())){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));
            
            if(empty($query->row_array())){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function get_name($id){
            $query = $this->db->get_where('users', array('id' => $id));
            
            return $query->row();
        }
    }