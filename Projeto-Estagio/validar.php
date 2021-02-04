<?php
session_start();
require_once("banco.php");

$b = $_GET["valor1"];
$q = split("/", $b);
$bip = $q[0];
$senha = $q[1];


$banco = new Banco_bateria();
$link = $banco->conecta_mysql();

// Consulta Para Buscar Bateria
$bateria = "select * from baterias where codigo_bip = '$bip'";
// Buscando a bateria na Tabela Baterias
$resultado_pesquisa2 = mysqli_query($link, $bateria);
// ARRAY da busca pela bateria
$array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);


// Consulta Para Buscar Funcionario
$s = "select * from usuarios where senha = '$senha' AND equipamento = '$array_resultado2[equipamento]'";

//Verificar Bateria
$selecionaBateria = "SELECT * FROM entrada_bateria WHERE id_bateria = '$array_resultado2[numero_bateria]' AND status = 'EM USO' ";
$resultado_selecionaBateria = mysqli_fetch_array(mysqli_query($link, $selecionaBateria));

//Verifica Todas Baterias
$selecionaBateria1 = "SELECT * FROM entrada_bateria WHERE 1";
$resultado_selecionaBateria1 = mysqli_fetch_array(mysqli_query($link, $selecionaBateria1));


// Pegando Hora Para Recarga Da Bateria
date_default_timezone_set('America/sao_Paulo');
$hora = date('H') + 1;
$min = date('i');
$data = "$hora:$min";


date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');


// Buscando A Senha Do Funcionario
$resultado_pesquisa = mysqli_query($link, $s);


if ($resultado_pesquisa && $resultado_pesquisa2) {

    // ARRAY da busca pela senha
    $array_resultado = mysqli_fetch_array($resultado_pesquisa);


    if (isset($array_resultado['senha']) && isset($array_resultado2['id']) && isset($resultado_selecionaBateria['id_bateria'])) {
        $durabilidade = $q[2] - $resultado_selecionaBateria['tempo'];

        //Montar Relatorio
        $relatorio = "INSERT INTO  `relatorio` (  `responsavel` ,  `equipamento` ,  `id_bateria` ,  `durabilidade`,`entrada_bateria` ) VALUES('$array_resultado[nome]', '$array_resultado2[equipamento]',$array_resultado2[numero_bateria],$durabilidade,'$date')";
        mysqli_query($link, $relatorio);

        //Montar Historico
        $historico = "INSERT INTO `historico`(numero_bateria, responsavel,alterou_agua,finalizou_repouso,finalizou_carregamento) VALUES ($array_resultado2[numero_bateria],'$array_resultado[nome]','-','-','-')";
        mysqli_query($link, $historico);

        // Salvar Senha Funcionario
        $_SESSION['senhaFunc'] = $senha;
        $_SESSION['durabilidade'] = $q[2];
        // Executar UPDATE
        $sql = "UPDATE `entrada_bateria` SET `status`='REPOUSO',`equipamento` = '$array_resultado2[equipamento]',`status_agua`='NAO VERIFICADO', `hora_recarga`='$data', data_entrada = '$date',tempo_de_carregamento = NULL,numero_carregador = NULL, `responsavel`='$array_resultado[nome]' WHERE `id_bateria`= $array_resultado2[numero_bateria]";
        mysqli_query($link, $sql);


        if ($array_resultado2['equipamento'] == "CARRO LIMPEZA") {
            header('location:layoutReserva.php?erro=3000');
        } else {
            header('location:layoutReserva.php?erro=5');
        }


    } else if (!isset($resultado_selecionaBateria1['id_bateria']) && isset($array_resultado2['numero_bateria'])) {
        $sql = "INSERT INTO `entrada_bateria`(`id_bateria`,`status`, `equipamento`, `status_agua`, `hora_recarga`,`responsavel`) VALUES ($array_resultado2[numero_bateria],'REPOUSO','$array_resultado2[equipamento]','NAO VERIFICADO','$data','$array_resultado[nome]')";
        mysqli_query($link, $sql);
        mysqli_query($link,"INSERT INTO `lavagem`(`numero_bateria`) VALUES ($array_resultado2[numero_bateria])");
        //Montar Historico
        $historico = "INSERT INTO `historico`(numero_bateria, responsavel,alterou_agua,finalizou_repouso,finalizou_carregamento) VALUES ($array_resultado2[numero_bateria],'$array_resultado[nome]','-','-','-')";
        mysqli_query($link, $historico);

        // Salvar Senha Funcionario
        $_SESSION['senhaFunc'] = $senha;
        $_SESSION['durabilidade'] = $q[2];

        header('location:layoutReserva.php?erro=11111');

    } else {
        header('location:layoutReserva.php?erro=1');
    }

} else {
    header('location:layoutReserva.php?erro=6');
}

//erro = 5: trocar vai para o index, ocorreu tudo certo;
//erro = 1: o usuario digitou uma senha invalida. vai abrir o tracar com uma msg.
//erro = 6: algum problema na consultar.

?>



  