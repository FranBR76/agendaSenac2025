<?php
include 'classes/contato.class.php';
$contato = new Contato();

if(!empty($_POST['email'])){
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redeSocial = $_POST['redeSocial'];
    $profissao = $_POST['profissao'];
    $foto = $_POST['foto'];
    $ativo = $_POST['ativo'];
    $dtNasc = $_POST['dtNasc'];
    $contato->adicionar($email, $nome, $endereco, $telefone, $redeSocial, $profissao, $foto, $ativo, $dtNasc);
    header('Location: index.php');
}
else{
    echo '<script type="text/javascript">alert("Email já cadastrado!")</script>';
}



// $this->nome = $nome;
// $this->endereco = $endereco;
// $this->email = $email;
// $this->telefone = $telefone;
// $this->redeSocial = $redeSocial;
// $this->profissao = $profissao;
// $this->foto = $foto;
// $this->ativo = $ativo;
// $this->dtNasc = $dtNasc;