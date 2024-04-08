<?php
include_once('conexao.php');

// Verificar se o ID do usuário foi passado via GET
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Consultar os detalhes do usuário com base no ID
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $mysqli->query($sql);

    if($resultado->num_rows == 1) {
        $row = $resultado->fetch_assoc();
        // Preencher o formulário de edição com os detalhes do usuário
        $nome = $row['nome'];
        $email = $row['email'];
        $telefone = $row['telefone'];
        $senha = $row['senha'];
        $genero = $row['genero'];
        $data_nascimento = $row['data_nasci'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $endereco = $row['endereco'];
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não especificado.";
    exit;
}

// Se o formulário de edição for enviado
if(isset($_POST['editar'])) {
    // Recuperar os dados do formulário de edição
    // Atualizar os detalhes do usuário no banco de dados
    $sql = "UPDATE usuarios SET nome='$nome', email='$email', telefone='$telefone', senha='$senha', genero='$genero', data_nasci='$data_nascimento', cidade='$cidade', estado='$estado', endereco='$endereco' WHERE id=$id";
    $resultado = $mysqli->query($sql);
    if($resultado) {
        echo "Detalhes do usuário atualizados com sucesso.";
        header('Location: painel.php');
    } else {
        echo "Erro ao atualizar detalhes do usuário: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="box">
        <form action="" method="POST">
            <fieldset>
                <legend><b>Editar Usuário</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="LabelInput">Nome Completo</label>
                </div>
                <br></br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="LabelInput">Email</label>
                </div>
                <br></br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="LabelInput">Telefone</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="LabelInput">Senha</label>
                </div>
                <br><br>
                <p>Gênero:</p>
                    <input type="radio" id="feminino" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <br>
                    <input type="radio" id="masculino" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <br>
                    <input type="radio" id="outro" name="genero" value="outro" required>
                    <label for="outro">Outro</label>
                <br></br>
                    <label for="data_nascimento"><b>Data De Nascimento</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br></br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="LabelInput">Cidade</label>
                </div>
                <br></br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="LabelInput">Estado</label>
                </div>
                <br></br>
                <div class="inputBox">
                    <input type="tel" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="LabelInput">Endereço</label>
                </div>
                <br></br>
                <input type="submit" name="editar" value="Salvar Alterações">
            </fieldset>
        </form>
    </div>
</body>
</html>