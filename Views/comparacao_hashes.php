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
    <form method="post" action="<?php if(isset($url)){echo $url;}?>" class="form form-control">
        <br>
        <?php if(isset($message_danger)) :?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong><?php echo $message_danger ?></strong>
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
        <div class="form-group col-sm-6 float-left">
            <textarea  rows="10" class="form-control" id="hash1"name="hash1" type="text"><?php if(isset($hash)){ echo trim($hash);}?> <?php if(isset($hash1)){ echo trim($hash1);}?></textarea>
        </div>
        <div class="form-group col-sm-6 float-left">
            <textarea  rows="10" class="form-control " <?php if(isset($hidden)){ echo $hidden;} ?> id="hash2"name="hash2" type="text"><?php if(isset($hash2)){ echo trim($hash2);}?> <?php if(isset($crypt)){ echo trim($crypt);}?> <?php if(isset($decrypt)){echo  trim($decrypt);}?></textarea>
        </div>
        <div class="form-group ">
            <input type="submit" value="<?php if(isset($btn_text)){echo $btn_text;}?>" class="btn btn-primary input-group-sm col-sm-12">
        </div>
        <br>
    </form>
</div>
<script src="/../teste_mt4/public/js/jquery.min.js"></script>
<script src="/../teste_mt4/public/js/bootstrap.min.js"></script>