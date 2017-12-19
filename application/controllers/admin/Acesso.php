<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Acesso extends CI_Controller{
    
    public function validar_sessão(){
        if(!$this->session->userdata('LOGADO')){
            redirect('admin/acesso');
        }
        return true;
    }
    
    public function index(){
        if($this->validar_sessão()){
            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/painelview');
            $this->load->view('admin/includes/rodape');
        }else{
            redirect('admin/acesso');
        }
    }
   
    public function login($alert = null){
        if($this->session->userdata('LOGADO')){
            redirect ('admin');
        }
        $dados = null;
        if($alert != null){
            $dados['alert'] = $this->msg($alert);
        }
        $this->load->view('admin/acessoview',$dados);
    }
    
    public function logar(){
        $this->load->model('admin/acessomodel');
        
        $cpf = $this->input->post('cpf');
        $senha = md5($this->input->post('senha'));
        $usuario = $this->acessomodel->logar($cpf,$senha);
        
        if(count($usuario) === 1){
        //    $dados['codigo'] = $usuario[0]->codigo;
            $dados['nome'] = $usuario[0]->nome;
            $dados['LOGADO'] = TRUE;
            $dados['foto'] = $usuario[0]->foto;
            
            $this->session->set_userdata($dados);
            redirect("admin/");
        }else{
            redirect("admin/acesso/2");
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('admin/acesso');
    }
    
    public function configuracoes(){
        $this->validar_sessão();
        
        $this->load->view('admin/includes/topo');
        $this->load->view('admin/includes/menu');
        $this->load->view('admin/configuracoesview');
        $this->load->view('admin/includes/rodape');
    }
    
    
    public function msg($alert){
        $str = '';
        if($alert == 1){
            $str = 'success - Login realizado com sucesso!';
        }elseif($alert == 2){
            $str = 'danger - Não foi possível entrar. Verifique o email e a senha e tente novamente!';
        }else{
            $str = null;
        }
        return $str;
    }
}