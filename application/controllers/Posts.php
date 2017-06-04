<?php
	class Posts extends CI_Controller{
		public function index(){
			
			$data['title'] = 'latest posts';
			
			$data['posts'] = $this->post_model->get_posts();
			
			$this->load->view('includes/header');
			$this->load->view('posts/index', $data);
			$this->load->view('includes/footer');
		}
		
		public function view($slug = NULL){
		    $data['post'] = $this->post_model->get_posts($slug);
		    
		    if(empty($data['post'])){
		        show_404();
		    }
		    
		    $data['title'] = $data['post']['title'];
		    
		    $this->load->view('includes/header');
			$this->load->view('posts/view', $data);
			$this->load->view('includes/footer');
		}
		
		public function create(){
		    $data['title'] = 'create post';
		    
		    $data['categories'] = $this->post_model->get_categories();
		    
		    $this->form_validation->set_rules('title', 'Título', 'required');
		    $this->form_validation->set_rules('body', 'Corpo', 'required');
		    
		    if($this->form_validation->run() === FALSE){
		        $this->load->view('includes/header');
			    $this->load->view('posts/create', $data);
			    $this->load->view('includes/footer'); 
		        
		    }else{
		        $this->post_model->create_post();
		        redirect('posts');
		    }
		    
		}
		
		public function delete($id){
		    $this->post_model->delete_post($id);
		    redirect('posts');
		    
		}
		
		public function edit($slug){
		   $data['post'] = $this->post_model->get_posts($slug);
		    
		    if(empty($data['post'])){
		        show_404();
		    }
		    
		    $data['title'] = 'Edit Post';
		    
		    $this->load->view('includes/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('includes/footer'); 
		}
		
		public function update(){
		    $this->post_model->update_post();
		    redirect('posts');
		}
	}