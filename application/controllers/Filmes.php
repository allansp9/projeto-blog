<?php
	class Filmes extends CI_Controller{
		public function index($page = 'index'){
			
			if(!file_exists(APPPATH.'views/filmes/'.$page.'.php')){
				show_404();
			}
			
			$data['title'] = 'Atividade recente';
			$data['filmes'] = $this->filme_model->get_filmes(FALSE); 
			
			$this->load->view('includes/header');
			$this->load->view('filmes/index', $data);
			$this->load->view('includes/footer');
		}

		public function view($slug = NULL){
		    $data['filme'] = $this->filme_model->get_filmes($slug);
		    $filme_id = $data['filme']['id'];
		    $data['comments'] = $this->comment_model->get_comments($filme_id);
		    
		    if(empty($data['filme'])){
		        show_404();
		    }
		    
		    $data['title'] = $data['filme']['title'];
		    
		    $this->load->view('includes/header');
			$this->load->view('filmes/view', $data);
			$this->load->view('includes/footer');
		}
		
		public function create(){
			
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
			$user_id = $this->session->userdata('user_id');
		    $data['title'] = 'Adicionar filme';
		    
		    $data['listas'] = $this->filme_model->get_listas($user_id);
		    
		    $this->form_validation->set_rules('title', 'Título', 'required');
		    $this->form_validation->set_rules('body', 'Corpo', 'required');
		    
		    if($this->form_validation->run() === FALSE){
		        $this->load->view('includes/header');
			    $this->load->view('filmes/create', $data);
			    $this->load->view('includes/footer'); 
		        
		    }else{
		    	//enviar imagem
		    	$config['upload_path'] = './assets/images/filmes';
		    	$config['allowed_types'] = 'gif|jpg|png';
		    	$config['max_size'] = '2048';
		    	$config['max_width'] = '3000';
		    	$config['max_height'] = '3000';
		    	
		    	$this->load->library('upload', $config);
		    	
		    	if (!$this->upload->do_upload()) {
		    		$errors = array('error' => $this->upload->display_errors());
		    		$filme_image = 'noimage.jpg';
		    	} else {
		    		$data = array('upload_data' => $this->upload->data());
		    		$filme_image = $_FILES['userfile']['name'];
		    	}
		    
		        $this->filme_model->create_filme($filme_image);
		        $this->session->set_flashdata('filme_created', 'Filme adicionado com sucesso!');
		        
		        redirect('filmes');
		    }
		    
		}
		
		public function delete($id){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
		    $this->filme_model->delete_filme($id);
		    
		    $this->session->set_flashdata('filme_deleted', 'Filme deletado com sucesso!');
		    
		    redirect('filmes');
		    
		}
		
		public function edit($slug){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
				
			}
			
			$data['filme'] = $this->filme_model->get_filmes($slug);
		   
		  if($this->session->userdata('user_id') != $this->filme_model->get_filmes($slug)['user_id']){ //se o usuario tentando editar um filme não for o mesmo que o criou
		  		redirect('filmes');
		  }
		  
		  $user_id = $this->session->userdata('user_id'); 
		  $data['listas'] = $this->filme_model->get_listas($user_id);
		    
		    if(empty($data['filme'])){
		        show_404();
		    }
		    
		    $data['title'] = 'Edit filme';
		    
		    $this->load->view('includes/header');
			$this->load->view('filmes/edit', $data);
			$this->load->view('includes/footer'); 
		}
		
		public function update(){
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			
		    $this->filme_model->update_filme();
		    $this->session->set_flashdata('filme_updated', 'Filme atualizado com sucesso!');
		    
		    redirect('filmes');
		}
	}