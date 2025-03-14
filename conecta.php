<?php
$servidor = "localhost";
$usuario = "root";
$ssenha = "";
$banco = "vendas";

$conexao = new PDO(
    "mysql:host=$servidor;dbname=$banco;charset=utf8",
    $usuario, $senha 
);