<div class="container">
<h1 class="page-header">Livros</h1>

<?php if (isset($alert)) { ?>
            <div class="alert alert-<?php
            $a = explode('-', isset($alert) ? $alert : '');
            echo $a[0];
            ?>">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php
                $a = explode('-', isset($alert) ? $alert : '');
                echo $a[0];
                ?>
            </div>
       <?php } ?>
<div class="bs-example" data-example-id="striped-table">
    <table class="table table-striped" id="dataTable">
        <thead>
            <tr>
                <th>Código</th>
                <th>Imagem</th>
                <th>Título do Livro</th>
                <th>
                    <div style="float:right">
                        <a href="<?= base_url('admin/livros/cadastro')?>" class="btn  btn-info "> Novo </a>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($livros as $row):?>
            <tr>
                <th scope="row"><?= $row->codigo;?></th>
                <td><?= base_url('imagens/livros'.$row->imagem)?></td>
                <td><?= $row->titulo;?></td>
                <td>
                    <div style="float:right">
                        <a href="<?= base_url('usu/paginainicial/livros/'.$row->codigo)?>" class="btn btn-success " target="_blank"> Ver</a>
                        <a href="<?= base_url('admin/livros/atualizacao/'.$row->codigo)?>" class="btn btn-info">Atualizar</a>
                        <a href="<?= base_url('admin/livros/deletar/'.$row->codigo)?>" class="btn btn-danger "  onclick="return confirm('Deseja realmente apagar?')">Deletar</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   </div>
    </div>
