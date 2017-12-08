<?php

class Contatos extends CI_Controller{
    
    public function validar_sessao(){
        if(!$this->session->userdata('LOGADO')){
            redirect('admin/acesso');
        }
        return true;
    }
    
    public function index($alert=null){
        $this->validar_sessao();
        
        $data = null;
        if($alert != null){
            $data['alert'] = $this->msg($alert);
            
            $this->load->view('admin/includes/topo');
            $this->load->view('admin/includes/menu');
            $this->load->view('admin/contatosview',$data);
            $this->load->view('admin/includes/rodape');

                     
        }
    }
}