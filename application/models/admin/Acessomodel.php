<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AcessoModel extends CI_Model {
	
	public function logar($email, $senha) {
		$this->db->where('email', $email);
		$this->db->where('senha', $senha);
		return $this->db->get('usuarios')->result();
	}
	
}