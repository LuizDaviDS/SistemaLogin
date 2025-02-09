<?php
include ('conexao.php'); // incluindo o arquivo de conexão com o banco de dados (conexao.php)
if (isset($_POST['email']) || isset($_POST['senha']))  // checando se o email e senha foram preenchidos
{
    if (strlen($_POST['email'])==0) // verificando se o email está vazio
    {
        echo('Preencha seu email');
    } else if (strlen($_POST['senha'])==0) // mesma coisa para senha
    {
        echo('Preencha sua senha');
    } else 
    {

        $email = $mysqli->real_escape_string($_POST['email']); // protegendo contra SQL Injection
        $senha = $mysqli->real_escape_string($_POST['senha']); // protegendo contra SQL Injection

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo('O e-mail é inválido, por favor preencha com um e-mail válido');
        } else {
            $sql_code = "INSERT INTO usuarios(email,senha) VALUES ('$email','$senha')"; // adicionando usuario no banco de dados
            $sql_query = $mysqli->query($sql_code) or die('Erro na execução do Banco de dados'); // executando a query. No caso de erro o programa fecha com a mensagem de erro

            echo('<h2>Cadastro realizado com sucesso!</h2>');
        }
    }
}
?>

<!DOCTYPE html>
<!-- Arquivo HTML para fins de teste -->
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastrar</h1>
    <form action="" method="post"> <!-- Formulário de cadastro -->
        <p>
            <label>E-mail </label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha </label>
            <input type="password" name="senha">
        </p>
        <button type="submit">Enviar</button>
    </form>
    <a href="index.php">Voltar</a> <!-- Link para a página de cadastro -->
</body>
</html>