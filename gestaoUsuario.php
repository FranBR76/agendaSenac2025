<?php include 'inc/header.inc.php'; ?>
<?php 

include 'classes/usuario.class.php'; 
include 'classes/funcoes.class.php'; 

$usuario = new Usuario();
$fn = new Funcoes(); 
?>
<h1>Usuarios</h1>
<button><a href="adicionarUsuario.php">ADICIONAR</a></button>
<button><a href="index.php">CONTATOS</a></button>

<table border="3" width="100%" >
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>SENHA</th>
        <th>PERMISSOES</th>
        <th>AÇÕES</th>
    </tr>
    <?php
    $lista = $usuario->listar();
    foreach($lista as $item):
    ?>
    <tbody>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['senha']; ?></td>
            <td><?php echo $item['permissoes']; ?></td>
            
            <td>
                <a href="editarUsuario.php?id=<?php echo $item['id']?>">EDITAR</a>    
                <a href="excluirUsuario.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse usuario?')">| EXCLUIR</a>    
            <td>
     
        </tr>

    </tbody>
    <?php endforeach;
    ?>
</table>

<?php include 'inc/footer.inc.php'; ?>