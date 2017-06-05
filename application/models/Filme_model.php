<?php
    class Filme_model extends CI_Model{
    
        public function __construct(){
            $this->load->database();
        }
        
        public function create_filme($filme_image){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'lista_id' => $this->input->post('lista_id'),
                'user_id' => $this->session->userdata('user_id'),
                'filme_image' => $filme_image
            );
            
            return $this->db->insert('filmes', $data);
        }
        
        public function update_filme(){
            $slug = url_title($this->input->post('title'));
            
            $data = array(
                'title' => $this->input->post('title'),
                'slug' => $slug,
                'body' => $this->input->post('body'),
                'lista_id' => $this->input->post('lista_id')
            );
            
            $this->db->where('id', $this->input->post('id'));
            return $this->db->update('filmes', $data);
        }
        
        public function delete_filme($id){
			$image_file_name = $this->db->select('filme_image')->get_where('filmes', array('id' => $id))->row()->filme_image;
			$cwd = getcwd(); // salva o diretório atual
			$image_file_path = $cwd."\\assets\\images\\filmes\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // volta pro diretório
			$this->db->where('id', $id);
			$this->db->delete('filmes');
			return true;
        }        
        
        public function get_filmes($slug = FALSE){
            if($slug === FALSE){
                $this->db->order_by('filmes.id', 'DESC');
                $this->db->join('users','users.id = filmes.user_id'); //junta a tabela listas com a tabela filmes onde listas.id = filmes.lista_id
                $query = $this->db->get('filmes');
                return $query->result_array();
            }
            
            $query = $this->db->get_where('filmes', array('slug' => $slug));
            return $query->row_array();
        }
        
        public function get_listas($user_id){
            $this->db->order_by('name');
            $query = $this->db->get_where('listas', array('user_id' => $user_id));
            return $query->result_array();
            
        }
        
        public function get_filmes_by_lista($lista_id){
            $this->db->order_by('filmes.id', 'DESC');
            $this->db->join('listas', 'listas.id = filmes.lista_id');
            $query = $this->db->get_where('filmes', array('lista_id' => $lista_id));
            return $query->result_array();
        }
    }