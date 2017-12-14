<div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <h4>Menu - </h4>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url()?>">Página Inicial<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('livros')?>">Livros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('filmes')?>">Filmes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contato</a>
            </li>
            
          </ul>
        </div>
      </nav>
