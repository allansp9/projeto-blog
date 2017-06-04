<?php
	class Posts extends CI_Controller{
		public function index(){
			
			$data['title'] = 'latest posts';
			
			$data['posts'] = $this->post_model->get_posts(FALSE); 
			
			$this->load->view('includes/header');
			$this->load->view('posts/index', $data);
			$this->load->view('includes/footer');
		}
		
		public function myposts(){
			
			$user_id = $this->session->userdata('user_id');
			
			$data['title'] = 'My posts';
			
			$data['posts'] = $this->post_model->get_my_posts(FALSE, $user_id);
			
			$this->load->view('includes/header');
			$this->load->view('posts/myposts', $data);
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
			
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
		    $data['title'] = 'create post';
		    
		    $data['categories'] = $this->post_model->get_categories();
		    
		    $this->form_validation->set_rules('title', 'Título', 'required');
		    $this->form_validation->set_rules('body', 'Corpo', 'required');
		    
		    if($this->form_validation->run() === FALSE){
		        $this->load->view('includes/header');
			    $this->load->view('posts/create', $data);
			    $this->load->view('includes/footer'); 
		        
		    }else{
		    	//enviar imagem
		    	$config['upload_path'] = './assets/images/posts';
		    	$config['allowed_types'] = 'gif|jpg|png';
		    	$config['max_size'] = '2048';
		    	$config['max_width'] = '2000';
		    	$config['max_height'] = '2000';
		    	
		    	$this->load->library('upload', $config);
		    	
		    	if (!$this->upload->do_upload()) {
		    		$errors = array('error' => $this->upload->display_errors());
		    		$post_image = 'noimage.jpg';
		    	} else {
		    		$data = array('upload_data' => $this->upload->data());
		    		$post_image = $_FILES['userfile']['name'];
		    	}
		    
		        $this->post_model->create_post($post_image);
		        $this->session->set_flashdata('post_created', 'Post feito com sucesso!');
		        
		        redirect('posts');
		    }
		    
		}
		
		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
		    $this->post_model->delete_post($id);
		    
		    $this->session->set_flashdata('post_deleted', 'Post deletado com sucesso!');
		    
		    redirect('posts');
		    
		}
		
		public function edit($slug){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
			
		   $data['post'] = $this->post_model->get_posts($slug);
		   
		   if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){ //se o usuario tentando editar um post não for o mesmo que o criou
		   		redirect('posts');
		   }
		   
		   $data['categories'] = $this->post_model->get_categories();
		    
		    if(empty($data['post'])){
		        show_404();
		    }
		    
		    $data['title'] = 'Edit Post';
		    
		    $this->load->view('includes/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('includes/footer'); 
		}
		
		public function update(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
		    $this->post_model->update_post();
		    $this->session->set_flashdata('post_updated', 'Post atualizado com sucesso!');
		    
		    redirect('posts');
		}
	}