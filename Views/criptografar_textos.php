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
    <form method="post" action="http://localhost/teste_mt4/index.php/Criptografia/criptografarTexto" class="form form-control">
        <div class="form-group">
            <label for="hostname" class="label label-default">Digite o texto, que será criptografado</label>
            <input type="number" name="deslocamento" value="<?php echo isset($deslocamento) ? $deslocamento : ''; ?>" class="number form-control input-group-sm" placeholder="Deslocamento" min="-26" max="26"><br>
            <textarea  rows="10" class="form-control" id="texto"name="texto" type="text"><?php if(isset($texto)){ echo trim($texto);}?> <?php if(isset($crypt)){ echo trim($crypt);}?> <?php if(isset($decrypt)){echo  trim($decrypt);}?></textarea>
        </div>
        <div class="form-group">
            <h4>Resultado:</h4>
            <div class="col-sm-6">
                <label class="label col-form-label label-default"><?php if(isset($crypt)){echo $crypt;} ?></label>
                <label class="label col-form-label label-default"><?php if(isset($decrypt)){echo $decrypt;}?></label>
            </div>
        </div>
        <div class="form-group">
            <select class="form-control input input-group-sm" name="tipo"> <!-- Seletor onde serão utilizadas as variáveis $opt1 e $opt2 -->
                <option value="0" >Criptografar</option>
                <option value="1" >Descriptografar</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Executar" class="btn btn-primary input-group-sm col-sm-12">
        </div>
    </form>
</div>
<script src="/../teste_mt4/public/js/jquery.min.js"></script>
<script src="/../teste_mt4/public/js/bootstrap.min.js"></script>