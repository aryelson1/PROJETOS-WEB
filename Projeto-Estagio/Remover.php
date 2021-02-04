<?php
$erro = isset($_GET['erro'])?$_GET['erro']:0;
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <!-- material design lite -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="mdl/material.js"></script>
    <link rel="stylesheet" type="text/css" href="mdl/material.css">

    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="css.css">
    <!--Jquery -->
    <script src="Dependencias/jquery-3.2.1.min.js"></script>
    <!-- BootStrap -->
    <script src="Dependencias/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Dependencias/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <!-- BootBox-->
    <script src="Dependencias/bootbox.min.js"></script>
    <script>
        function removerAdministrador(id) {
            window.location.href="ExecutarRemocaoAdministrador.php?id="+id;

        }
        function removerPeca(id) {
            window.location.href="ExecutarRemocaoPeca.php?id="+id;
        }
        function removerFuncionario(id) {
            window.location.href="ExecutarRemocaoFuncionario.php?id="+id;

        }

        function removerBateria(id) {
            window.location.href="ExecutarRemocaoBateria.php?id="+id;

        }
        function Confirmar(tela) {
            var texto = "<div class=\"form-group\" >" +
                "<label class=\"col-sm-3 control-label\" style='color: black; font-size: 14px; margin-left: -3%; margin-top: -5%; '>Password</label>" +
                "<div class=\"col-sm-5\">" +
                "<input style='margin-left: 35%; margin-top: -11%; ' type=\"password\" class=\"form-control\" name=\"senha\" id='senha123' />" +
                "</div></div>";
            bootbox.dialog({
                message: texto,
                title: "Senha Do Administrador",
                buttons: {
                    main: {
                        label: "Confirmar",
                        className: "btn-primary",
                        callback: function () {
                            var senha = document.getElementById('senha123').value;
                            if (senha != "") {
                                window.location.href = "validarADM.php?senhaAdmin=" + senha + "_" + tela;
                            }
                        }
                    }
                }
            })
        }
    </script>
    <style type="text/css">
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
            padding-top: 2%;
            background: #fafafa;
            position: relative;

        }

        .personalizar {
            width: 15%;

        }

    </style>
    <script type="text/javascript">
        function EnterTab(InputId, Evento) {

            if (Evento.keyCode == 13) {

                document.getElementById(InputId).focus();

            }

        }


    </script>
    <script>
        function enviaTela1() {
            var senha = document.getElementById('senha_cadastra').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_1";
        }
        function enviaTela3() {
            var senha = document.getElementById('senha_lista').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_3";
        }
    </script>
</head>
<body>
<dialog class="mdl-dialog cadastra">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <input id="senha_cadastra" onkeydown="javascript:EnterTab('btn1',event)" type="password" class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn1" onclick="enviaTela1()">Entrar</button>
        <button type="button" class="mdl-button close4">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog lista">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <input id="senha_lista" onkeydown="javascript:EnterTab('btn3',event)" type="password" class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn3" onclick="enviaTela3()">Entrar</button>
        <button type="button" class="mdl-button close5" >Cancelar</button>
    </div>
</dialog>
<!-- Simple header with scrollable tabs. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Controle De Baterias</span>

        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active" id="1">Remover Funcionários</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab" id="2">Remover Administradores</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab" id="3">Remover Baterias</a>
            <a href="#scroll-tab-4" class="mdl-layout__tab" id="4">Remover Peça</a>

        </div>
    </header>

            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="layoutReserva.php" style="color: black;">Gerenciador De Baterias</a>
                    <a class="mdl-navigation__link" onclick="validaE(1)" style="color: black;">Adicionar</a>
                    <a class="mdl-navigation__link" onclick="validaE(3)" style="color: black;">Listar</a>
                    <a class="mdl-navigation__link" href="index.php" style="color: black;">Sair</a>

                </nav>
            </div>


    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
            <div class="page-content"><b>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--2-col"></div>
                        <!-- começa o uso do PHP -->
                        <?php
                        require('banco.php');

                        $banco = new Banco_bateria();
                        $link = $banco->conecta_mysql();
                        echo "<div class='mdl-cell mdl-cell--8-col'>";
                        echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                        echo "<thead>
      <tr class='titulos'>
      
      <td><center>ID Do </br> Funcionário</center></td>
      <td><center>Nome Do </br> Funcionário</center></td>
      <td><center>Equipamento</center></td>
      <td><center>ADM Que </br>Cadastrou</center></td>
      <td><center>Data </br>E Hora Do </br>Cadastramento</center></td>   
      <td><center>Remover</center></td>   
      </tr>

    </thead>";

                        echo "<tbody>";

                        $sql = "select id, nome, equipamento, nome_Adm,status ,data_cadastro from usuarios where status = 'ativo'";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr class='branco'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['id'] . "</td>
      <td>" . $row['nome'] . "</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['nome_Adm'] . "</td>
      <td>" . $row['data_cadastro'] . "</td>   
       <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"removerFuncionario('" . $row['id'] . "')\">
                          Excluir
                        </button></td>        
      </tr>";

                        }
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";

                        ?>
                        <div class="mdl-cell mdl-cell--2-col"></div>
                    </div>



        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-2">
            <div class="page-content">
                <b>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col"></div>

                        <!-- começa o uso do PHP -->
                        <?php

                        echo "<div class='mdl-cell mdl-cell--7-col'>";
                        echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                        echo "<thead>
      <tr class='titulos'>
      
      <td><center>ID Do</br> Administrador</center></td>
      <td><center>Nome Do</br> Administrador</center></td>
      <td><center>ADM Que</br> Cadastrou</center></td>
      <td><center>Data E Hora</br> Do Cadastramento</center></td>
      <td><center>Remover</center></td>      
      </tr>

    </thead>";
                        echo "<tbody>";

                        $sql = "select id, nome, nome_cadastrante ,data_cadastro from administradores where 1";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['id'] . "</td>
      <td>" . $row['nome'] . "</td>
      <td>" . $row['nome_cadastrante'] . "</td>
      <td>" . $row['data_cadastro'] . "</td> 
      <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"removerAdministrador('" . $row['id'] . "')\">
                          Excluir
                        </button></td>          
      </tr>";

                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";

                        ?>
                        <div class="mdl-cell mdl-cell--2-col"></div>
                    </div>


        </section>
        <script>
            var erro1 = <?php echo "'$erro'";?>;
            if(erro1 == "4a"){
                $(document).ready(function () {
                    $("#scroll-tab-1").removeClass("is-active");
                    $("#scroll-tab-2").addClass("is-active");
                    $("#1").removeClass("is-active");
                    $("#2").addClass("is-active");
                });
            }

        </script>
        <section class="mdl-layout__tab-panel" id="scroll-tab-3">

            <div class="page-content"><b>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--3-col"></div>
                        <?php

                        echo "<div class='mdl-cell mdl-cell--7-col style='align-self''>";
                        echo " <div class='page-content'>";
                        echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                        echo "<thead>
          <tr class='titulos'>
          <td><center>Número</br> da</br> Bateria</center></td>
          <td><center>Codígo</br> do Bip</center></td>
          <td><center>Nome do </br>Administrador</center></td>
          <td><center>Data e </br>Hora De</br> Cadastro</center></td>
          <td>Remover</td>
          </tr>
          </thead>";
                        echo "<tbody>";

                        $sql = "select * from baterias where 1";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr class='branco'>
          <td class='mdl-data-table__cell--non-numeric'>" . $row['id'] . "</td>
          <td>" . $row['codigo_bip'] . "</td>
          <td>" . $row['nome_adm'] . "</td>
          <td>" . $row['data_cadastro'] . "</td>     
          <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"removerBateria('" . $row['id'] . "')\">
                          Excluir
                        </button></td> 
          </tr>";

                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                        <div class="mdl-cell mdl-cell--2-col"></div>
                    </div>



        </section>
        <script>
            var erro1 = <?php echo "'$erro'";?>;
            if(erro1 == "4b"){
                $(document).ready(function () {
                    $("#scroll-tab-1").removeClass("is-active");
                    $("#scroll-tab-3").addClass("is-active");
                    $("#1").removeClass("is-active");
                    $("#3").addClass("is-active");
                });
            }

        </script>
        <section class="mdl-layout__tab-panel" id="scroll-tab-4">

            <div class="page-content"><b>
                    <div class="mdl-grid">
                        <div class="mdl-cell mdl-cell--4-col"></div>
                        <?php

                        echo "<div class='mdl-cell mdl-cell--6-col style='align-self''>";
                        echo " <div class='page-content'>";
                        echo "<table border='5px' class='mdl-data-table mdl-js-data-table  mdl-shadow--2dp'>";
                        echo "<thead>
          <tr class='titulos'>
          <td><center>ID Peça</center></td>
          <td><center>Descriçao</center></td>
          <td>Remover</td>
          </tr>
          </thead>";
                        echo "<tbody>";

                        $sql = "select * from estoque where 1";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr class='branco'>
          <td class='mdl-data-table__cell--non-numeric'>" . $row['id_estoque'] . "</td>
          <td>" . $row['descricao'] . "</td>
          <td><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect\" style='background: slategrey; color: white' onClick=\"removerPeca('" . $row['id_estoque'] . "')\">
                          Excluir
                        </button></td> 
          </tr>";

                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                        <div class="mdl-cell mdl-cell--2-col"></div>
                    </div>



        </section>
        <script>
            var erro1 = <?php echo "'$erro'";?>;
            if(erro1 == "4p"){
                $(document).ready(function () {
                    $("#scroll-tab-1").removeClass("is-active");
                    $("#scroll-tab-4").addClass("is-active");
                    $("#1").removeClass("is-active");
                    $("#4").addClass("is-active");
                });
            }

        </script>
    </main>
</div>
<script>
    function validaE(a) {
        if (a == 1){
            var dialogE = document.querySelector('.cadastra');
            dialogE.showModal();
            dialogE.querySelector('.close4').addEventListener('click', function() {
                dialogE.close();
            });
        }if(a == 3){
            var dialogE = document.querySelector('.lista');
            dialogE.showModal();
            dialogE.querySelector('.close5').addEventListener('click', function() {
                dialogE.close();
            });
        }
    }
</script>
</body>
</html>