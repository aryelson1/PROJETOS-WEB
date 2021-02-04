<?php
require('banco.php');

$banco = new Banco_eventos();
$link = $banco->conecta_mysql();

$id = "<script> document.getElementById('input_id').value;</script>";

$Usuarios = mysqli_query( $link,"SELECT * FROM  `funcionario_evento` LEFT JOIN funcionarios ON ( funcionario_evento.id_funcionario = funcionarios.id_funcionario ) WHERE funcionario_evento.id_evento = $id");

$table = "";
$table .= "<table  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">";
$table .= "<thead>";
$table .= "<tr style='background-color: gray'>";
$table .= "<td >NOME</td>";
$table .= "<td>CPF</td>";
$table .= "<td>Celular</td>";
$table .= "</tr>";
$table .= "</thead>";
$table .= "<tbody>";

while ($row = mysqli_fetch_array($Usuarios)) {
    $table .= "<tr>";
    $table .= "<td>$row[nome]</td>";
    $table .=  "<td>$row[cpf]</td>";
    $table .= "<td>$row[celular]</td>";
    $table .= "</tr>";
}

$table .= "</tbody></table>";



?>