<?php

session_start();
require_once("banco.php");

$b = $_GET["valor1"];
$q = split("/", $b);
$bip = $q[0];
$senha = $_SESSION["senhaFunc"];



$banco = new Banco_bateria();
$link = $banco -> conecta_mysql();

// SELECT funcionario
$s = "select * from usuarios where senha = '$senha'";
// Resultado 1 SELECT funcionario
$resultado_pesquisa = mysqli_query($link, $s);
// ARRAY RESULTADO 1
$array_resultado = mysqli_fetch_array($resultado_pesquisa);
// SELECT bateria
$bateria = "select * from baterias where codigo_bip = '$bip'";

// SELECT bateria já carregada
$sql = "select * from entrada_bateria where status = 'carregada' and  equipamento = '$array_resultado[equipamento]'  ORDER BY hora_recarga LIMIT 1";



// Resultado 2 SELECT bateria
$resultado_pesquisa2 = mysqli_query($link, $bateria);
// Resultado 3 SELECT bateria já carregada
$resultado_pesquisa3 = mysqli_query($link, $sql);
date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');


if ($resultado_pesquisa && $resultado_pesquisa2){

    // ARRAY RESULTADO 2
    $array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);
    // ARRAY RESULTADO 3
    $array_resultado3 = mysqli_fetch_array($resultado_pesquisa3);

    if (isset($array_resultado['senha']) && isset($array_resultado2['id'])) {
        if ($array_resultado2['numero_bateria'] === $array_resultado3['id_bateria']) {

            // UPDATE bateria em uso
            $sql = "UPDATE `entrada_bateria` SET tempo = '$_SESSION[durabilidade]', `status`='EM USO',`status_agua`='NAO VERIFICADO',numero_carregador = NULL, tempo_de_carregamento = NULL, `responsavel`='$array_resultado[nome]', data_entrada = '$date' , data_saida = '$date' WHERE `id_bateria`= $array_resultado3[id_bateria]";
            mysqli_query($link, $sql);

            // UPDATE saida bateria
            $relatorio = "UPDATE relatorio SET saida_bateria = '$date' WHERE id_bateria = $array_resultado3[id_bateria] and saida_bateria IS NULL ";
            mysqli_query($link,$relatorio);

            header('location:layoutReserva.php');
        } else {
            header('location:layoutReserva.php?erro=2');
        }


    } else {
        header('location:layoutReserva.php?erro=4');
    }

} else {
    header('location:layoutReserva.php?erro=3');
}
//errou = 0: OK, deu tudo certo.;
//errou = 2: o usuario pegou a beteria errada. volta para a tela de pegar;
//errou = 4: o usuario digitou a uma senha invalida;
//errou = 3: Algum erro no banco de dados. ERRO INTERNO.
?>

