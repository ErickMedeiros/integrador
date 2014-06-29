<html>
    <body>
        <head>
        <meta charset="UTF-8"></meta>
        <title>Página de Cliente</title>
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

include("seguranca.php"); // Inclui o arquivo com o sistema de segurança

echo "Olá, você está logado(a) no Sistema , " . $_SESSION['usuarioNome'];


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<h3 align="center"><strong><a href="listar_cliente.php">Consultar Cliente Cadastrado</a></strong></h3>
<h3 align="center"><strong><a href="cadastrar_cliente.php">Cadastrar Cliente</a></strong></h3>
<h3 align="center"><strong><a href="editar_cliente.php">Editar Cliente</a></strong></h3>
<h3 align="center"><strong><a href="excluir_cliente.php">Excluir Cliente</a></strong></h3>
<h3 align="center"><strong><a href="logado.php">Página Principal</a></strong></h3>
</body>
    </html>