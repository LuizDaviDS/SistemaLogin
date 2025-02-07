<?php

if (!isset($_SESSION)) {
    session_start(); // revivendo a sessão para poder acessar as variáveis de sessão
}

session_destroy(); // destruindo a sessão (para efetivamente fazer o logout)
header('Location: index.php'); // redirecionando para a página de login
?>