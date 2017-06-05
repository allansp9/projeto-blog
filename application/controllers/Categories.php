<?php
    class Categories extends CI_Controller{
        
        public function index(){
            $data['title'] = 'Categorias';
            $user_id = $this->session->userdata('user_id');
            $data['categories'] = $this->category_model->get_categories($user_id);
            
            $this->load->view('includes/header');
            $this->load->view('categories/index', $data);
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
                $this->load->view('categories/create', $data);
                $this->load->view('includes/footer');
            }
            else{
                $this->category_model->create_category();
                redirect('categories');
            }
        }
        
        public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
		    $this->category_model->delete_category($id);
		    
		    redirect('categories');
		    
		}
        
        public function posts($id){
            if($this->session->userdata('user_id') != $this->category_model->get_category($id)->user_id){
				redirect('posts');
			}
            $data['title'] = $this->category_model->get_category($id)->name;
            
            $data['posts'] = $this->post_model->get_posts_by_category($id);
            
            $this->load->view('includes/header');
            $this->load->view('posts/index', $data);
            $this->load->view('includes/footer');
        }
    }