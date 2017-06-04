<?php
    class Users extends CI_Controller{
        public function register(){
            $data['title'] = 'Cadastre-se';
            
            $this->form_validation->set_rules('name', 'Nome', 'required');
            $this->form_validation->set_rules('username', 'Usuário', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Senha', 'required');
            $this->form_validation->set_rules('password2', 'Confirmar Senha', 'matches[password]');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('includes/header');
                $this->load->view('users/register', $data);
                $this->load->view('includes/footer');
            } else {
                $enc_password = md5($this->input->post('password'));
                
                $this->user_model->register($enc_password);
                
                $this->session->set_flashdata('user_registered', 'Cadastro efetuado com sucesso!');
                
                redirect('posts');
            }
            
        }
        
        public function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'Nome de usuário já cadastrado. Escolha outro.');
            
            if($this->user_model->check_username_exists($username)){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'Email já cadastrado. Escolha outro.');
            
            if($this->user_model->check_email_exists($email)){
                return true;
            }
            else{
                return false;
            }
        }
    }