<?php

// $this->nome = $nome;
// $this->endereco = $endereco;
// $this->email = $email;
// $this->telefone = $telefone;
// $this->redeSocial = $redeSocial;
// $this->profissao = $profissao;
// $this->foto = $foto;
// $this->ativo = $ativo;
// $this->dtNasc = $dtNasc;

require 'inc/header.inc.php';
include 'classes/contato.class.php';
$contato = new Contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $info = $contato->buscar($id);

    if (empty($info['email'])) {
        header("Location: /agendaSenac2025");
        exit;
    }
} else{
    header("Location: /agendaSenac2025");
    exit;
}
    if(!empty($_POST['id'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redeSocial = $_POST['redeSocial'];
    $profissao = $_POST['profissao'];
    if(isset($_FILES['foto'])) {
       $foto = $_FILES['foto'];
    }
    else {
        $foto = array();
    }
    $ativo = $_POST['ativo'];
    $dtNasc = $_POST['dtNasc'];
    $id = $_POST['id'];

    if(!empty($email)) {
        $contato->editar($nome,  $endereco, $email, $telefone, $redeSocial, $profissao, $foto, $ativo, $dtNasc, $_GET['id']);
    }
    header ("Location: /agendaSenac2025");
    }
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $info = $contato->getContato($_GET['id']);
    } else{
        ?>
            <script type="text/javascript">window.location.href="index.php";</script>
        <?php
        exit;
    }
?>

<button class="btnVoltar" ><a href="index.php">VOLTAR</a></button>
<h1>EDITAR CONTATO</h1>


<div class="card-conteudo">
<form method="POST" enctype="multipart/form-data"> <!-- permite adicionar imagens no form -->
   

    <div class="card">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>">

        Nome: <br>
        <input type="text" name="nome" value="<?php echo $info['nome']; ?>" /> <br><br>
        Endereço: <br>
        <input type="text" name="endereco"  value="<?php echo $info['endereco']; ?>" /> <br><br>
        Email: <br>
        <input type="mail" name="email" value="<?php echo $info['email']; ?>" /> <br><br>
        Telefone: <br>
        <input type="text" name="telefone" value="<?php echo $info['telefone']; ?>"/> <br><br>
        Rede Social: <br>
        <input type="text" name="redeSocial" value="<?php echo $info['redeSocial']; ?>"/> <br><br>
    </div>
        <div class="card">
        Profissão: <br> 
        <input type="text" name="profissao" value="<?php echo $info['profissao']; ?>" /> <br><br>
        Foto: <br>
        <input type="file" name="foto[]" multiple /> <br><br>
        <div class="grupo">
            <div class="cabecalho">Foto Contato</div>
            <div class="corpo">
                <?php foreach($info['foto'] as $fotos): ?>
                    <div class="foto_item">
                        <img src="image/contatos/<?php echo $fotos['url']; ?>" />
                        <a href="excluir_foto.php?id=<?php $fotos['id'];?>">Excluir imagem</a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        Ativo: <br>
        <input type="text" name="ativo" value="<?php echo $info['ativo']; ?>" /> <br><br>
        Data de Nascimento: 
        <input type="date" name="dtNasc" value="<?php echo $info['dtNasc']; ?>" /> <br><br>
        
        <input class="btnSubmit" style="margin-top: 16px;" type="submit" value="SALVAR" />
    </div>
</form>
</div>
<?php
require 'inc/footer.inc.php';
?>