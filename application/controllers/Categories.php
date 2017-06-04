<?php
    class Categories extends CI_Controller{
        
        public function index(){
            $data['title'] = 'Categorias';
            
            $data['categories'] = $this->category_model->get_categories();
            
            $this->load->view('includes/header');
            $this->load->view('categories/index', $data);
            $this->load->view('includes/footer');
        }
        
        public function posts($id){
            $data['title'] = $this->category_model->get_category($id)->name;
            
            $data['posts'] = $this->post_model->get_posts_by_category($id);
            
            $this->load->view('includes/header');
            $this->load->view('posts/index', $data);
            $this->load->view('includes/footer');
        }
    }