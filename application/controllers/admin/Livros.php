    <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Livros extends CI_Controller{
    
    public function validar_sessao() {
		if (!$this->session->userdata('LOGADO')) {
			redirect('admin/acesso');
		}
		return true;
	}
	
	public function index($alert=null) {
		$this->validar_sessao();
		$this->load->model('admin/livrosmodel');
		
		$data['livros'] = $this->livrosmodel->get_livro();
		if ($alert != null){
			$data['alert'] = $this->msg($alert);
                }
			$this->load->view('admin/includes/topo');
			$this->load->view('admin/includes/menu');
			$this->load->view('admin/listalivrosview', $data);
			$this->load->view('admin/includes/rodape');
	}
	
	public function cadastro() {
		$this->validar_sessao();
		$this->load->model('admin/livrosmodel', 'livros');
		$data = $this->livros->get_livro();
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/novanoticialivroview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function atualizacao($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/livrosmodel', 'livros');
		
		//$data = $this->livros->get_livro();
		$data['livro'] = $this->livros->get_livros($codigo);
		
		
		$this->load->view('admin/includes/topo');
		$this->load->view('admin/includes/menu');
		$this->load->view('admin/atualizalivroview', $data);
		$this->load->view('admin/includes/rodape');
	
	}
	
	public function salvar() {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$info['titulo'] = $this->input->post('titulo');
		$info['autor'] = $this->input->post('autor');
		//$data['slug_noticia'] = $this->input->post('slug');
		$info['classificacao'] = $this->input->post('classificacao');
		$data = explode('/', $this->input->post('data'));
                $info['data'] = $data[2].'-'.$data[1].'-'.$data[0];
                $info['editora'] = $this->input->post('editora');
                $info['sinopse'] = $this->input->post('sinopse');
		$info['imagem'] = $this->upload_imagem();
		
		
		$result = $this->bancomodel->insert('livros', $info);
		if ($result) {
			redirect('admin/livros/1');
		} else {
			redirect('admin/livros/2');
		}
	}
	
	public function salvar_update() {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$info['titulo'] = $this->input->post('titulo');
		$info['autor'] = $this->input->post('autor');
		$info['classificacao'] = $this->input->post('classificacao');
		$data = explode('/', $this->input->post('data'));
                $info['data'] = $data[2].'-'.$data[1].'-'.$data[0];
                $info['editora'] = $this->input->post('editora');
                $info['sinopse'] = $this->input->post('sinopse');
		
		//A funcção upload_imagem() tentará fazer o upload de uma imagem. Caso o usuario não tenha
		//selecionado alguma imagem, a função irá retornar null. Sendo assim, não será necessário
		// atualizar o campo 'imagem_noticia', somente quando a função retornar o nome de uma imagem.
		$upload = $this->upload_imagem();
		if ($upload != null) {
			$info['imagem'] = $upload;
		}
		
                $codigo = $this->input->post('codigo');
		
		$result = $this->bancomodel->update('livros', $info, $codigo);
		if ($result) {
			redirect('admin/livros/5');
		} else {
			redirect('admin/livros/6');
		}
	}
	
	public function deletar($codigo) {
		$this->validar_sessao();
		$this->load->model('admin/bancomodel');
		$result = $this->bancomodel->delete('livros', $codigo);
		if ($result) {
			redirect('admin/livros/3');
		} else {
			redirect('admin/livros/4');
		}
	}
	
	function upload_imagem() {
		
		$caminho = './imagens/livros';
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
			$data = $this->db->get('livros')->result();
			
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
			
			$config['width'] = 200;
			$config['height'] = 200;
			
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
                    $str = 'success- livro cadastrado com sucesso!';
		else if ($alert == 2)
                    $str = 'danger-Não foi possível cadastrar o livro. Por favor, tente novamente!';
		else if ($alert == 3)
                    $str = 'success-Livro removido com sucesso!';
		else if ($alert == 4)
                    $str = 'danger-Não foi possível remover a livro. Por favor, tente novamente!';
		else if ($alert == 5)
                    $str = 'success-Livro atualizado com sucesso!';
		else if ($alert == 6)
                    $str = 'danger-Não foi possível atualizar o livro. Por favor, tente novamente!';
		else
                    $str = null;
                
		return $str;
	}
        
        
	
	
}

