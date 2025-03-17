<?php
require_once "conecta.php";

/*logica/Funções para crud de fabricantes*/

//listarFabricantes: usada pela pagina fabricantes/visualizar.php
function listarFabricantes(PDO $conexao)
:array{
   $sql = "SELECT * FROM fabricantes ORDER BY nome";
   try {
    /*preparando o comando sql antes de executar no servidor e guardando em memoria (variavel consultado ou query)*/
   $consulta = $conexao->prepare($sql);

   /*executadndo o comando no banco de dados*/
   $consulta->execute();

   /*busca/retorna  todos os dadod provenientes da execução da consulta e os transforma em array associativo*/
   return $consulta->fetchall(PDO::FETCH_ASSOC);

   } catch (Exception $erro) {
      die("Erro:".$erro->getMessage());
   }
}   

// inserindoFabricante: usada pela pagina fabricantes/inserir.php
function inserirFabricante(PDO $conexao, string $nomeDoFabricante):void   {

   // :named parameter (parametro nomeado)
   $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";

   try {
      $consulta = $conexao->prepare($sql);

      /*bindvalue() -> permite vincular o valor do parametro á consulta que será executada. é necessario indicar qual é o parametro (:nome)
      de onde vem o valor ($nomeDoFabricante) e de que tipo ele é (PDO:PARAM_STR)*/
      $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);

      $consulta->execute();
   } catch (Exception $erro) {
      die ("Erro ao inserir: ". $erro->getMessage());
   }
}