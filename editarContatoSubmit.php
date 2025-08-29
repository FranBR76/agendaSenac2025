<?php
include 'classes/contato.class.php';
$contato = new Contato();
if(!empty($_POST['id'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redeSocial = $_POST['redeSocial'];
    $profissao = $_POST['profissao'];
    $foto = $_POST['foto'];
    $ativo = $_POST['ativo'];
    $dtNasc = $_POST['dtNasc'];
    $id = $_POST['id'];

    if(!empty($email)) {
        $contato->editar($nome,  $endereco, $email, $telefone, $redeSocial, $profissao, $foto, $ativo, $dtNasc, $id);
    }
    header ("Location: /agendaSenac2025");
}
?>