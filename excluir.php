<?php
include_once('conexao.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para excluir o usuário com base no ID
    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    if ($mysqli->query($sql) === TRUE) {
        echo 'Usuário excluído com sucesso.';
        header('Location: painel.php');
    } else {
        echo 'Erro ao excluir o usuário: ' . $mysqli->error;
    }
} else {
    echo 'ID do usuário não especificado.';
}

?>
