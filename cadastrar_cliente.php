<?php print( '<?xml version = "1.0" encoding = "utf-8"?>') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Cadastrando clientes do banco de dados. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"></meta>
      <title>Cadastro de Cliente</title>
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
    <body>
        <h2>Cadastrando Clientes no Banco</h2>
        <?php
        mysql_connect("localhost", "root", "");
        mysql_select_db("farmacia");


        include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
        echo "Olá, você está logado(a) no Sistema , " . $_SESSION['usuarioNome'];
        ?>
       
        <form name="frm_cadastro" action="" method="post" enctype="multipart/form-data">
            Nome:</br><input type="text" name="nome" /><br/>
            Telefone:</br><input type="text" name="telefone" /><br/>
            Endereço:</br><input type="text" name="endereco" /><br/>
            CEP:</br><input type="text" name="cep" /><br/>
            <input type="hidden" name="acao" value="enviar"/>
            <input type="submit" value="Enviar" class="btn"/>
         
        </form>     
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] == 'enviar') {
            $nome = trim(strip_tags($_POST['nome']));
            $telefone = trim(strip_tags($_POST['telefone']));
            $endereco = trim(strip_tags($_POST['endereco']));
            $cep = trim(strip_tags($_POST['cep']));
        }
        if (empty($nome) || empty($telefone) || empty($endereco) || empty($cep)) {
            echo'<script>alert("Preencha todos os campos");</script>';
        } else {
            $inserir = mysql_query("INSERT INTO clientes (nome, telefone, endereco, cep) VALUES ('$nome', '$telefone','$endereco','$cep')");
        }
        ?>
    </body>
</html>

