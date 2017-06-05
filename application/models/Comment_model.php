<?php
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function create_comment($filme_id){
			$data = array(
				'filme_id' => $filme_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'body' => $this->input->post('body')
			);
			return $this->db->insert('comments', $data);
		}
		public function get_comments($filme_id){
			$query = $this->db->get_where('comments', array('filme_id' => $filme_id));
			return $query->result_array();
		}
	}