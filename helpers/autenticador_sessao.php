<?php

if (!isset($_SESSION)) {
    session_start();
}

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$caminhosPermitidos = [
    '/login',
    '/validar-login',
    '/cadastro',
    '/criar-conta'
];


if ((!isset($_SESSION['login']) || $_SESSION['login'] !== true) && !in_array($path, $caminhosPermitidos)) {
    header('Location: /login');
    exit;
}