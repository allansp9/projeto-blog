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
                
                redirect('home');
            }
            
        }
        
        public function login(){
            $data['title'] = 'Entrar';
            
            $this->form_validation->set_rules('username', 'Usuário', 'required');
            $this->form_validation->set_rules('password', 'Senha', 'required');
            
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('includes/header');
                $this->load->view('users/login', $data);
                $this->load->view('includes/footer');
            } else {
                
                $username = $this->input->post('username');
                $password = md5($this->input->post('password'));
                
                $user_id = $this->user_model->login($username, $password);
                
                if($user_id){
                    
                    $user_data = array(
                      'user_id' => $user_id,
                      'username' => $username,
                      'logged_in' => true
                    );
                    
                    $this->session->set_userdata($user_data);
                    
                    redirect('home');
                    
                }else{
                    $this->session->set_flashdata('login_failed', 'Usuário ou Senha incorretos'); 
                }
                 redirect('users/login');
            }
            
        }
        
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
            
            redirect('home');
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