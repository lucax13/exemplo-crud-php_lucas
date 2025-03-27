<?php
function formatarPreco(float $valor){
    return "R$" .number_format($valor, 2, ",", ".");
}