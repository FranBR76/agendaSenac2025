<?php

require 'inc/header.inc.php';
require 'classes/usuario.class.php';

//Aqui serve como o submit do usuario
$usuario = new Usuario();
if(isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $permissoes = implode(',',$_POST['permissoes']);
    $usuario->adicionar($email, $nome, $senha, $permissoes);
    header('Location: gestaoUsuario.php');
}


?>


<h1>CADASTRAR USUÁRIO</h1>

<form method="POST" >
    Nome: <br>
    <input type="text" name="nome" /> <br><br>
    Email: <br>
    <input type="mail" name="email" /> <br><br> 
    Senha: <br>
    <input type="password" name="senha" /> <br><br>
    
    Permissoes: <br>
    <input type="checkbox" checked id="adicionar" name="permissoes[]" value="adicionar">
    <label for="adicionar">Adicionar</label><br>
    <input type="checkbox" id="excluir "name="permissoes[]" value="excluir">  
    <label for="excluir">Excluir</label><br>
    <input type="checkbox" id="editar "name="permissoes[]" value="editar">  
    <label for="editar">Editar</label><br>
    <input type="checkbox" id="super "name="permissoes[]" value="super">  
    <label for="super">Super</label><br>
    
    <input type="submit" name="btCadastrarUsuario" value="ADICIONAR" />
</form>


<?php
require 'inc/footer.inc.php';
?>