<h1>Cadastrar Filme</h1>
<form action="<?= base_url('admin/livros/salvar')?>" method="post" enctype="multiplart/form-data">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" name="titulo">
          
        </div>
        <div class="col-sm-7">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" name="autor">
        </div>
          <div class="col-sm-5">
            <label for="editora">Editora</label>
            <input type="text" class="form-control" name="editora">
         </div>
        <div class="col-sm-4">
            <label for="data">Data da Publicação</label>
            <input type="text" class="form-control" placeholder="__/__/____" name="data">
        </div>  
        <div class="col-sm-4">
            <label for="classificacao">Classificação</label>
            <input type="text" class="form-control" placeholder="Sinopse" name="sinopse">
        </div>
    
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="sinopse">Sinopse</label>
            <textarea class="form-control" rows="9" placeholder="Classificação" name="classificacao"></textarea>
        </div>   
    </div>   
    <button type="submit" class="btn btn-success">Enviar</button>
    <button type="reset" class="btn btn-info" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>