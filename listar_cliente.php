<?php print( '<?xml version = "1.0" encoding = "utf-8"?>') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!-- Listando clientes no banco de dados. -->
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="UTF-8"></meta>
      <title>Listar Cliente</title>
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
        <h2>Listando Clientes no Banco</h2>
            <?php
        include("conexao.php");
        
//        include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
//        echo "Olá, você está logado(a) no Sistema , " . $_SESSION['usuarioNome'];

        $resultado = mysql_query("select * from clientes order by nome asc");
        echo "<table width=900 border=\"1\">";
        echo "<tr>";
        echo "<td>Codigo</td>";
        echo "<td>Nome</td>";
        echo "<td>Telefone</td>";
        echo "<td>Endereco</td>";
        echo "<td>Cep</td>";
        echo "</tr>";
        while ($row = mysql_fetch_array($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['id_clientes'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['endereco'] . "</td>";
            echo "<td>" . $row['cep'] . "<br>" . "</td>";
            echo "<td>";
            echo "<a href=\"editar_cliente.php?id=" . $row['id_clientes'] . "\"> Alterar </a>";
            echo "<a href=\"excluir_cliente.php?id=" . $row['id_clientes'] . "\"> Excluir </a>";
            echo "<a href=\"cadastrar_cliente.php?id=" . $row['id_clientes'] . "\"> Cadastrar </a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
            </head>
            <a href="cliente.php">Voltar</a>
    </body>
</html>
