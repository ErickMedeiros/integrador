<?php
include("conexao.php");
       
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
echo "Olá, você está logado(a) no Sistema , " . $_SESSION['usuarioNome'];

$id=$_POST['codigo'];
$nome = $_POST['nome'];
$fone = $_POST['fone'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];

$result= mysql_query("DELETE FROM clientes WHERE id_cliente='$id'");
mysql_close($con);

echo "<input type=\"button\" value=\"Voltar\" onclick=\"location.href='listar_cliente.php'\" >";
?>