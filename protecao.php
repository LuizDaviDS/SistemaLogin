<?php

// proteção contra o acesso direto ao painel.php
// Lembrar de incluir esse arquivo em todas as páginas que desejo proteger contra acesso direto

if (!isset($_SESSION)) {
    session_start(); // revivendo a sessão para poder acessar as variáveis de sessão
}

if (!isset($_SESSION['id'])) // se a variável de sessão id não existir
{
    die("Acesso negado ! <a href=\"index.php\">Faça login para continuar</a>"); // encerra o programa com a mensagem de acesso negado
}
?>