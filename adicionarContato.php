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
?>


<h1>ADICIONAR CONTATO</h1>

<form method="POST" action="adicionarContatoSubmit.php">
    Nome: <br>
    <input type="text" name="nome" /> <br><br>
    Endereço: <br>
    <input type="text" name="endereco" /> <br><br>
    Email: <br>
    <input type="mail" name="email" /> <br><br>
    Telefone: <br>
    <input type="text" name="telefone" /> <br><br>
    Rede Social: <br>
    <input type="text" name="redeSocial" /> <br><br>
    Profissão: <br> 
    <input type="text" name="profissao" /> <br><br>
    Foto: <br>
    <input type="text" name="foto" /> <br><br>
    Ativo: <br>
    <input type="text" name="ativo" /> <br><br>
    Data de Nascimento: <br>
    <input type="date" name="dtNasc" /> <br><br>
    
    <input type="submit" name="btCadastrar" value="ADICIONAR" />
</form>


<?php
require 'inc/footer.inc.php';
?>