<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="page-header"><?= $livro[0]->titulo; ?></h1>  
            </div>
            <div class="col-sm-4">
                <img class="img-responsive" src="<?=base_url('imagens/livros/'.$livro[0]->imagem)?>"/>
            </div>
            <div class="col-sm-8">
                <h3><small>Autor: <?= $livro[0]->autor;?></small>
                    <br><small>Editora: <?= $livro[0]->editora;?></small>
                    <br><small>Ano de Publicação: <?= $livro[0]->data; ?></small>
                    <br><small>Classificação: <?= $livro[0]->classificacao;?> anos</small>
                    <br><small>Sinopse: </small></h3>
                <p>
                    <?= nl2br($livro[0]->sinopse); ?>
                </p>
            </div>
           <a href="<?= base_url('livros/')?>" class="btn btn-danger">Voltar</a>
        </div>
    </div>
</section>