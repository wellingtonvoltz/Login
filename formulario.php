<?php
include_once('conexao.php');

if(isset($_POST['submit']))
{
    //print_r($_POST['nome']);
    //print_r($_POST['email']);
    //print_r($_POST['telefone']);
    //print_r($_POST['senha']);
    //print_r($_POST['genero']);
    //print_r($_POST['data_nascimento']);
    //print_r($_POST['cidade']);
    //print_r($_POST['estado']);
    //print_r($_POST['endereco']);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $genero = $_POST['genero'];
    $data_nascimento = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    // Verificar se a senha contém tanto letras quanto números
    if (!preg_match('/[a-zA-Z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
        // Senha não atende aos critérios, exibir mensagem de erro
        echo 'A senha deve conter pelo menos uma letra e um número.';
    } else {
        // Consultar se o email já existe no banco de dados
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $result = $mysqli->query($sql);

        // Verificar se houve algum resultado retornado pela consulta
        if ($result->num_rows > 0) {
            // Email já existe, mostrar mensagem de erro
            echo 'Este email já está registrado. Por favor, use outro email.';
        } else {
            // Email não existe, salvar no banco de dados
            $sql = mysqli_query($mysqli, "INSERT INTO usuarios(nome, email, telefone, senha, genero, data_nasci, cidade, estado, endereco) 
            VALUES ('$nome', '$email', '$telefone', '$senha', '$genero', '$data_nascimento', '$cidade', '$estado', '$endereco')");

            header('Location: index.php');
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form_style.css">
    <title>Cadastre-se</title>
</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Usuário</b></legend>
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
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>