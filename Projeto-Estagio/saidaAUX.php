<?php

require('banco.php');

$banco = new Banco_bateria();
$link = $banco->conecta_mysql();

$valores = $_GET['valor1'];
$valores = split("/", $valores);

$bip = $valores[0];
$senha = $valores[1];

$s = "select * from usuarios where senha = '$senha'";
$resultado_pesquisa = mysqli_query($link, $s);
$array_resultado = mysqli_fetch_array($resultado_pesquisa);


$bateria = "select * from baterias where codigo_bip = '$bip'";
$resultado_pesquisa2 = mysqli_query($link, $bateria);


$sql = "select * from entrada_bateria where status = 'carregada' and  equipamento = '$array_resultado[equipamento]'  ORDER BY hora_recarga LIMIT 1";

date_default_timezone_set('America/sao_Paulo');
$date = date('Y-m-d H-i-s');

if ($resultado_pesquisa && $resultado_pesquisa2) {
    
    $array_resultado2 = mysqli_fetch_array($resultado_pesquisa2);

    if (isset($array_resultado['senha']) && isset($array_resultado2['id'])) {

        $resultado_pesquisa3 = mysqli_query($link, $sql);
        
	if ($resultado_pesquisa3) {

            $array_resultado3 = mysqli_fetch_array($resultado_pesquisa3);

            //$sql = "insert into saida_bateria (id_bateria, status, equipamento, status_agua, hora_recarga, numero_carregador, tempo_de_carregamento, responsavel) values ('$array_resultado3[id_bateria]', 'EM USO', '$array_resultado3[equipamento]', '$array_resultado3[status_agua]','$array_resultado3[hora_recarga]', '$array_resultado3[numero_carregador]','$array_resultado3[tempo_de_carregamento]', '$array_resultado[nome]')";
	

	    $sql = "UPDATE `entrada_bateria` SET `status`='EM USO',`status_agua`='NAO VERIFICADO',numero_carregador = NULL, tempo_de_carregamento = NULL, `responsavel`='$array_resultado[nome]', data_entrada = '$date' WHERE `id_bateria`= $array_resultado2[numero_bateria]";

            mysqli_query($link, $sql);

            header('location:layoutReserva.php');

        } else {
            header('location:layoutReserva.php?erro=77');
        }


    } else {
        header('location:layoutReserva.php?erro=44');
    }

} else {
    header('location:layoutReserva.php?erro=03');
}
//errou = 0: OK, deu tudo certo.;
//errou = 02: o usuario pegou a beteria errada. volta para a tela de pegar;
//errou = 44: o usuario digitou a uma senha invalida;
//errou = 03: Algum erro no banco de dados. ERRO INTERNO.
//ERROU = 77: bateria errada.



