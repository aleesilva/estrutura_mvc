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
    <form method="post" action="http://localhost/teste_mt4/index.php/Dispositivos/salvarDispositivo" class="form form-control">
            <div class="form-group">
                <input type="hidden" class="form-control" id="hostname" placeholder="HostName..." value="<?php echo $dispositivo ? $dispositivo['id'] :''; ?>" name="id">
                <label for="hostname" class="label label-default">HostName</label>
                <input value="<?php echo $dispositivo ? $dispositivo['hostname'] : '' ;?>" type="text" class="form-control" id="hostname" placeholder="HostName..." name="hostname">
            </div>
            <div class="form-group">
                <label for="IP">IP</label>
                <input value="<?php echo $dispositivo ? $dispositivo['ip'] : '' ;?>" type="text" class="form-control" id="IP" placeholder="000.000.0.000" name="ip">
            </div>
            <div class="form-group">
                <label for="IP">Tipo</label>
                <input value="<?php echo $dispositivo ? $dispositivo['tipo'] : '' ;?>" type="text" class="form-control" id="TIPO" aria-describedby="tipohelper" placeholder="Tipo de Dispositivo" name="tipo">
                <small id="tipohelper" class="form-text text-muted">Tipo do Dispositivo. Exemplo(Servidor,Roteador,Switch's)</small>
            </div>
            <div class="form-group">
                <label for="IP">Fabricante</label>
                <input value="<?php echo $dispositivo ? $dispositivo['fabricante'] : '' ;?>" type="text" class="form-control" id="IP" placeholder="Fabricante" name="fabricante">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
<script src="/../teste_mt4/public/js/jquery.min.js"></script>
<script src="/../teste_mt4/public/js/bootstrap.min.js"></script>