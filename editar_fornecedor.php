<?php print( '<?xml version = "1.0" encoding = "utf-8"?>') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">


<!-- Editando registro no banco e listando na tela. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <title>Editar Cliente</title>
        <style type = "text/css">
            body  { font-family: arial, sans-serif;
                    background-color: #F0E68C } 
            table { background-color: #ADD8E6 }
            td    { padding-top: 2px;
                    padding-bottom: 2px;
                    padding-left: 4px;
                    padding-right: 4px;
                    border-width: 1px;
                    border-style: inset }
        </style>
    </head>
    <?php
    
    include ("conexao.php");
    
    if ( isset( $_GET['id_clientes'] ) ) { $id = $_GET['id_clientes']; }

    $sql = mysql_query("SELECT * FROM clientes WHERE id_clientes='$id'");

    $exibe = mysql_fetch_assoc($sql);
    ?>
    <body>
        <h2>Editando Clientes do Banco</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Nome:</br><input type="text" name="nome" value="<?php echo $exibe ["nome"]; ?>" /><br/>
            Telefone:</br><input type="text" name="telefone" value="<?php echo $exibe ["telefone"]; ?>" /><br/>
            Endereco:</br><input type="text" name="endereco" value="<?php echo $exibe ["endereco"]; ?>" /><br/>
            CEP:</br><input type="text" name="cep" value="<?php echo $exibe ["cep"]; ?>" /><br/>
            <br>
                <input name="" type="submit" value="Editar"/>    
        </form>
    </body>
</html>

