<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="page-header"><?= $livros[0]->titulo; ?></h1>  
            </div>
            <div class="col-sm-4">
                <img class="img-responsive" src="<?=base_url('imagens/livros/'.$livros[0]->imagem)?>"/>
            </div>
            <div class="col-sm-8">
                <h3><small>Autor: <?= $livros[0]->autor;?></small>
                    <br><small>Editora: <?= $livros[0]->editora;?></small>
                    <br><small>Data de Publicação: <?= date('d/m/Y', strtotime($livros[0]->data)); ?></small>
                    <br><small>Classificação: <?= $livros[0]->classificacao;?> anos</small>
                    <br><small>Sinopse: </small></h3>
                <p>
                    <?= nl2br($livros[0]->sinopse); ?>
                </p>
            </div>
        </div>
    </div>
</section>