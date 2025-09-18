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

<button class="btnVoltar" ><a href="index.php">VOLTAR</a></button>
<h1>Adicionar Contato</h1>

<div class="card-conteudo">
    <form method="POST" action="adicionarContatoSubmit.php">
        <div class="card">
            Nome <br>
            <input type="text" name="nome" placeholder="Digite o nome" required /> <br><br>
            Endereço <br>
            <input type="text" name="endereco" placeholder="Digite o endereço" required /> <br><br>
            Email <br>
            <input type="mail" name="email" placeholder="Digite o email" required /> <br><br>
            Telefone <br>
            <input type="text" name="telefone" placeholder="Digite o telefone" required /> <br><br>
            Rede Social <br>
            <input type="text" name="redeSocial" placeholder="Digite o @ da rede social" /> <br><br>
        </div>
        <div class="card">
            Profissão <br> 
            <input type="text" name="profissao" placeholder="Digite a profissão" /> <br><br>
            Foto <br>
            <input type="text" name="foto" /> <br><br>
            Ativo <br>
            <input type="text" name="ativo" /> <br><br>
            Data de Nascimento 
            <input type="date" name="dtNasc" /> <br><br>
            <input class="btnSubmit" style="margin-top: 16px;" type="submit" name="btCadastrar" value="ADICIONAR" />
        </div>
    </form>
</div>

<?php
require 'inc/footer.inc.php';
?>