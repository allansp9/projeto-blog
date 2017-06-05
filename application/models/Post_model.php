<?php
    class Post_model extends CI_Model{
    
        public function __construct(){
            $this->load->database();
        }
        
        public function create_post($post_image){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
            );
            
            return $this->db->insert('posts', $data);
        }
        
        public function update_post(){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id')
            );
            
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('posts', $data);
        }
        
        public function delete_post($id){
			$image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
			$cwd = getcwd(); // salva o diretório atual
			$image_file_path = $cwd."\\assets\\images\\posts\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // volta pro diretório
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
        }        
        
        public function get_posts($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('users','users.id = posts.user_id'); //junta a tabela categories com a tabela posts onde categories.id = posts.category_id
                $query = $this->db->get('posts');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('posts', array('slug' => $slug));
            return $query->row_array();
        }
        
        public function get_categories($user_id){
            $this->db->order_by('name');
            $query = $this->db->get_where('categories', array('user_id' => $user_id));
            return $query->result_array();
            
        }
        
        public function get_posts_by_category($category_id){
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id');
            $query = $this->db->get_where('posts', array('category_id' => $category_id));
            return $query->result_array();
        }
    }