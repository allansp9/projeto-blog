<?php
	class Comments extends CI_Controller{
		public function create($filme_id){
			$slug = $this->input->post('slug');
			$data['filme'] = $this->filme_model->get_filmes($slug);
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			if($this->form_validation->run() === FALSE){
				redirect('filmes/'.$slug);
			} else {
				$this->comment_model->create_comment($filme_id);
				redirect('filmes/'.$slug);
			}
		}
	}