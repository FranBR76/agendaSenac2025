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
    <input type="text" name="nome" placeholder="Digite o nome"/> <br><br>
    Endereço: <br>
    <input type="text" name="endereco" placeholder="Digite o endereço" /> <br><br>
    Email: <br>
    <input type="mail" name="email" placeholder="Digite o email" /> <br><br>
    Telefone: <br>
    <input type="text" name="telefone" placeholder="Digite o telefone" /> <br><br>
    Rede Social: <br>
    <input type="text" name="redeSocial" placeholder="Digite o @ da rede social" /> <br><br>
    Profissão: <br> 
    <input type="text" name="profissao" placeholder="Digite a profissão" /> <br><br>
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