<?php

/* Sistema de segurança com acesso restrito
*
* Usado para restringir o acesso de certas páginas do seu site
*
*
@version 1.0
package SistemaSeguranca
*/

//  Configurações do Script
// ==============================

$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'erick' é diferente de 'ERICK'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?

// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.

$_SG['servidor'] = 'localhost';    // Servidor MySQL
$_SG['usuario'] = 'root';          // Usuário MySQL
$_SG['senha'] = '';                // Senha MySQL
$_SG['banco'] = 'farmacia';            // Banco de dados MySQL
$_SG['paginaLogin'] = 'login.php'; // Página de login
$_SG['tabela'] = 'usuario';       // Nome da tabela onde os usuários são salvos
// ==============================
// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================
// Verifica se precisa fazer a conexão com o MySQL

if ($_SG['conectaServidor'] == true) {
$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");

}
// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
session_start();
}

/**
* Função que valida um email e senha
*
* @param string $email - O email a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
055
*/
function validaUsuario($email, $senha) {
global $_SG;
$cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
// Usa a função addslashes para escapar as aspas
$nemail = addslashes($email);
$nsenha = addslashes($senha);
// Monta uma consulta SQL (query) para procurar um usuário
$sql = "SELECT `id_usuario`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `email` = '".$nemail."' AND ".$cS." `senha` = '".$nsenha."' LIMIT 1";
$query = mysql_query($sql);
$resultado = mysql_fetch_assoc($query);
 
// Verifica se encontrou algum registro
if (empty($resultado)) {
// Nenhum registro foi encontrado => o usuário é inválido
return false;
} else {
// O registro foi encontrado => o usuário é valido
// Definimos dois valores na sessão com os dados do usuário
$_SESSION['usuarioID'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
$_SESSION['usuarioNome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

// Verifica a opção se sempre validar o login
if ($_SG['validaSempre'] == true) {
// Definimos dois valores na sessão com os dados do login
$_SESSION['usuarioLogin'] = $email;
$_SESSION['usuarioSenha'] = $senha;
}
return true;
}
}


/**
* Função para expulsar um visitante
*/

function expulsaVisitante() {

global $_SG;
// Remove as variáveis da sessão (caso elas existam)
unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
// Manda pra tela de login

header("Location: ".$_SG['paginaLogin']);
}
?>