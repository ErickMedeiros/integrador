<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Curso de PHP - Login no Sistema</title>
    <style type="text/css">
    body {
	background-color: #6C9;
}
    </style>
    </head>
    <body>
    <form  method="post" action="valida.php">
        <p>
          <label>
            <div align="center">
            <div align="center"><br>
              <br>
              <img src="imagens/phpmysql.jpg" width="321" height="186" alt="php2"><br>
              <br>
              <br>
  <br>
            </div>
            <div align="center">
              <h3>Usuário</h3>
            </div>
            </div>
          </label>
          <div align="center">
            <input type="text" name="email" maxlength="50" align="center" />
          </div>
        </p>
        <p align="center">
          <label><strong>Senha</strong></label>
          <strong>
          <input type="password" name="senha" maxlength="50" align="center" />
          </strong>
<input type="submit" value="Entrar" />
        </p>
        </form>

    </body>
</html>
