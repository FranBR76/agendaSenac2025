
 <?php


require 'inc/header.inc.php';
include 'classes/usuario.class.php';


$usuario = new Usuario();
// CARREGA O USUÁRIO 
if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $info = $usuario->buscar($id);

    if (empty($info['email'])) {
        // usuário não encontrado -> volta pra listagem
        header("Location: /agendaSenac2025");
        exit;
    }
} else {
    // id não foi informado -> volta pra listagem
    header("Location: /agendaSenac2025");
    exit;
}


if (isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    // senha pode vir vazia — a função editar deve manter a senha atual quando vazia
    $senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';
    $permissoes = isset($_POST['permissoes']) ? implode(',', $_POST['permissoes']) : '';
    $id = (int) $_POST['id'];

    $usuario->editar($nome, $email, $senha, $permissoes, $id);
    header('Location: gestaoUsuario.php');
    exit;
}

//verificar permissoes
$permissoesDisponiveis = ['adicionar', 'editar', 'excluir', 'super'];
$permissoesUsuario = explode(',', $info['permissoes']); // transforma string em array


if(isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $permissoes = isset($_POST['permissoes']) ? implode(',', $_POST['permissoes']) : '';
    $id = $_POST['id'];
    $usuario->editar($nome, $email, $senha, $permissoes, $id);  
    header('Location: gestaoUsuario.php');
}

$permissoesDisponiveis = ['adicionar', 'editar', 'excluir', 'super'];
$permissoesUsuario = [];
if (!empty($info['permissoes'])) {
    $permissoesUsuario = explode(',', $info['permissoes']);
}
?>







<h1>EDITAR USUÁRIO</h1>
<div class="card-conteudo">
    <form method="POST">
        
        <div class="card" style="width: 100%;" >
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
            
            
            Nome: <br>
            <input type="text" name="nome" value="<?php echo $info['nome']; ?>" /> <br><br>
            Email: <br>
            <input type="mail" name="email" value="<?php echo $info['email']; ?>" /> <br><br>
            Senha: <br>
            <input type="password" name="senha" value="" placeholder="Deixe em branco para manter a senha atual" /> <br><br>
            Permissões: <br>
            <?php foreach ($permissoesDisponiveis as $perm): ?>
                <label>
                    <input 
                        type="checkbox" 
                        name="permissoes[]" 
                        value="<?php echo $perm; ?>"
                        <?php echo in_array($perm, $permissoesUsuario) ? 'checked' : ''; ?>
                    >
                    <?php echo ucfirst($perm); ?>
                </label><br>
            <?php endforeach; ?>
        
            
            <input type="submit" value="SALVAR" />
        </div>
    </form>
</div>
<?php
require 'inc/footer.inc.php';
?>