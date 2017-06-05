<?php
    class Listas extends CI_Controller{
        
        public function index(){
            $data['title'] = 'Minhas Listas';
            $user_id = $this->session->userdata('user_id');
            $data['listas'] = $this->lista_model->get_listas($user_id);
            
            $this->load->view('includes/header');
            $this->load->view('listas/index', $data);
            $this->load->view('includes/footer');
        }
        
        public function create(){
            
            if(!$this->session->userdata('logged_in')){
                redirect('users/login');
            }
            $data['title'] = 'Criar Lista';
            
            $this->form_validation->set_rules('name', 'Nome', 'required');
            
            if($this->form_validation->run() === FALSE){
                $this->load->view('includes/header');
                $this->load->view('listas/create', $data);
                $this->load->view('includes/footer');
            }
            else{
                $this->lista_model->create_lista();
                redirect('listas');
            }
        }
        
        public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
		    $this->lista_model->delete_lista($id);
		    
		    redirect('listas');
		    
		}
        
        public function filmes($id){
            if($this->session->userdata('user_id') != $this->lista_model->get_lista($id)->user_id){
				redirect('filmes');
			}
            $data['title'] = $this->lista_model->get_lista($id)->name;
            
            $data['filmes'] = $this->filme_model->get_filmes_by_lista($id);
            
            $this->load->view('includes/header');
            $this->load->view('filmes/index', $data);
            $this->load->view('includes/footer');
        }
    }