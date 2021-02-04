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

        function enviaTela1() {
            var senha = document.getElementById('senha_cadastra').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_1";
        }
        function enviaTela2() {
            var senha = document.getElementById('senha_remove').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_2";
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
        <button type="button" class="mdl-button close4" >Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog remove">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <input id="senha_remove" onkeydown="javascript:EnterTab('btn2',event)" type="password" class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn2" onclick="enviaTela2()">Entrar</button>
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
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Listar Funcionários</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab">Listar Administradores</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab">Listar Baterias</a>
        </div>
    </header>


            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="layoutReserva.php" style="color: black;">Gerenciador De Baterias</a>
                    <a class="mdl-navigation__link" onclick="validaE(1)" style="color: black;">Adicionar</a>
                    <a class="mdl-navigation__link" onclick="validaE(2)" style="color: black;">Remover</a>
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
      
      <td><center>ID <br>Do Funcionário</center></td>
      <td><center>Nome <br>Do Funcionário</center></td>
      <td>Senha</td>
      <td>Equipamento</td>
      <td><center>ADM Que <br>Cadastrou</center></td>
      <td>Status</td>
      <td><center>Data E Hora <br>Do Cadastramento</center></td>      
      </tr>

    </thead>";
                        echo "<tbody>";

                        $sql = "select * from usuarios where 1";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr class='branco'>
      <td class='mdl-data-table__cell--non-numeric'>" . $row['id'] . "</td>
      <td>" . $row['nome'] . "</td>
      <td>".  $row['senha']  ."</td>
      <td>" . $row['equipamento'] . "</td>
      <td>" . $row['nome_Adm'] . "</td>
      <td>" . $row['status'] . "</td>
      <td>" . $row['data_cadastro'] . "</td>          
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
      
      <td><center>ID Do <br>Administrador</center></td>
      <td><center>Nome <br>Do Administrador</center></td>
      <td><center>ADM Que<br> Cadastrou</center></td>
      <td><center>Data E Hora<br> Do Cadastramento</center></td>      
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
      </tr>";

                        }

                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";

                        ?>
                        <div class="mdl-cell mdl-cell--2-col"></div>
                    </div>

        </section>
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
          <td><center>Número <br>da Bateria</center></td>
          <td><center>Codígo<br> do Bip</center></td>
          <td>Equipamento</td>
          <td><center>Nome<br> do Administrador</center></td>
          <td><center>Data<br> De  Cadastro</center></td>
          </tr>
          </thead>";
                        echo "<tbody>";

                        $sql = "select * from baterias where 1";

                        $r = mysqli_query($link, $sql);


                        while ($row = mysqli_fetch_array($r)) {
                            echo "<tr class='branco'>
          <td class='mdl-data-table__cell--non-numeric'>" . $row['numero_bateria'] . "</td>
          <td>" . $row['codigo_bip'] . "</td>
          <td>". $row['equipamento']."</td>
          <td>" . $row['nome_adm'] . "</td>
          <td>" . $row['data_cadastro'] . "</td>     
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

    </main>
</div>

</body>
<script>
    function validaE(a) {
        if (a == 1){
            var dialogE = document.querySelector('.cadastra');
            dialogE.showModal();
            dialogE.querySelector('.close4').addEventListener('click', function() {
                dialogE.close();
            });

        }if(a == 2){
            var dialogE = document.querySelector('.remove');
            dialogE.showModal();
            dialogE.querySelector('.close5').addEventListener('click', function() {
                dialogE.close();
            });
        }
    }
</script>
</html>