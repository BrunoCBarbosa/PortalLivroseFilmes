<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="page-header"><?= $filme[0]->titulo; ?></h1>  
            </div>
            <div class="col-sm-4">
                <img class="img-responsive" src="<?=base_url('imagens/filmes/'.$filme[0]->imagem)?>"/>
            </div>
            <div class="col-sm-8">
                <h3><small>Diretor: <?= $filme[0]->diretor;?></small>
                    <br><small>Elenco: <?= $filme[0]->elenco;?></small>
                    <br><small>Data de Lançamento: <?= date('d/m/Y', strtotime($filme[0]->data)); ?></small>
                    <br><small>Classificação: <?= $filme[0]->classificacao;?></small>
                    <br><small>Sinopse: </small></h3>
                <p>
                    <?= nl2br($filme[0]->sinopse); ?>
                </p>
            </div>
        </div>
    </div>
</section>