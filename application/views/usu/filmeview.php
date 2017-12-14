<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="page-header"><?= $filmes[0]->titulo; ?></h1>  
            </div>
            <div class="col-sm-4">
                <img class="img-responsive" src="<?=base_url('imagens/filmes/'.$filmes[0]->imagem)?>"/>
            </div>
            <div class="col-sm-8">
                <h3><small>Diretor: <?= $filmes[0]->diretor;?></small>
                    <br><small>Elenco: <?= $filmes[0]->elenco;?></small>
                    <br><small>Data de Lançamento: <?= date('d/m/Y', strtotime($filmes[0]->data)); ?></small>
                    <br><small>Classificação: <?= $filmes[0]->classificacao;?> anos</small>
                    <br><small>Sinopse: </small></h3>
                <p>
                    <?= nl2br($filmes[0]->sinopse); ?>
                </p>
            </div>
        </div>
    </div>
</section>