<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Acesso Administrativo</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../../dist/css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="<?= base_url('admin/acesso/logar') ?>" method="post">
           <?php if (isset($alert)) { ?>
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
        <h2 class="form-signin-heading">Acesso Restrito</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="passsword" name="password" class="form-control" placeholder="Senha" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar-me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acessar</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
