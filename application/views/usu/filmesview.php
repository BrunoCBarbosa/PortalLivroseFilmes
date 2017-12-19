<section>
    <div class="container">
        <h1 class="page-header">Filmes</h1>
        <table class="table table-striped ordena" id="table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Imagem</th>
                    <th>Título</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filmes as $row):?>
                <tr>
                    <td scope="row"><?= $row->codigo?></td>
                    <td><img class="img-responsive" src="<?= base_url('imagens/filmes/'.$row->imagem)?>"></td>
                    <td><?= $row->titulo;?></td>
                    <td>
                        <div style="float:rigt">
                            <a href="<?= base_url('filmes/'.$row->codigo)?>" class="btn btn-success">Ver</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</section>