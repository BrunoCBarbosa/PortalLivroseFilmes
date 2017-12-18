<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Filmes</h1>
            </div>
            <?php foreach ($filmes as $row): ?>
            <div class="col-sm-3">
                <div class="caixa-noticia">
                    <div class="row">
                         <a href="<?= base_url('filmes/' . $row->codigo) ?>">
                        <div class="col-sm-12">
                            <img class="img-responsive" src="<?= base_url('imagens/filmes/'.$row->imagem)?>"/>
                        </div>   
                        <div class="col-sm-12">
                            <h4 class="titulo_noticia"><?= $row->titulo;?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</section>