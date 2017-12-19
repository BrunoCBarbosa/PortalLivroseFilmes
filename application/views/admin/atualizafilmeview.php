<h1>Atualizar Filme</h1>
<form action="<?= base_url('admin/filmes/salvar_update')?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo" value="<?= $filme[0]->codigo?>">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" value="<?= $filme[0]->titulo; ?>" name="titulo">
          
        </div>
        <div class="col-sm-7">
            <label for="autor">Diretor</label>
            <input type="text" class="form-control" value="<?= $filme[0]->diretor; ?>" name="diretor">
        </div>
          <div class="col-sm-5">
            <label for="editora">Elenco</label>
            <input type="text" class="form-control" value="<?= $filme[0]->elenco; ?>" name="elenco">
         </div>
        <div class="col-sm-4">
            <label for="data">Data de Lançamento</label>
            <input type="text" class="form-control" placeholder="__/__/____" value="<?= date('d/m/y', strtotime($filme[0]->data));?>" name="data">
        </div>  
        <div class="col-sm-4">
            <label for="classificacao">Classificação</label>
            <input type="text" class="form-control" value="<?= $filme[0]->classificacao; ?>" name="classificacao">
        </div>
        <div class="col-sm-4">
            <label for="imagem">Imagem</label>
            <input type="file" id="imagem"  name="imagem">
        </div>
    
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="sinopse">Sinopse</label>
            <textarea class="form-control" rows="9" name="sinopse"><?= $filme[0]->sinopse; ?></textarea>
        </div>   
    </div>   
    <button type="submit" class="btn btn-success">Enviar</button>
   </form>