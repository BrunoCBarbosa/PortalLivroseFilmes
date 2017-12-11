 <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <h4 class="navbar-brand">Portal Livros e Filmes - <?= $this->session->userdata('nome')?></h4>
      </nav>
     
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
              <?php if ($this->session->userdata('LOGADO')) { ?>
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?= $this->session->userdata('nome'); ?> 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a  href="<?= base_url('admin/acesso/configuracoes') ?>" >Configurações</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url('admin/acesso/logout') ?>" onclick="return confirm('Deseja realmente sair?')">Sair</a></li>
                        </ul>
                    </li>-->
                <?php } else { ?>
                    <li><a href="<?= base_url('admin/acesso/login') ?>">Entrar</a></li>
                <?php } ?>
                    
                    <img src="<?= base_url()?>dist/img/avatar.png" alt="avatar" height="150" width="150"> 
            <li class="nav-item">
              <a class="nav-link active" href="<?= base_url('admin') ?>">Página Inicial<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Livros</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="#">Filmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('admin/contatos') ?>">Contato</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/acesso/logout') ?>" onclick="return confirm('Deseja sair?')">Sair</a>
            </li>
          </ul>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
         
