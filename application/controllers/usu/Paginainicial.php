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
	
	
        
        public function livros ($codigo = null) {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		if ($codigo == null) {
			$this->load->model('admin/livrosmodel');
			$data['livros'] = $this->livrosmodel->get_livro();
			$this->load->view('usu/livrosview',$data);
		} else {
			$this->load->model('admin/livrosmodel');
                        $data['livro'] = $this->livrosmodel->get_livros($codigo);
                        $this->load->view('usu/livroview',$data);
		}
		$this->load->view('usu/includes/rodape');
	}
        
        public function filmes ($codigo = null) {
		$this->load->view('usu/includes/topo');
		$this->load->view('usu/includes/menu');
		if ($codigo == null) {
			$this->load->model('admin/filmesmodel');
			$data['filmes'] = $this->filmesmodel->get_filme();
			$this->load->view('usu/filmesview',$data);
		} else {
			$this->load->model('admin/filmesmodel');
                        $data['filme'] = $this->filmesmodel->get_filmes($codigo);
                        $this->load->view('usu/filmeview',$data);
		}
		$this->load->view('usu/includes/rodape');
	}


}