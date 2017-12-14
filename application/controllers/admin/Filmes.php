<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Filmes extends CI_Controller{
    
    public function validar_sessao() {
		if (!$this->session->userdata('LOGADO')) {
			redirect('admin/acesso');
		}
		return true;
	}
	
	public function index($alert=null) {
		$this->validar_sessao();
		$this->load->model('admin/filmesmodel');
		
		$data['filmes'] = $this->filmesmodel->get_filme();
		if ($alert != null)
			$data['alert'] = $this->msg($alert);
			
			$this->load->view('admin/includes/topo');
			$this->load->view('admin/includes/menu');
			$this->load->view('admin/listafilmesview', $data);
			$this->load->view('admin/includes/rodape');
	}
	
	public function cadastro() {
		$this->validar_sessao();
		$this->load->model('admin/filmesmodel', 'filmes');
		$data = $this->filmes->get_filme();
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/novanoticiafilmeview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function atualizacao($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/filmesmodel', 'filmes');
		
		//$data = $this->livros->get_livro();
		$data['filme'] = $this->filmes->get_filmes($codigo);
		
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/atualizafilmeview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function salvar() {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$info['titulo'] = $this->input->post('titulo');
		$info['diretor'] = $this->input->post('diretor');
		//$data['slug_noticia'] = $this->input->post('slug');
		$info['elenco'] = $this->input->post('elenco');
                $data = explode('/', $this->input->post('data'));
                $info['data'] = $data[2].'-'.$data[1].'-'.$data[0];
                $info['classificacao'] = $this->input->post('classificacao');
		$info['imagem'] = $this->upload_imagem();
		$info['sinopse'] = $this->input->post('sinopse');
		
		
		$result = $this->bancomodel->insert('filmes', $info);
		if ($result) {
			redirect('admin/filmes/1');
		} else {
			redirect('admin/filmes/2');
		}
	}
	
	public function salvar_update() {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$info['titulo'] = $this->input->post('titulo');
		$info['diretor'] = $this->input->post('diretor');
		//$data['slug_noticia'] = $this->input->post('slug');
		$info['classificacao'] = $this->input->post('classificacao');
		$info['elenco'] = $this->input->post('elenco');
		
		//A funcção upload_imagem() tentará fazer o upload de uma imagem. Caso o usuario não tenha
		//selecionado alguma imagem, a função irá retornar null. Sendo assim, não será necessário
		// atualizar o campo 'imagem_noticia', somente quando a função retornar o nome de uma imagem.
		$upload = $this->upload_imagem();
		if ($upload != null) {
			$data['imagem'] = $upload;
		}
		
		$data = explode('/', $this->input->post('data'));
                $info['data'] = $data[2].'-'.$data[1].'-'.$data[0];
		
		$codigo = $this->input->post('codigo');
		
		$result = $this->bancomodel->update('filmes', $info, $codigo);
		if ($result) {
			redirect('admin/filmes/5');
		} else {
			redirect('admin/filmes/6');
		}
	}
	
	public function deletar($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$result = $this->bancomodel->delete('filmes', $codigo);
		if ($result) {
			redirect('admin/filmes/3');
		} else {
			redirect('admin/filmes/4');
		}
	}
	
	function upload_imagem() {
		
		$caminho = './imagens/filmes';
		$config['upload_path'] = $caminho;
		$config['allowed_types'] = "gif|jpg|jpeg|png";
		$config['max_size'] = "5000";
		$config['max_width'] = "5907";
		$config['max_height'] = "5280";
		$config['encrypt_name'] = true;
		
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload("imagem")) {
			
			//            $error = array('error' => $this->upload->display_errors());
			//            echo '[' . realpath($config['upload_path']) . ']<br>';
			//            print_r($error);
			//            exit();
			return null;
		} else {
			//Deletar foto existente para subir a nova imagem
			$codigo = $this->input->post('codigo');
			$this->db->select('codigo,imagem');
			$this->db->where('codigo', $codigo);
			$data = $this->db->get('filmes')->result();
			
			if (isset($data[0]->imagem)) {
				unlink(realpath($caminho) . '/' . $data[0]->imagem);
			}
			// Fim do código de deletar a imagem
			
			$data = array('upload_data' => $this->upload->data());
			$config['image_library'] = 'GD2';
			$config['source_image'] = $caminho . '/' . $data['upload_data']['file_name'];
			$config['create_thumb'] = false;
			$config['maintain_ratio'] = false; //Redimensiona a imagem sem desconfiguralá-la;
			$config['quality'] = "100%";
			
			$config['width'] = 740;
			$config['height'] = 500;
			
			//Redimena a imagem
			$this->load->library('image_lib', $config);
			if (!$this->image_lib->resize()) {
				//Caso ocorrer algum erro, o CodeIgniter mostra na tela o que ocorreu.
				echo $this->image_lib->display_errors();
				exit();
			}
			return $data['upload_data']['file_name'];
		}
	}
	
	public function msg($alert) {
		$str = '';
		if ($alert == 1)
			$str = 'success- filme cadastrado com sucesso!';
			else if ($alert == 2)
				$str = 'Não foi possível cadastrar o filme. Por favor, tente novamente!';
				else if ($alert == 3)
					$str = 'Filme removido com sucesso!';
					else if ($alert == 4)
						$str = 'Não foi possível remover a filme. Por favor, tente novamente!';
						else if ($alert == 5)
						$str = 'Filme atualizado com sucesso!';
						else if ($alert == 6)
							$str = 'Não foi possível atualizar o filme. Por favor, tente novamente!';
							else
								$str = null;
								return $str;
	}
	
}

