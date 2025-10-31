<?php
require 'conexao.class.php';
class Contato {
    private $id;
    private $nome;
    private $endereco;
    private $email;
    private $telefone;
    private $redeSocial;
    private $profissao;
    private $foto;
    private $ativo;
    private $dtNasc;

    private $con;

    public function __construct(){
        $this->con = new Conexao();
    }
    private function existeEmail($email) {
        $sql = $this->con->conectar()->prepare("SELECT id FROM contatos WHERE email = :email"); // puxa o email no banco pra ver se já existe um contato com o email
        $sql->bindParam(':email', $email, PDO::PARAM_STR);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch(); //se achar 1 email, ele trás para o fetch, que irá retornar o email encontrado
        } else{
            $array = array(); //se nao tem, pode atribuir para a genda
        }
        return $array;
    }

    public function adicionar($email, $nome, $endereco, $telefone, $redeSocial, $profissao, $foto, $ativo, $dtNasc){
        $emailExistente = $this->existeEmail($email);
        if (count($emailExistente) == 0) {
            try {
                $this->nome = $nome;
                $this->endereco = $endereco;
                $this->email = $email;
                $this->telefone = $telefone;
                $this->redeSocial = $redeSocial;
                $this->profissao = $profissao;
                $this->foto = $foto;
                $this->ativo = $ativo;
                $this->dtNasc = $dtNasc;
                $sql = $this->con->conectar()->prepare("INSERT INTO contatos(nome, endereco, email, telefone, redeSocial, profissao, foto, ativo, dtNasc) VALUES (:nome, :endereco, :email, :telefone, :redeSocial, :profissao, :foto, :ativo, :dtNasc)");
                $sql->bindParam(":nome",             $this->nome,   PDO::PARAM_STR);
                $sql->bindParam(":endereco",     $this->endereco,   PDO::PARAM_STR);
                $sql->bindParam(":email",           $this->email,   PDO::PARAM_STR);
                $sql->bindParam(":telefone",     $this->telefone,   PDO::PARAM_STR);
                $sql->bindParam(":redeSocial", $this->redeSocial,   PDO::PARAM_STR);
                $sql->bindParam(":profissao",   $this->profissao,   PDO::PARAM_STR);
                $sql->bindParam(":foto",             $this->foto,   PDO::PARAM_STR);
                $sql->bindParam(":ativo",           $this->ativo,   PDO::PARAM_STR);
                $sql->bindParam(":dtNasc",         $this->dtNasc,   PDO::PARAM_STR);
                $sql->execute();
                return TRUE;

            } catch(PDOException $ex) {
                return 'ERRO: '.$ex->getMessage();
            }
        } else {
            return False;
        }

    }

    public function listar() {
        try{
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos");
            $sql->execute();
            return $sql->fetchAll();


        }
        catch (PDOException $ex){
            echo 'ERRO'.$ex->getMessage();
        }
    }

    public function buscar($id) {
        try{
            $sql = $this->con->conectar()->prepare("SELECT * FROM contatos WHERE id =:id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            if($sql->rowCount() >0) {
                return $sql->fetch();

            }else {
                return array();
            }
        }
        catch(PDOExcepiton $ex) {
            echo "ERRO: ".$ex->getMessage();
        }    
    }
    public function editar( $nome,  $endereco, $email, $telefone, $redeSocial, $profissao, $foto, $ativo, $dtNasc, $id) {
        $emailExistente = $this->existeEmail($email);
        if(count($emailExistente) > 0 && $emailExistente['id'] != $id){
            return FALSE;
        }
        else {
            try{
                $sql = $this->con->conectar()->prepare("UPDATE contatos SET nome = :nome, endereco = :endereco, email = :email, telefone = :telefone, redeSocial = :redeSocial, profissao = :profissao, foto = :foto, ativo = :ativo, dtNasc = :dtNasc WHERE id = :id");
                $sql->bindValue(':nome', $nome);
                $sql->bindValue(':endereco', $endereco);
                $sql->bindValue(':email', $email);
                $sql->bindValue(':telefone', $telefone);
                $sql->bindValue(':redeSocial', $redeSocial);
                $sql->bindValue(':profissao', $profissao);
                // $sql->bindValue(':foto', $foto);
                $sql->bindValue(':ativo', $ativo);
                $sql->bindValue(':dtNasc', $dtNasc);
                $sql->bindValue(':id', $id);
                $sql->execute();

                //inserir imagem se houver
                if(count($foto) > 0) {
                    for($q=0; q < count($foto['tmp_name']); $q++) {
                        $tipo = $foto['type'][$q];
                        if(in_array($tipo, array('image/jpeg', 'image/png'))){
                            $tmpname = md5(time().rand(0, 9999)).'jpg';
                            move_uploaded_file($foto['tmp_name'][$q],'image/contatos/'.$tmpname);
                            list($width_orig, $height_orig) = getimagesize('image/contatos/'.$tmpname);
                            $ratio = $width_orig/$height_orig;

                            $width = 500;
                            $height = 500;
                            if($width/$height > $ratio) {
                                $width = $height * $ratio;
                            } else {
                                $height = $width/$ratio;
                            }
                            $img = imagecreatetruecolor($width, $height);
                            if ($tipo === 'image/jpeg') {
                                $origi = imagecreatefromjpeg('image/contatos/'.$tmpname);

                            } else if($tipo == 'image/png') {
                                $origi = imagecreatefrompng('image/contatos/'.$tmpname);
                            }
                            imagecopyresampled($img, $origi, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                            //salvar imagem no servidor
                            imagejpeg($img, 'image/contatos/'.$tmpname, 80);
                            //salvar a url da foto no banco de dados
                            $sql = $this->con->conectar()->prepare("INSERT INTO foto_contato SET id_contato = :id_contato, url = :url");
                            $sql->bindValue(":id_contato", $id);
                            $sql->bindValue(":url", $tmpname);
                            $sql->execute();
                        }
                    }
                }

                return TRUE;
            } catch(PDOExeption $ex){
                echo "ERRO: ".$ex->getMessage();
            }
        }
    }
    public function deletar($id) {
        $sql = $this->con->conectar()->prepare("DELETE FROM contatos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}   