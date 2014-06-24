<?php
$conexao = mysql_connect("localhost","root","root");
$db = mysql_select_db("farmacia");
$id = $_POST["id_clientes"];
$sql = "SELECT * FROM clientes WHERE id_clientes='$id'";
$resultado = mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados");

while ($linha=mysql_fetch_array($resultado)) {
   $id = $linha["id_clientes"];
   $nome = $linha["nome"];
   $telefone = $linha["telefone"];
   $email = $linha["email"];
   $cep = $linha["cep"];
   $visualizar = $linha["visualizar"];

   echo "<h1>Alterar Cadastro.</h1>";
   echo "<hr><br>";
   echo "<form action='listar_cliente.php?id_clientes=$id' method='post'>";
   echo "Codigo: <input name='id_novo' type='text' value='$id' size=20><br>";
   echo "Telefone: $telefone<br>";
   echo "Email: $email<br>";
   echo "Cep: $cep<br>";
   echo "Nome:<input name='nome' type='text' value='$nome' size=30> 

*<br>";
   echo "Telefone:<input name='telefone_novo' type='text' value='$telefone' size=15> *<br>";
   echo "Email: <i>(Exemplo: exemplo@exemplo.com)</i><input name='email_novo' type='text' value='$email' size=30><br><br>";
   echo ":<input name='novo_nome' type='text' value='$nome' size=30> *<br>";
   echo "<input type='submit' value='Alterar'>";
   echo "</form>";
   echo "<br><hr>";
}

?>
