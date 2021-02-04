<?php
session_start();

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <script language="JavaScript" src="../projetoAlmeida/cronometro1.js"></script>
    <meta http-equiv="refresh" content="120">
    <!-- material design lite -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="mdl/material.js"></script>
    <link rel="stylesheet" type="text/css" href="mdl/material.css">

    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="cssLABEL.css">
    <!--Jquery -->
    <script src="Dependencias/jquery-3.2.1.min.js"></script>
    <!-- BootStrap -->
    <script src="Dependencias/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Dependencias/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <!-- BootBox-->
    <script src="Dependencias/bootbox.min.js"></script>
    <script type="text/javascript">
        function prompts(msg,id){
            $(document).ready(function () {
                prompts2(msg,id);
            });
        }
        function verificacaoTrocar() {
            if (document.getElementById("bip").value == "") {
                document.getElementById("bip").style.borderColor = "red";
                document.getElementById("nome").style.color = "red";
            }
            if (document.getElementById("tempo").value == "") {
                document.getElementById("tempo").style.borderColor = "red";
                document.getElementById("temp").style.color = "red";
            }
            if (document.getElementById("senhaFunc").value == "") {
                document.getElementById("senhaFunc").style.borderColor = "red";
                document.getElementById("senha").style.color = "red";
            }
            if (!document.getElementById("senhaFunc").value == "" && !document.getElementById("tempo").value == "" && !document.getElementById("bip").value == "") {
                var senha = document.getElementById("senhaFunc").value;
                var bip = document.getElementById("bip").value;
                var tempo = document.getElementById("tempo").value;
                var con = (bip + "/" + senha + "/" + tempo);
                window.location.href = "validar.php?valor1=" + con;
            }

        }

        function verificacaoPegar() {
            if (document.getElementById("bip2").value == "") {
                document.getElementById("bip2").style.borderColor = "red";
                document.getElementById("nome2").style.color = "red";
            }
            else {
                var bip = document.getElementById("bip2").value;
                window.location.href = "validarSaida.php?valor1=" + bip;
            }

        }

        function verificacaoTrocar2() {

            if (document.getElementById("bip").style.borderColor == "red") {
                document.getElementById("bip").style.borderColor = "#5264AE";
                document.getElementById("nome").style.color = "#5264AE";

            }
            if (document.getElementById("senhaFunc").style.borderColor == "red") {
                document.getElementById("senhaFunc").style.borderColor = "#5264AE";
                document.getElementById("senha").style.color = "#5264AE";

            }
            if (document.getElementById("tempo").style.borderColor == "red") {
                document.getElementById("tempo").style.borderColor = "#5264AE";
                document.getElementById("temp").style.color = "#5264AE";

            }
        }

        function verificacaoPegar2() {

            if (document.getElementById("bip2").style.borderColor == "red") {
                document.getElementById("bip2").style.borderColor = "#5264AE";
                document.getElementById("nome2").style.color = "#5264AE";

            }
        }

        function verificacaoSaida2() {

            if (document.getElementById("bip3").style.borderColor == "red") {
                document.getElementById("bip3").style.borderColor = "#5264AE";
                document.getElementById("nomeSaida").style.color = "#5264AE";

            }
            if (document.getElementById("funcSenha").style.borderColor == "red") {
                document.getElementById("funcSenha").style.borderColor = "#5264AE";
                document.getElementById("senhaSaida").style.color = "#5264AE";

            }
        }

        function verificacaoSaida() {
            if (document.getElementById("bip3").value == "") {
                document.getElementById("bip3").style.borderColor = "red";
                document.getElementById("nomeSaida").style.color = "red";
            }
            if (document.getElementById("funcSenha").value == "") {
                document.getElementById("funcSenha").style.borderColor = "red";
                document.getElementById("senhaSaida").style.color = "red";
            }
            else {
                var bip = document.getElementById("bip3").value;
                var senha = document.getElementById("funcSenha").value;
                var con = bip + "/" + senha;
                window.location.href = "saidaAUX.php?valor1=" + con;
            }

        }

        function adicionarEstoque(tela) {
            $(document).ready(function () {
                enviaAddEstoque(tela);
            });
        }

        function removerEstoque(tela) {
            $(document).ready(function () {
                enviaRemoverEstoque(tela);
            });
        }


        function enviaTela() {
            var senha = document.getElementById('senha_estoque1').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_4";
        }

        function enviaTela1() {
            var senha = document.getElementById('senha_cadastra').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_1";
        }

        function enviaTela2() {
            var senha = document.getElementById('senha_remove').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_2";
        }

        function enviaTela3() {
            var senha = document.getElementById('senha_lista').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_3";
        }
    </script>
    <style type="text/css">
        .amarelo {
            background: yellow;

        }

        .vermelho {
            background: red;
        }

        .verde {
            background: limegreen;

        }

        .titulos {
            background: slategrey;
            text-transform: uppercase;
            font-size: 10px;

        }

        tr {
            font-size: 12px;
            color: black;
        }

        .espaco {
            width: 2%;
        }

        .personalizar {
            width: 15%;

        }

        tab1 {
            padding-left: 1em;
        }

        tab3 {
            padding-left: 3em;
        }

    </style>
</head>
<body>
<dialog class="mdl-dialog ModificaStatusRepouso" style="width: 400px;" >
    <audio src="audio.mp3" loop="true" autoplay></audio>
    <h4 class="mdl-dialog__title"><input disabled class="mdl-textfield__input" id="texto"></h4>
    <input type="hidden" class="mdl-textfield__input" id="id_bateria">
    <div class="mdl-dialog__content">
        <span>Numero Carregador</span>
        <input type="text" class="mdl-textfield__input" name="Carregador" id="Carregador" onkeydown="javascript:EnterTab('senhaC',event)">
        <?php
        if ($erro == 504) {
            echo "<h4><font color='red'>Carregador Em Uso !</font></h4>";
        }  ?>
        <br>
        <span>Senha</span>
        <input type="password" class="mdl-textfield__input" name="senhaC" onkeydown="javascript:EnterTab('btn_ok_2',event)" id="senhaC">

        <?php  if ($erro == 505) {
            echo "<h4><font color = 'red'>Senha Inválida!</font></h4>";
        }  ?>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="btn_ok_2" onclick="enviaStatusRepouso()">OK</button>
    </div>
</dialog>
<dialog class="mdl-dialog ModificaStatusAgua">
    <h4 class="mdl-dialog__title">Status Da Água</h4>
    <input type="hidden" class="mdl-textfield__input" id="id_bateria_agua">
    <div class="mdl-dialog__content">
        <span>Status</span>
        <select class="form-control" id="op" onkeydown="javascript:EnterTab('senha2',event)">
            <option value="NORMAL">NORMAL</option>
            <option value="BAIXO">BAIXO</option>
        </select>
        <br>
        <span>Senha</span>
        <input type='password' class='form-control' name='senha2' id='senha2' onkeydown="javascript:EnterTab('btn_ok_1',event)" >
    <?php  if ($erro == 506) {
        echo '<h4><font color ="red">Senha Incorreta!</font></h4>';
    } ?>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="btn_ok_1" onclick="enviaStatusAgua()">OK</button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored close5">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog ModificaStatus">
    <h4 class="mdl-dialog__title">Tempo De Carregamento</h4>
    <input type="hidden" class="mdl-textfield__input" id="id_bateria_tempo">
    <div class="mdl-dialog__content">
        <span>Tempo</span>
        <input type="time" class="mdl-textfield__input" id='tempo1' onkeydown="javascript:EnterTab('senhaP',event)">
    <br>
        <span>Senha</span>
        <input type='password' class='mdl-textfield__input' onkeydown="javascript:EnterTab('btn_ok',event)" name='senhaP' id='senhaP'></div>
    <?php  if ($erro == 1000) {
        echo '<h4><font color = \'#ff0000\'>Senha Incorreta!</font></h4>';
    } ?>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" id="btn_ok" onclick="enviaStatus()">OK</button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored close1">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog estoque">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <label>Senha</label>
        <input id="senha_estoque1" onkeydown="javascript:EnterTab('btn',event)" type="password"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn" onclick="enviaTela()">Entrar</button>
        <button type="button" class="mdl-button" onclick="window.location.href = 'layoutReserva.php'">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog cadastra">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <label>Senha</label>
        <input id="senha_cadastra" onkeydown="javascript:EnterTab('btn1',event)" type="password"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn1" onclick="enviaTela1()">Entrar</button>
        <button type="button" class="mdl-button close2">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog remove">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <label>Senha</label>
        <input id="senha_remove" onkeydown="javascript:EnterTab('btn2',event)" type="password"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn2" onclick="enviaTela2()">Entrar</button>
        <button type="button" class="mdl-button close3" >Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog lista">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <label>Senha</label>
        <input id="senha_lista" onkeydown="javascript:EnterTab('btn3',event)" type="password"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn3" onclick="enviaTela3()">Entrar</button>
        <button type="button" class="mdl-button close4" >Cancelar</button>
    </div>
</dialog>
<!-- Simple header with scrollable tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header" style="overflow-x: scroll;">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Controle De Baterias</span>

            </button>
            <!-- Title -->
            <div style="margin-left: 25%; margin-top: 20px;">
                <h3><span id="minuto">00m</span><span id="segundo">00s</span><br></h3>
            </div>
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation" style="margin-top: 2%;">
                <button type="button" id="teste" style="width: auto;" class="button buttonBlue chamaAlerta">Entrada Bateria
                    <div class="ripples buttonRipples"><span class="ripplesCircle"></span>

                    </div>
            </nav>
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active" id="1">Controle De Bateria</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab" id="2o">Histórico</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab" id="3">Relatório</a>
            <a href="#scroll-tab-4" class="mdl-layout__tab" id="4" onclick="validaE(4)">Estoque</a>
            <a href="#scroll-tab-5" class="mdl-layout__tab" id="5">Limpeza</a>

        </div>
    </header>


    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title">Menu</span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link margem" onclick="validaE(1)" style="color: black;">Adiconar</a>
            <a class="mdl-navigation__link" onclick="validaE(2)" style="color: black;">Remover</a>
            <a class="mdl-navigation__link" onclick="validaE(3)" style="color: black;">Listar</a>
            <a class="mdl-navigation__link" href="layoutReserva.php?erro=09" style="color: black;">Saída Bateria</a>

        </nav>
    </div>


    <main class="mdl-layout__content" style="overflow-x: scroll; overflow-y: scroll;">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
            <div class="page-content" align="center"><b>
                    <?php


                    require('banco.php');

                    $banco = new Banco_bateria();
                    $link = $banco->conecta_mysql();

                    echo " <div class='page-content' style='padding-left: 1%; padding-top: 2%;'>";
                    echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                    echo "<thead>
      <tr class='titulos'>
      
      <td>Responsável</td
      >
      <td>Equipamento</td>
      <td><center>Nº<br> Bateria</center></td>
      <td><center>Hora<br> Inical <br> da<br> Recarga</center></td>
      <td><center>Status <br> da <br>bateria</center></td>
      <td><center>Nº do <br>carregador</center></td>
      <td><center>Tempo<br> em <br>carregamento</center></td>
      <td><center>Status <br>da <br>Água</center></td>
      <td>Alteração</td>
      <td><center>Data<br> De <br> Saida</center></td>
      </tr>

    </thead>";
                    echo "<tbody>";

                    $sql = "select * from entrada_bateria where status = 'repouso'";

                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr class='vermelho'>
                              <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
                              <td>" . $row['equipamento'] . "</td>
                              <td >" . $row['id_bateria'] . "</td>
                              <td>" . $row['hora_recarga'] . "</td>
                              <td>" . $row['status'] . "</td>
                              <td>" . $row['numero_carregador'] . "</td>
                              <td>" . $row['tempo_de_carregamento'] . "</td>
                              <td>" . $row['status_agua'] . "</td> 
                              <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"ModificarAgua('" . $row['id_bateria'] . "')\">
                          Alterar
                        </button></td>     
                        <td>" . "</td>
                              </tr>";

                    }

                    $sql = "select * from entrada_bateria where status = 'Carregada' and equipamento = 'EMPILHADEIRA' ORDER BY hora_recarga";

                    $r = mysqli_query($link, $sql);


                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr class='verde'>
      <td class='mdl-data-table__cell--non-numeric'>" . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['id_bateria'] . "</td>
      <td>" . "</td>
      <td>" . $row['status'] . "</td>
      <td>" . "</td>
      <td>" . $row['tempo_de_carregamento'] . "</td>
      <td>" . $row['status_agua'] . "</td> 
      <td></td>
       <td>" . "</td>     
      </tr>";

                    }


                    $sql = "select * from entrada_bateria where status = 'Carregada' and equipamento = 'Transpaleteira' ORDER BY hora_recarga";

                    $r = mysqli_query($link, $sql);


                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr class='verde'>
      <td class='mdl-data-table__cell--non-numeric'>" . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['id_bateria'] . "</td>
      <td>" . "</td>
      <td>" . $row['status'] . "</td>
      <td>" . "</td>
      <td>" . $row['tempo_de_carregamento'] . "</td>
      <td>" . $row['status_agua'] . "</td> 
      <td></td>
       <td>" . "</td>     
      </tr>";

                    }

                    $sql = "select * from entrada_bateria where status = 'Carregando'";

                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr class='amarelo'>
                              <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
                              <td>" . $row['equipamento'] . "</td>
                              <td >" . $row['id_bateria'] . "</td>
                              <td>" . $row['hora_recarga'] . "</td>
                              <td>" . $row['status'] . "</td>
                              <td>" . $row['numero_carregador'] . "</td>
                              <td>" . $row['tempo_de_carregamento'] . "</td>
                              <td>" . $row['status_agua'] . "</td>
                              <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"ModificarStatus('" . $row['id_bateria'] . "')\">
                          Alterar
                        </button></td>  
                         <td>" . "</td>    
                              </tr>";

                    }


                    $sql = "select * from entrada_bateria where status = 'EM USO'";

                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td >" . $row['id_bateria'] . "</td>                              
      <td>" . "</td>
      <td>" . $row['status'] . "</td>
      <td>" . $row['numero_carregador'] . "</td>
      <td>" . $row['tempo_de_carregamento'] . "</td>
      <td>" . $row['status_agua'] . "</td> 
      <td style='background: lightgray'></td>     
       <td>" . $row['data_saida'] . "</td>
      </tr>";

                    }

                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    date_default_timezone_set('America/sao_Paulo');
                    $hora = date('H');
                    $min = date('i');
                    $data = "$hora:$min";
                    $sql = "select * from entrada_bateria where status = 'repouso' ORDER BY hora_recarga LIMIT 1 ";

                    $ra = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($ra)) {
                        $data_entrada = split(" ", $row['data_entrada']);
                        $data_atual = date('Y-m-d');
                        if ($row['hora_recarga'] <= $data || strtotime($data_entrada[0]) < strtotime($data_atual)) {
                            $prompt_msg = "Bateria $row[id_bateria], Pronta Para Ser Carregada!";
                            echo "<script>prompts('$prompt_msg', '$row[id_bateria]')</script>";

                        }

                    }


                    ?>

                </b>

                <!--Alert Dialog-->
                </br>
                <script type="text/javascript">
                    $('document').ready(function () {
                        var utilizador = <?php echo "$erro" ?>;
                        if (utilizador == 1) {
                            var dialog = document.querySelector('.trocar');
                            dialog.showModal();
                        } else if (utilizador == 5) {
                            var dialog2 = document.querySelector('.pegar');
                            dialog2.showModal();
                        } else if (utilizador == 2 || utilizador == 4) {
                            var dialog3 = document.querySelector('.pegar');
                            dialog3.showModal();
                        } else if (utilizador == 09) {
                            var dialog4 = document.querySelector('.saida');
                            dialog4.showModal();
                        } else if (utilizador == 44 || utilizador == 77) {
                            var dialog5 = document.querySelector('.saida');
                            dialog5.showModal();
                        }


                    });
                </script>
                <script type="text/javascript">
                    function EnterTab(InputId, Evento) {

                        if (Evento.keyCode == 13) {

                            document.getElementById(InputId).focus();

                        }

                    }


                </script>
                <!--alert dialog -->
                <div id="teste">
                    <dialog class="mdl-dialog trocar" id="alert" name="alert">
                        <div class="mdl-dialog__content">
                            <p>
                            <h4 align="center" style="margin-top:-20px; color: black;">Trocar de baterias </h4>
                            </p>

                            <h6 align="center"> <?php if ($erro == 1) {

                                    echo "<font color = '#ff0000'>Senha ou bip incorreto!</font>";
                                } else if ($erro == 6) {
                                    echo "<font color = '#ff0000'>ERRO INTERNO!</font>";
                                } ?></h6>
                        </div>
                        <div class="mdl-textfield" style="margin-bottom: 20px;">
                            <input class="mdl-textfield__input" type="text" id="bip" name="bip" autocomplete="off"
                                   onkeydown="javascript:EnterTab('tempo',event)" onclick="verificacaoTrocar2()"/>
                            <label class="mdl-textfield__label" for="username" id="nome" style="margin-top: 10px;">Passe
                                o bip</label>
                        </div>
                        <div class="mdl-textfield">
                            <input class="mdl-textfield__input" type="text" id="tempo"
                                   style="margin-top: -10px; " name="senhaFunc"
                                   onkeydown="javascript:EnterTab('senhaFunc',event)" onclick="verificacaoTrocar2()"/>
                            <label class="mdl-textfield__label" for="username" id="temp">Digite O Tempo</label>
                        </div>
                        <div class="mdl-textfield">
                            <input class="mdl-textfield__input" type="password" id="senhaFunc"
                                   style="margin-top: -10px; " name="senhaFunc"
                                   onkeydown="javascript:EnterTab('btnTrocar',event)" onclick="verificacaoTrocar2()"/>
                            <label class="mdl-textfield__label" for="username" id="senha" style="margin-top: 10px;">Digite
                                Sua Senha</label>
                        </div>
                        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                            <button type="button" id="btnTrocar" class="button buttonBlue btnTrocar"
                                    onclick="verificacaoTrocar()">OK
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>
                            <button type="button" class="button buttonRed trocarVoltar">Cancelar
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>
                        </div>
                    </dialog>
                    <!-- segunda tela alert-->


                    <dialog class="mdl-dialog pegar" id="pegar" name="pegar">
                        <div class="mdl-dialog__content">
                            <p>

                            <h3 align="center" style="margin-top:-20px; color: black;">Pegar baterias </h3>
                            <?php


                            $senha = $_SESSION['senhaFunc'];

                            $sql = "select * from usuarios where senha = '$senha' ";
                            $r = mysqli_query($link, $sql);
                            $con = mysqli_fetch_array($r);

                            $sql1 = "select * from entrada_bateria where status = 'carregada' AND equipamento = '$con[equipamento]' ORDER BY hora_recarga";
                            $r1 = mysqli_query($link, $sql1);
                            $con1 = mysqli_fetch_array($r1);
                            echo "</br>";
                            echo "<br> <h4 align=\"center\" style=\"margin-top:-16px; margin-left: -20px; color: black;\" ><b>BATERIA: $con1[id_bateria]</b></h4>";
                            ?>
                            </p>

                            <h6 align="center"> <?php if ($erro == 2) {

                                    echo "<font color = '#ff0000'>Você Pegou a Bateria Errada</font>";
                                } else if ($erro == 4) {
                                    echo "<font color = '#ff0000'>Senha ou bip Incorreto!</font>";
                                } ?></h6>
                        </div>
                        <div class="mdl-textfield" style="margin-bottom: 20px;">
                            <input class="mdl-textfield__input" type="text" id="bip2" name="bip2"
                                   onkeydown="javascript:EnterTab('btnPegar',event)" onclick="verificacaoPegar2()"/>
                            <label class="mdl-textfield__label" for="username" id="nome2" style="margin-top: 10px;">Passe
                                o bip</label>
                        </div>

                        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                            <button type="button" id="btnPegar" class="button buttonBlue btnPegar"
                                    onclick="verificacaoPegar()">OK
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>
                        </div>
                    </dialog>

                    <dialog class="mdl-dialog saida" id="saida" name="saida">
                        <div class="mdl-dialog__content">
                            <p>

                            <h3 align="center" style="margin-top:-20px; color: black;">Pegar baterias </h3>


                            <h6 align="center"> <?php if ($erro == 77) {

                                    echo "<font color = '#ff0000'>Você Pegou a Bateria Errada</font>";
                                } else if ($erro == 44) {
                                    echo "<font color = '#ff0000'>Senha ou bip Incorreto!</font>";
                                } ?></h6>
                        </div>
                        <div class="mdl-textfield" style="margin-bottom: 20px;">
                            <input class="mdl-textfield__input" type="text" id="bip3" name="bip3"
                                   onkeydown="javascript:EnterTab('funcSenha',event)" onclick="verificacaoSaida2()"/>
                            <label class="mdl-textfield__label" for="username" id="nomeSaida" style="margin-top: 10px;">Passe
                                o bip</label>
                        </div>
                        <div class="mdl-textfield">
                            <input class="mdl-textfield__input" type="password" id="funcSenha"
                                   style="margin-top: -10px; " name="funcSenha"
                                   onkeydown="javascript:EnterTab('btnSaida',event)" onclick="verificacaoSaida2()"/>
                            <label class="mdl-textfield__label" for="username" id="senhaSaida">Digite Sua Senha</label>
                        </div>
                        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                            <button type="button" id="btnSaida" class="button buttonBlue btnSaida"
                                    onclick="verificacaoSaida()">OK
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>
                        </div>
                        <div class="mdl-dialog__actions mdl-dialog__actions--full-width">
                            <button type="button" class="button buttonRed trocarVoltar2">Cancelar
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>
                        </div>
                    </dialog>


                </div>
                <script>

                    var dialog = document.querySelector('.trocar');
                    var showModalButton = document.querySelector('.chamaAlerta');
                    var btnCan = document.querySelector('.btnTrocar');
                    if (!dialog.showModal) {
                        dialogPolyfill.registerDialog(dialog);

                    }
                    showModalButton.addEventListener('click', function () {
                        dialog.showModal();
                    });

                    dialog.querySelector('.trocarVoltar').addEventListener('click', function () {
                        dialog.close();
                    });


                    var dialog2 = document.querySelector('.pegar');
                    var showModalButton2 = document.querySelector('.chamaPegar');
                    var btnCan2 = document.querySelector('.btnPegar');
                    if (!dialog2.showModal) {
                        dialogPolyfill.registerDialog(dialog2);

                    }

                    var dialog8 = document.querySelector('.saida');

                    dialog8.querySelector('.trocarVoltar2').addEventListener('click', function () {
                        window.location.href = "layoutReserva.php";
                    });

                </script>
            </div>

        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-2">

            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--1-col"><img
                            style="margin-top: 10px; margin-right: 20px; margin-left:20px; margin-bottom: -10px;"
                            onclick="imprimir()" src="Dependencias/impresora.png" width="20px" height="20px"></div>
                <div class="mdl-cell mdl-cell--2-col"><input onkeydown="javascript:EnterTab('btn-pesquisa',event)"
                                                             class="mdl-textfield__input" type="date" id="input-data"
                                                             style=" margin-top: 6px; margin-left:10%; width: 150px;">
                </div>
                <div class="mdl-cell mdl-cell--1-col"><button  class="mdl-button mdl-js-button mdl-js-ripple-effect" id="btn-pesquisa" onclick="selectData()"><img
                                                           style="margin-top: 0px; margin-left: 0%; margin-bottom: -15px;"
                                                            src="Dependencias/lupa.png" width="20px"
                                                           height="20px"></button></div>

            </div>

            <div id="sua_div" class="page-content" style="margin-top: 2%;" align="center"><b>
                    <?php


                    echo " <div class='page-content' style='padding-left: 1%;'>";
                    echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                    echo "<thead>
      <tr class='titulos'>
      <td>responsavel</td>
      <td><center>Número <br> da <br>Bateria</center></td>
      <td>Verificou Água</td>
      <td>Data Da Alteração Da Água</td>
      <td>Finalizou Repouso</td>
      <td>Data Alteração Carregamento</td>
      <td>Finalizou Carregamento</td>
      <td>Data De Finalização</td>
      </tr>

    </thead>";
                    echo "<tbody>";
                    $sql = "select * from historico WHERE 1 ORDER BY id_historico DESC ";
                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
      <td>" . $row['numero_bateria'] . "</td>
      <td>" . $row['alterou_agua'] . "</td>
      <td>" . $row['data_alteracao_agua'] . "</td>
      <td>" . $row['finalizou_repouso'] . "</td>
      <td>" . $row['data_finalizacao_repouso'] . "</td>
      <td>" . $row['finalizou_carregamento'] . "</td>
      <td>" . $row['data_finalizacao'] . "</td>
      </tr>";

                    }


                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    ?>

                </b>

                </b></br>
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-3">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--1-col"><img
                            style="margin-top: 10px; margin-right: 20px; margin-left:20px; margin-bottom: -10px;"
                            onclick="imprimirRelatorio()" src="Dependencias/impresora.png" width="20px" height="20px">
                </div>
                <div class="mdl-cell mdl-cell--2-col"><input onkeydown="javascript:EnterTab('btn-relatorio',event)"
                                                             class="mdl-textfield__input" type="date"
                                                             id="input-data-relatorio"
                                                             style=" margin-top: 6px; margin-left:10%; width: 150px;">
                </div>
                <div class="mdl-cell mdl-cell--1-col">
                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect" onclick="selectDataRelatorio()"
                            id="btn-relatorio"><img style="margin-top: 0px; margin-left: 0%; margin-bottom: -15px;"
                                                    src="Dependencias/lupa.png" width="20px" height="20px"></button>
                </div>

            </div>
            <div id="relatorio" class="page-content" style="margin-top: 2%;" align="center"><b>
                    <?php


                    echo " <div class='page-content' style='padding-left: 1%;'>";
                    echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                    echo "<thead>
      <tr class='titulos'>
      
      <td>responsavel</td>
      <td><center>Equipamento</center></td>
      <td>Nº<br> Bateria</td>
      <td>Durabilidade</td>
      <td>Entrada</td>
      <td>Saida</td>
      
      </tr>

    </thead>";
                    echo "<tbody>";


                    $sql = "select * from relatorio WHERE 1 ORDER BY id_relatorio DESC ";

                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['id_bateria'] . "</td>
      <td>" . $row['durabilidade'] . "</td>
      <td>" . $row['entrada_bateria'] . "</td>
      <td>" . $row['saida_bateria'] . "</td>
  
      </tr>";

                    }


                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    ?>

                </b>
                </b></br></div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-4">
            <div class="mdl-cell mdl-cell--1-col"><img
                        style="margin-top: 10px; margin-right: 20px; margin-left:20px; margin-bottom: -10px;"
                        onclick="imprimirEstoque()" src="Dependencias/impresora.png" width="20px" height="20px"></div>


            <div class="page-content" style="margin-top: 2%;" align="center" id="div_estoque">

                <?php


                echo " <div class='page-content' style='padding-left: 1%;'>";
                echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                echo "<thead>
      <tr class='titulos'>
      <td><center>Descrição</center></td>
      <td><center>Quantidade</center></td>
      <td><center>Entrada</center></td>
      <td><center>Saída</center></td>
      
      
      </tr>

    </thead>";
                echo "<tbody>";


                $sql = "select * from estoque where 1";

                $r = mysqli_query($link, $sql);

                while ($row = mysqli_fetch_array($r)) {
                    echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['descricao'] . "</td>
      <td><center>" . $row['quantidade'] . "</center></td>  
      <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\"  id='add' name='add' onclick=\"adicionarEstoque('" . $row['id_estoque'] . "')\" style='background: slategrey; color: white';>
                          Adicionar
                          
                        </button></td> 
      <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" id='remover' name='remover' style='background: slategrey; color: white' onClick=\"removerEstoque('" . $row['id_estoque'] . "')\">
                          Remover
                        </button></td> 
                        
      </tr>";

                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";

                ?>

                </b>
                </br></div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-5">


            <div id="sua_div_1" class="page-content" style="margin-top: 2%;" align="center"><b>
                    <?php


                    echo " <div class='page-content' style='padding-left: 1%;'>";
                    echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                    echo "<thead>
      <tr class='titulos'>
      <td><center>Número <br> da <br>Bateria</center></td>
      <td><center>Data <br> Da <br> lavagem</center></td>
      <td>Alterar</td>
     
      </tr>

    </thead>";
                    echo "<tbody>";
                    $sql = "select * from lavagem WHERE 1 ";
                    $r = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_array($r)) {
                        echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['numero_bateria'] . "</td>
            <td class='mdl-data-table__cell--non-numeric'>" . $row['data'] . "</td>
      <td><button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect' onclick='window.location.href = \"alterarLa.php?id=$row[numero_bateria]\"'>Alterar</button>" . "</td>
      </tr>";

                    }


                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";

                    ?>

                </b>

                </b></br>
            </div>
        </section>
    </main>
</div>
<dialog class="mdl-dialog pesquisa" style="width: auto; height: auto;">
    <img onclick="window.location.href = 'layoutReserva.php'" src="Dependencias/fechar.png" width="30px" height="30px"
         style="margin-left:95%; margin-top: 10px; position: fixed">
    <img style="margin-top: 10px; margin-right: 20px; margin-left:20px; margin-bottom: -10px;"
         onclick="imprimirPesquisa()" src="Dependencias/impresora.png" width="30px" height="30px">

    <h4 class="mdl-dialog__title">
        <center>Listagem</center>
    </h4>
    <div id="historicoPesquisa" class="page-content" style="margin-top: 2%;" align="center"><b>
            <?php


            echo " <div class='page-content' style='padding-left: 1%; align-self: center; '>";
            echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
            echo "<thead>
      <tr class='titulos'>
      <td>responsavel</td>
      <td><center>Número <br> da <br>Bateria</center></td>
      <td>Verificou Água</td>
      <td>Data Da Alteração Da Água</td>
      <td>Finalizou Repouso</td>
      <td>Data Alteração Carregamento</td>
      <td>Finalizou Carregamento</td>
      <td>Data De Finalização</td>
      </tr>

    </thead>";
            echo "<tbody>";
            $data1 = $_SESSION['data1'];
            $data2 = $_SESSION['data2'];
            echo "<br>";
            $sql = "select * from historico WHERE data_finalizacao_repouso <= '$data1'AND data_finalizacao_repouso >= '$data2'  ORDER BY id_historico DESC ";
            $r = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_array($r)) {
                echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
      <td>" . $row['numero_bateria'] . "</td>
      <td>" . $row['alterou_agua'] . "</td>
      <td>" . $row['data_alteracao_agua'] . "</td>
      <td>" . $row['finalizou_repouso'] . "</td>
      <td>" . $row['data_finalizacao_repouso'] . "</td>
      <td>" . $row['finalizou_carregamento'] . "</td>
      <td>" . $row['data_finalizacao'] . "</td>
      </tr>";

            }


            echo "</tbody>";
            echo "</table>";
            echo "</div>";

            ?>
        </b>
        </b></br></div>
</dialog>
<dialog class="mdl-dialog relatoriopesquisa" style="width: auto; height:auto;">

    <img onclick="window.location.href = 'layoutReserva.php'" src="Dependencias/fechar.png" width="30px" height="30px"
         style="margin-left: 95%; position: fixed">
    <img style="margin-top: 10px; margin-right: 20px; margin-left:20px; margin-bottom: -10px;"
         onclick="imprimirRelatorioPesquisa()" src="Dependencias/impresora.png" width="20px" height="20px">
    <h4 class="mdl-dialog__title">
        <center>Listagem Relatorio</center>
    </h4>

    <div id="relatorioPesquisa" class="page-content" style="margin-top: 2%;" align="center"><b>
            <?php


            echo " <div class='page-content' style='padding-left: 1%;'>";
            echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
            echo "<thead>
      <tr class='titulos'>
      
      <td>responsavel</td>
      <td><center>Equipamento</center></td>
      <td>Nº<br> Bateria</td>
      <td>Durabilidade</td>
      <td>Entrada</td>
      <td>Saida</td>
      
      </tr>

    </thead>";
            echo "<tbody>";


            $sql = "select * from relatorio WHERE entrada_bateria <= '$data1' and entrada_bateria >= '$data2' ORDER BY id_relatorio DESC ";

            $r = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_array($r)) {
                echo "<tr style = 'background: lightgray;'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['responsavel'] . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['id_bateria'] . "</td>
      <td>" . $row['durabilidade'] . "</td>
      <td>" . $row['entrada_bateria'] . "</td>
      <td>" . $row['saida_bateria'] . "</td>
  
      </tr>";

            }


            echo "</tbody>";
            echo "</table>";
            echo "</div>";

            ?>

        </b>
        </b></br></div>
</dialog>
<dialog class="mdl-dialog addestoque">
    <h4 class="mdl-dialog__title">Adicionar</h4>
    <input type="hidden" id="tela_add">
    <div class="mdl-dialog__content">
        <label>Quantidade</label>
        <input id="input_add"onkeydown="javascript:EnterTab('btn_add',event)" type="number"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn_add" onclick="add_estoque()">Entrar</button>
        <button type="button" class="mdl-button close7">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog removerestoque">
    <h4 class="mdl-dialog__title">Remover</h4>
    <input type="hidden" id="tela">
    <div class="mdl-dialog__content">
        <label>Quantidade</label>
        <input id="input_remover" onkeydown="javascript:EnterTab('btn_remover',event)" type="number"
               class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn_remover" onclick="remover_estoque()">Entrar</button>
        <button type="button" class="mdl-button close8">Cancelar</button>
    </div>
</dialog>

<!-- codigos De Impressão-->
<script>
    var pes = <?php echo "$erro" ?>;
    if (pes == 666) {
        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-2").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#2").addClass("is-active");
        });

        var dialog_pesquisa = document.querySelector('.pesquisa');
        dialog_pesquisa.showModal();

    }
    if (pes == 765) {
        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-4").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#4").addClass("is-active");
        });

    }
    if (pes == 007) {
        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-5").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#5").addClass("is-active");
        });

    }
    if (pes == 7651) {

        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-4").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#4").addClass("is-active");
        });
        alert("Quantidade Invalida !");

    }
    if (pes == 222) {
        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-3").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#3").addClass("is-active");
        });

        var dialog_pesquisa1 = document.querySelector('.relatoriopesquisa');
        dialog_pesquisa1.showModal();

    }
    if (pes == 4444) {
        $(document).ready(function () {
            $("#scroll-tab-1").removeClass("is-active");
            $("#scroll-tab-4").addClass("is-active");
            $("#1").removeClass("is-active");
            $("#4").addClass("is-active");
        });
    }


    function selectData() {
        var dataSelect = document.getElementById('input-data').value;
        if (dataSelect != "") {
            window.location.href = "ListaData.php?data=" + dataSelect;
        }
    }

    function selectDataRelatorio() {
        var dataSelect = document.getElementById('input-data-relatorio').value;
        if (dataSelect != "") {
            window.location.href = "ListaDataRelatorio.php?data=" + dataSelect;
        }
    }

    function imprimirRelatorio() {
        var conteudo = document.getElementById('relatorio').innerHTML,
            tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

    function imprimirRelatorioPesquisa() {
        var conteudo = document.getElementById('relatorioPesquisa').innerHTML,
            tela_impressao = window.open('about:blank');
        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

    function imprimir() {
        var conteudo = document.getElementById('sua_div').innerHTML,
            tela_impressao = window.open('about:blank');

        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

    function imprimirEstoque() {
        var conteudo = document.getElementById('div_estoque').innerHTML,
            tela_impressao = window.open('about:blank');

        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

    function imprimirPesquisa() {
        var conteudo = document.getElementById('historicoPesquisa').innerHTML,
            tela_impressao = window.open('about:blank');

        tela_impressao.document.write(conteudo);
        tela_impressao.window.print();
        tela_impressao.window.close();
    }

</script>
<script>
    function validaE(a) {
        if (a == 1) {
            var dialogE = document.querySelector('.cadastra');
            dialogE.showModal();
            dialogE.querySelector('.close2').addEventListener('click', function() {
                dialogE.close();
            });
        }
        if (a == 2) {
            var dialogE = document.querySelector('.remove');
            dialogE.showModal();
            dialogE.querySelector('.close3').addEventListener('click', function() {
                dialogE.close();
            });
        }
        if (a == 3) {
            var dialogE = document.querySelector('.lista');
            dialogE.showModal();
            dialogE.querySelector('.close4').addEventListener('click', function() {
                dialogE.close();
            });
        }
        if (a == 4) {
            var dialogE = document.querySelector('.estoque');
            dialogE.showModal();
        }
    }
</script>
<!-- Aviso Finalizar Repouso -->
<script>
    function prompts2(msg,id) {
        document.getElementById('texto').value = msg;
        document.getElementById('id_bateria').value = id;
        var dialog6 = document.querySelector('.ModificaStatusRepouso');
        dialog6.showModal();
    }

    function enviaStatusRepouso() {
        var id = document.getElementById('id_bateria').value;
        var senha = document.getElementById('senhaC').value;
        var carregador = document.getElementById('Carregador').value;
        if (senha != "" && carregador != "") {
            window.location.href = "ExecutandoCarregamento.php?object=" + carregador + ":" + id + ":" + senha;
        }
    }

</script>
<!-- script envia status Agua -->
<script>

    function ModificarAgua(id) {
        document.getElementById('id_bateria_agua').value = id;
        var dialog5 = document.querySelector('.ModificaStatusAgua');
        dialog5.showModal();
        dialog5.querySelector('.close5').addEventListener('click', function() {
            dialog5.close();
        });
    }

    function enviaStatusAgua() {
        var id = document.getElementById("id_bateria_agua").value;
        var op = document.getElementById("op").value;
        var senha = document.getElementById('senha2').value;
        if (senha != "") {
            window.location.href = "AlterarStatusAgua.php?Valor=" + senha + "_" + op + "_" + id;
        }
    }

</script>
<!-- script envia status Tempo -->
<script>

    function ModificarStatus(id) {
        document.getElementById('id_bateria_tempo').value = id;
        var dialog4 = document.querySelector('.ModificaStatus');
        dialog4.showModal();
        dialog4.querySelector('.close1').addEventListener('click', function() {
            dialog4.close();
        });
    }

    function enviaStatus() {
        var id = document.getElementById('id_bateria_tempo').value;
        var senha = document.getElementById("senhaP").value;
        var tempo = document.getElementById('tempo1').value;
        if (senha != "" && tempo != "") {
            window.location.href = "AlterarStatusTempo.php?Valor=" + senha + "_" + tempo + "_" + id;
        }
    }

</script>

<!-- script add estoque -->
<script>
    function add_estoque() {
        var tela = document.getElementById('tela_add').value;
        var qnt = document.getElementById('input_add').value;
        if (qnt != "") {
            window.location.href = "adicionarEstoque.php?add=" + qnt + "_" + tela;
        }
    }

    function enviaAddEstoque(id) {
        document.getElementById('tela_add').value = id;
        var dialog7 = document.querySelector('.addestoque');
        dialog7.showModal();
        dialog7.querySelector('.close7').addEventListener('click', function() {
            dialog7.close();
        });
    }
</script>
<!-- script remover estoque -->
<script>

    function remover_estoque() {
        var tela = document.getElementById('tela').value;
        var qnt = document.getElementById('input_remover').value;
        if (qnt != "") {
            window.location.href = "removerEstoque.php?remover=" + qnt + "_" + tela;
        }
    }

    function enviaRemoverEstoque(id) {
        document.getElementById('tela').value = id;
        var dialog8 = document.querySelector('.removerestoque');
        dialog8.showModal();
        dialog8.querySelector('.close8').addEventListener('click', function() {
            dialog8.close();
        });
    }
</script>

</body>
</html>
