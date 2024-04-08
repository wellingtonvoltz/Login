<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])){

   
   if(isset($_POST['btn_cadastro'])) {
      // Redireciona para outra página
      header("Location: formulario.php");
      exit;
   }


   if(strlen($_POST['email']) == 0) {
      echo "Prencha seu E-mail!";
   } else if(strlen($_POST['senha']) == 0) {     
      echo "Preencha a sua senha!";
   } else {

      $email = $mysqli->real_escape_string($_POST['email']);
      $senha = $mysqli->real_escape_string($_POST['senha']);

      $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; 
      $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli-> error);

      $quantidade = $sql_query->num_rows;

      if($quantidade == 1){

         $usuario = $sql_query->fetch_assoc();

         if(!isset($_SESSION)) {
            session_start();
         }

         $_SESSION['id'] = $usuario['id'];

         header("Location: painel.php");

      }else{
         echo "Falha ao logar E-mail ou Senha incorretos";
      }
   }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="login_style.css">
   <title>Login</title>
   </head>
<body>
<form action="" method="POST">
   <div class="main-login">
      <div class="left-login">
      <h1>Faça login </h1>
      <img src="loginimg.svg" class="left-login-image" alt="Imagem de login">
   </div>

   <div class="right-login">
   <div class="card-login">
    <h1>LOGIN</h1>
   <div class="textfield">
      <label for="email">E-mail</label>
      <input type="text" name="email" placeholder="E-mail">
   </div>
   <div class="textfield">
      <label for="senha">Senha</label>
      <input type="password" name="senha" placeholder="Senha">
   </div>  
   <form method="post" action="formulario.php">
        <button class="btn_cadastro" type="submit" name="btn_cadastro">Cadastre-se</button>
    </form>
   <div class="box">
   <button class="btn-login" >Login</button>
   </div>
         </div>
      </div>
   </div>

</body>
</html>