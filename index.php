<?php include 'inc/header.inc.php'; ?>
<?php 

include 'classes/contato.class.php'; 
include 'classes/funcoes.class.php'; 

$contato = new Contato();
$fn = new Funcoes(); 
?>
<h1>Contatos</h1>
<button><a href="adicionarContato.php">ADICIONAR</a></button>
<button><a href="gestaoUsuario.php">GESTÃO USUARIO</a></button>

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
        <th>ATIVO</th>
        <th>NASCIMENTO</th>
        <th>AÇÕES</th>
    </tr>
    <?php
    $lista = $contato->listar();
    foreach($lista as $item):
    ?>
    <tbody>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['nome']; ?></td>
            <td><?php echo $item['endereco']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo $item['telefone']; ?></td>
            <td><?php echo $item['redeSocial']; ?></td>
            <td><?php echo $item['profissao']; ?></td>
            <td><?php echo $item['foto']; ?></td>
            <td><?php echo $item['ativo']; ?></td>
            <td><?php echo $fn->dtNasc($item['dtNasc'], 2);?> </td>
            <td>
                <a href="editarContato.php?id=<?php echo $item['id']?>">EDITAR</a>    
                <a href="excluirContato.php?id=<?php echo $item['id'] ?>" onclick="return confirm('Você tem certeza que quer excluir esse contato?')">| EXCLUIR</a>    
            <td>
     
        </tr>

    </tbody>
    <?php endforeach;
    ?>
</table>

<?php include 'inc/footer.inc.php'; ?>