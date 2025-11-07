<?php 
session_start();
include 'inc/header.inc.php';
include 'classes/contato.class.php'; 
include 'classes/funcoes.class.php'; 
include 'classes/usuario.class.php';


if(!isset($_SESSION['logado'])) {
    header('Location: login.php');
    exit;
}


$usuario = new Usuario();
$usuario->setUsuario($_SESSION['logado']);
$contato = new Contato();
$fn = new Funcoes(); 
?>




<h1 class="titulo">Contatos</h1>
<?php if($usuario->temPermissao("adicionar")): ?>
<button><a href="adicionarContato.php">ADICIONAR</a></button>
<?php endif; ?>
<?php if($usuario->temPermissao("super")): ?>
<button><a href="gestaoUsuario.php">GESTÃO USUÁRIOS</a></button>
<?php endif; ?>
<a class="sair" href="sair.php">SAIR</a>

<table border="3" width="100%" >
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>ENDEREÇO</th>
        <th>EMAIL</th>
        <th>TELEFONE</th>
        <th>REDE SOCIAL</th>
        <th>PROFISSÃO</th>
        <th>FOTO</th>
        <!-- <th>ATIVO</th> -->
        <th>NASCIMENTO</th>
        <th>AÇÕES</th>
    </tr>
    <?php
    $lista = $contato->getFoto();
    foreach($lista as $item):
    ?>
    <tbody>
        <tr class="linha">
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['endereco']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['telefone']; ?></td>
            <td><?php echo $item['redeSocial']; ?></td>
            <td><?php echo $item['profissao']; ?></td>
            <td>
                <?php if(!empty($item['url'])): ?>
                    <img src="image/contatos/<?php echo $item['url'];?>" height="50px" border="0">
                <?php else: ?>
                    <img src="image/default.png" height="50px" border="0">
                <?php endif;?>
            </td>
            <!-- <td><?php echo $item['ativo']; ?></td> -->
            <td><?php echo $fn->dtNasc($item['dtNasc'], 2);?> </td>
            <td>
                <?php if($usuario->temPermissao('editar')): ?>
                <a class="acoes" href="editarContato.php?id=<?php echo $item['id']?>">EDITAR</a>    
                <?php endif; ?>
                <?php if($usuario->temPermissao('excluir')): ?>
                <a class="acoes" href="excluirContato.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse contato?')">EXCLUIR</a>    
                <?php endif; ?>
            </td>
     
        </tr>

    </tbody>
    <?php endforeach;
    ?>
</table>

<?php include 'inc/footer.inc.php'; ?>