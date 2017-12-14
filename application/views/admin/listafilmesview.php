<h1 class="page-header">Filmes</h1>
<?php if(isset($alert)) {?>
    <div class="alert alert-<?php
    $a = explode('-', isset($alert) ? $alert : '');
    echo $a[0];
    ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php
            $a = explode('-', isset($alert) ? $alert : '');
            echo $a[1];
        ?>
    </div>
<?php } ?>
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped" id="dataTable">
        <thead>
            <tr>
                <th>Código</th>
                <th>Imagem</th>
                <th>Título do Filme</th>
                <th>
                    <div style="float:right">
                        <a href="<?= base_url('admin/filmes/cadastro')?>" class="btn  btn-info "> Novo </a>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($filmes as $row):?>
            <tr>
                <th scope="row"><?= $row->codigo;?></th>
                <td><?= base_url('imagem/livros'.$row->imagem)?></td>
                <td><?= $row->titulo;?></td>
                <td>
                    <div style="float:right">
                        <a href="<?= base_url('usu/paginainicial/filmes/'.$row->codigo)?>" class="btn btn-success " target="_blank"> Ver</a>
                        <a href="<?= base_url('admin/filmes/atualizacao/'.$row->codigo)?>" class="btn btn-info">Atualizar</a>
                        <a href="<?= base_url('admin/filmes/deletar/'.$row->codigo)?>" class="btn btn-danger "  onclick="return confirm('Deseja realmente apagar?')">Deletar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </div>
