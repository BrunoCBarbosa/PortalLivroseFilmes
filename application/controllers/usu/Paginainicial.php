<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Paginainicial extends CI_Controller{
    
        public function index(){
                $this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		$this->load->model('admin/livrosmodel');
		$data['livros'] = $this->livrosmodel->get_livro();
		$this->load->view('usu/paginainicialview');
		$this->load->view('usu/includes/rodape');

	}
	
	
        
        public function livros ($titulo = null) {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		if ($titulo == null) {
			$this->load->model('admin/livrosmodel');
			$data['livros'] = $this->livrosmodel->get_livro();
			$this->load->view('usu/livrosview',$data);
		} else {
			$this->load->model('admin/livrosmodel');
                        $data['livros'] = $this->livrosmodel->get_livro();
                        $this->load->view('usu/livroview',$data);
		}
		$this->load->view('usu/includes/rodape');
	}
        
        public function filmes ($titulo = null) {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		if ($titulo == null) {
			$this->load->model('admin/filmesmodel');
			$data['livros'] = $this->filmesmodel->get_filme();
			$this->load->view('usu/filmesview',$data);
		} else {
			$this->load->model('admin/filmesmodel');
                        $data['filmes'] = $this->filmesmodel->get_filme();
                        $this->load->view('usu/filmeview',$data);
		}
		$this->load->view('usu/includes/rodape');
	}


        public function contato() {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		$this->load->view('usu/contatoview');
		$this->load->view('usu/includes/rodape');
	}
}