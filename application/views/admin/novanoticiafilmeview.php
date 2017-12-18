<h1>Cadastrar Filme</h1>
<form action="<?= base_url('admin/filmes/salvar')?>" method="post" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo">
          
        </div>
        <div class="col-sm-7">
            <label for="autor">Diretor</label>
            <input type="text" class="form-control" name="diretor">
        </div>
          <div class="col-sm-5">
            <label for="editora">Elenco</label>
            <input type="text" class="form-control" name="elenco">
         </div>
        <div class="col-sm-4">
            <label for="data">Data de Lançamento</label>
            <input type="text" class="form-control" placeholder="__/__/____" name="data">
        </div>  
        <div class="col-sm-4">
            <label for="classificacao">Classificação</label>
            <input type="text" class="form-control"name="classificacao">
        </div>
        <div class="col-sm-4">
            <label for="imagem">Imagem</label>
            <input type="file" id="imagem" name="imagem">
        </div>
    
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="sinopse">Sinopse</label>
            <textarea class="form-control" rows="9" name="sinopse"></textarea>
        </div>   
    </div>   
    <button type="submit" class="btn btn-success">Enviar</button>
    <button type="reset" class="btn btn-info" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>