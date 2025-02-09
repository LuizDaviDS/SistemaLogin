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

        $sql_code = "SELECT * FROM usuarios WHERE senha = '$senha' AND email = '$email'"; // selecionando o usuário com o email e senha informados
        $sql_query = $mysqli->query($sql_code) or die('Erro na execução do Banco de dados'); // executando a query. No caso de erro o programa fecha com a mensagem de erro

        $quantidade = $sql_query->num_rows; // pegando a quantidade de linhas retornadas pela query

        if ($quantidade==1) // se a quantidade for 1, o usuário existe e a senha está correta
        {
            $usuario = $sql_query->fetch_assoc(); // pegando os dados do usuário
            
            if (!isset($_SESSION)) {
                session_start(); // iniciando sessão no caso de não existir
            }

            $_SESSION['id'] = $usuario['id']; // salvando o id do usuário na sessão
            $_SESSION['email'] = $usuario['email']; // salvando o email do usuário na sessão

            header('Location: painel.php'); // redirecionando para a página painel.php
        } else 
        {
            echo("E-mail ou senha incorretos."); // caso a quantidade de linhas seja diferente de 1, o usuário não existe ou a senha está incorreta
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
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post"> <!-- Formulário de login -->
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
    <a href="cadastro.php">Cadastrar</a> <!-- Link para a página de cadastro -->
</body>
</html>