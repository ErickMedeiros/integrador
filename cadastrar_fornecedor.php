<?php print( '<?xml version = "1.0" encoding = "utf-8"?>') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Cadastrando clientes do banco de dados. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"></meta>
      <title>Cadastro de Fornecedor</title>
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
        <h2>Cadastrando Fornecedor no Banco</h2>
        <?php
        mysql_connect("localhost", "root", "");
        mysql_select_db("farmacia");


        include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
        echo "Olá, você está logado(a) no Sistema , " . $_SESSION['usuarioNome'];
        ?>
       
        <form name="frm_cadastro" action="" method="post" enctype="multipart/form-data">
            Nome:</br><input type="text" name="nome_fornecedor" /><br/>
            CNPJ:</br><input type="text" name="cnpj" /><br/>
            Telefone:</br><input type="text" name="telefone" /><br/>
            Email:</br><input type="text" name="email" /><br/>
            <input type="hidden" name="acao" value="enviar"/>
            <input type="submit" value="Enviar" class="btn"/>
         
        </form>     
        <?php
        if (isset($_POST['acao']) && $_POST['acao'] == 'enviar') {
            $nomefornecedor = trim(strip_tags($_POST['nome_fornecedor']));
            $cnpj = trim(strip_tags($_POST['cnpj']));
            $telefone = trim(strip_tags($_POST['telefone']));
            $email = trim(strip_tags($_POST['email']));
        }
        if (empty($nomefornecedor) || empty($cnpj) || empty($telefone) || empty($email)) {
            echo'<script>alert("Preencha todos os campos");</script>';
        } else {
            $inserir = mysql_query("INSERT INTO fornecedor (nome_fornecedor, cnpj, telefone, email) VALUES ('$nomefornecedor', '$cnpj','$telefone','$email')");
        }
        ?>
        <a href="listar_fornecedor.php">Voltar</a>
    </body>
</html>

