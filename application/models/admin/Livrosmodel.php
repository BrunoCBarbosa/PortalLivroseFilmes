<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livrosmodel extends CI_Model {
	
	
//	public function get_livro($limit = null) {
//		$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
//		if ($limit != null) {
//			$this->db->limit($limit);
//		}
//		$this->db->order_by('cod_noticia','DESC');
//		$result = $this->db->get('noticias')->result();
//		return $result;
//	}
//	
//	public function get_livros() {
//		$this->db->select('*');
//                $this->db->from('livros');
//		$result = $this->db->get('livros')->result();
//		return $result;
//	}
//	
	public function get_noticia_slug($slug) {
		$this->db->join('tipos', 'cod_tipo = tipos_cod_tipo', 'inner');
		$this->db->where('slug_noticia', $slug);
		$result = $this->db->get('noticias')->result();
		return $result;
	}
	
	public function get_livros() {
		$result = $this->db->get('livros')->result();
		return $result;
	}
}