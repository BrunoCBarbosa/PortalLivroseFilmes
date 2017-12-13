<h1>Atualizar Livro </h1>
<form action="<?= base_url('admin/livros/salvar_update')?>" method="post" enctype="multiplart/form-data">
    <input type="hidden" name="codigo" value="<?= $livro[0]->codigo?>">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo" value="<?= $livro[0]->titulo;?>">
          
        </div>
        <div class="col-sm-7">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor" value="<?= $livro[0]->autor;?>">
        </div>
          <div class="col-sm-5">
            <label for="editora">Editora</label>
            <input type="text" class="form-control" name="editora" value="<?= $livro[0]->editora;?>">
         </div>
        <div class="col-sm-4">
            <label for="data">Data da Publicação</label>
            <input type="text" class="form-control" placeholder="__/__/____" name="data" value="<?= date('d/m/y',strtotime($livro[0]->data));?>">
        </div>  
        <div class="col-sm-4">
            <label for="classificacao">Classificação</label>
            <input type="text" class="form-control" name="classificacao" value="<?= $livro[0]->classificacao;?>">
        </div>
        <div class="col-sm-4">
            <label for="imagem">Imagem</label>
            <input type="file" id="imagem" name="imagem">
        </div>
    
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="sinopse">Sinopse</label>
            <textarea class="form-control" rows="9" name="sinopse"><?= $livro[0]->sinopse;?></textarea>   
        </div>   
    </div>   
    <button type="submit" class="btn btn-success">Enviar</button>
</form>