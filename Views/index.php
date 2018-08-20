<!doctype html>
<html lang="pt=br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/../teste_mt4/public/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/../teste_mt4/public/css/bootstrap.min.css">
    <title>Teste, MT4 [De: Aleson França]</title>
</head>
<body>
<div class="jumbotron">
    <h1 class="display-4">Teste, MT4 [De: Aleson França]</h1>
</div>
<?php if(isset($message_success)) :?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo $message_success;?></strong>
    </div>
<?php endif;?>
<?php if(isset($message_error)) :?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><?php echo $message_error;?></strong>
    </div>
<?php endif;?>
    <div class="col-sm-4">
        <a href="http://localhost/teste_mt4/index.php/Dispositivos/form_dispositivo/null" class="btn btn-outline-primary">
            Novo Dispositivo
        </a>
        <a href="http://localhost/teste_mt4/index.php/Criptografia" class="btn btn-outline-success">
            Criptografar Textos
        </a>
        <a href="http://localhost/teste_mt4/index.php/CompararHashes" class="btn btn-outline-warning">
            Comparar Hashes
        </a>

    </div>

<br>
<div class="table-responsive-sm col-sm-12">
    <table class="table table-bordered table-condensed table-striped table-hover table-sm">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">HostName</th>
            <th scope="col">IP</th>
            <th scope="col">Tipo</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($dispositivos as $_dispositivo):?>
            <tr>
                <th scope="row" id="dispositivo-id"><?php echo $_dispositivo['id']?></th>
                <td><?php echo $_dispositivo['hostname'] ?></td>
                <td><?php echo $_dispositivo['ip']?></td>
                <td><?php echo $_dispositivo['tipo']?></td>
                <td><?php echo $_dispositivo['fabricante']?></td>
                <td>
                    <a class="btn btn-success btn-sm " role="button"
                       href="http://localhost/teste_mt4/index.php/Comandos/form_comandos/<?php echo $_dispositivo['id']?>"
                       >Enviar Comandos Ao Dispositivo</a>
                    <a class="btn btn-primary btn-sm" role="button"
                       href="http://localhost/teste_mt4/index.php/Dispositivos/form_dispositivo/<?php echo $_dispositivo['id']?>" id="alterar">Alterar</a>
                    <a class="btn btn-danger btn-sm" role="button"
                       href="http://localhost/teste_mt4/index.php/Dispositivos/apagarDespositivo/<?php echo $_dispositivo['id']?>" id="apagar">Apagar</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="/../teste_mt4/public/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#apagar').click(function(){
            var ret = confirm('Deseja Mesmo Apagar O Registro ?');
            if(r == true ){

            }else{

            }
        });
    })
</script>
<script src="/../teste_mt4/public/js/bootstrap.min.js"></script>
</body>
</html>