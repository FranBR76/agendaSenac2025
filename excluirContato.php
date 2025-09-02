<?php
include 'classes/contato.class.php';
$con = new Contato();

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $con->deletar($id);
    header ("Location: /agendaSenac2025");
} else {
    echo '<script type="text/javascript">alert("Erro ao excluir contato");</script>';
    header ("Location: /agendaSenac2025");
}