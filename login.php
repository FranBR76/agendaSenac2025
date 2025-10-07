<?php
session_start();
require "inc/header.inc.php";


require 'classes/usuario.class.php';
if(!empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);

    $usuario = new Usuario();
    if($usuario->fazerLogin($email, $senha)){
        header("Location: index.php");
        exit();
    }
    else {
        echo '<span style="color: red; justify-content: center; font-size: 24px;">'."Usuario e/ou senha incorretos!".'</span>';
    }
}


?>


<h1>Seja bem-vindo!</h1>
<p>Faça seu login</p>
<div class="card-conteudo">
    
    <form method="POST" >
        
    <div class="card" style="width: 100%;" >
        Email: <br>
        <input type="email" name="email"> <br><br>
        Senha: <br>
        <input type="password" name="senha"> <br><br>
        <input type="submit" value="LOGIN">

        <a class="esqueceuSenha" href="esqueceuSenha.php">ESQUECEU SENHA?</a><br>
        <a class="esqueceuSenha" style="margin-left: 0;" href="adicionarUsuario.php">Não possui conta? Crie uma</a>
        
    </div>
</form>
</div>


<?php require "inc/footer.inc.php"; ?>