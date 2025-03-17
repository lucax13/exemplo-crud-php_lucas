<?php
require_once "conecta.php";

/*logica/Funções para crud de fabricantes*/

//listarFabricantes: usada pela pagina fabricantes/visualizar.php
function listarFabricantes(PDO $conexao)
:array{
   $sql = "SELECT * FROM fabricantes ORDER BY nome";

    /*preparando o comando sql antes de executar no servidor e guardando em memoria (variavel consultado ou query)*/
   $consulta = $conexao->prepare($sql);

   /*executadndo o comando no banco de dados*/
   $consulta->execute();

   /*busca/retorna  todos os dadod provenientes da execução da consulta e os transforma em array associativo*/
   return $consulta->fetchall(PDO::FETCH_ASSOC);
}