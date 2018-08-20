<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/../teste_mt4/public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/../teste_mt4/public/css/bootstrap.min.css">
    <title><?php echo $titulo ?></title>
</head>
<div class="jumbotron">
    <h1 class="display-4"><?php echo $titulo ?></h1>
</div>
<div class="col-sm-10" style="margin: auto;width: 80%;padding: 10px;">
    <form method="post" action="http://localhost/teste_mt4/index.php/Comandos/enviarComandosDispositivo" class="form form-control">
        <?php if(isset($message_error)) :?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?php echo $message_error ?></strong>
            </div>
        <?php endif;?>
        <?php if(isset($message_success)) :?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong><?php echo $message_success;?></strong>
            </div>
        <?php endif;?>
        <div class="form-group col-sm-4">
            <label for="username" class="label label-default">Usuário</label>
            <input type="text" placeholder="digite o usuario" class="form-control input-group-sm" name="usuario">
        </div>
        <div class="form-group col-sm-4">
            <label for="senha" class="label label-default">Senha</label>
            <input type="password" placeholder="digite a senha" class="form-control input-group-sm" name="senha">
        </div>
        <div class="form-group">
            <input type="hidden" value="<?php echo $dispositivo['ip']?>" name="ip">

            <label for="hostname" class="label label-default">Digite O Comando Para Enviar Ao Dispositivo</label>
            <textarea  rows="10" class="form-control" id="comandos"name="comandos"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
<script src="/../teste_mt4/public/js/jquery.min.js"></script>
<script src="/../teste_mt4/public/js/bootstrap.min.js"></script>