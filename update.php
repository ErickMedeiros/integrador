<?php
include ("conexao.php");

$id = $_GET["id_clientes"];

if(mysql_query("update from clientes where id_clientes='$id'")){
 		echo "Excluído! <br> <a href='javascript:history.back(-1);'>Voltar</a>";
		exit;
}else{
	echo mysql_error();
}
?>
