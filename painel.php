<?php
include_once('conexao.php');
include('protect.php');

// Consultar os dados do banco de dados
$sql = "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);

// Verificar se há algum resultado retornado pela consulta
if ($resultado->num_rows > 0) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Senha</th><th>Gênero</th><th>Data-Nascimento</th><th>Cidade</th><th>Estado</th><th>Endereço</th><th>Ações</th></tr>';

    // Exibir os dados em uma tabela HTML
    while ($row = $resultado->fetch_assoc()) {
        echo 'Usuários Cadastrados no Banco de Dados!!!';
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['nome'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['telefone'].'</td>';
        echo '<td>'.$row['senha'].'</td>';
        echo '<td>'.$row['genero'].'</td>';
        echo '<td>'.$row['data_nasci'].'</td>';
        echo '<td>'.$row['cidade'].'</td>';
        echo '<td>'.$row['estado'].'</td>';
        echo '<td>'.$row['endereco'].'</td>';
        echo '<td><a href="excluir.php?id='.$row['id'].'">Excluir</a></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "Nenhum dado encontrado.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <br><br>
    Seja Bem Vindo !!!

    <p> 
        <a href="logout.php">Sair</a>
    </p>>
</body>
</html>