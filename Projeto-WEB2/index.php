<?php
session_start();
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
$cont = 0;
require('banco.php');

$banco = new Banco_eventos();
$link = $banco->conecta_mysql();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Material Design Lite</title>


    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.cyan-light_blue.min.css">
    <link rel="stylesheet" href="styles.css">
    <script rel="script" src="Dependencias/jquery-3.2.1.js"></script>
    <script rel="script" src="Dependencias/mask.js"></script>
    <script>

        function selecionaPreco(v) {
            if (v == "Casamento") {
                document.getElementById('preco').value = 22000;
                document.getElementById('preco1').value = 22000;
            }
            if (v == "Anivesario") {
                document.getElementById('preco').value = 10000;
                document.getElementById('preco1').value = 10000;
            }
            if (v == "Despedida De Solteiro") {
                document.getElementById('preco').value = 15000;
                document.getElementById('preco1').value = 15000;
            }
            if (v == "Formatura") {
                document.getElementById('preco').value = 20000;
                document.getElementById('preco1').value = 20000;

            }
        }

    </script>
</head>

<body>

<!-- Dialog Cadastro -->
<dialog class="mdl-dialog dialog-cadastro" style="margin: 45%">
    <h4 class="mdl-dialog__title">Cadastro</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="usuario.php">
            <input type="hidden" name="funcao" value="1">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_text_cadastro" class="mdl-textfield__label">Usuario</label>
                <input type="text" class="mdl-textfield__input" name="usuario" id="input_text_cadastro"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_email_cadastro" class="mdl-textfield__label">Email</label>
                <input type="text" class="mdl-textfield__input" name="email" id="input_email_cadastro"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="input_password_cadastro" class="mdl-textfield__label">Password</label>
                <input type="password" class="mdl-textfield__input" name="senha" id="input_password_cadastro"/>
            </div>
            <?php if ($erro == -122) {
                echo "<br><font color = '#ff0000'>Dados Invalidos !</font>";
            }
            ?>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Cadastrar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog login -->
<dialog class="mdl-dialog dialog-login" style="margin: 45%">
    <h4 class="mdl-dialog__title">Login</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="usuario.php  ">
            <input type="hidden" name="funcao" value="2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_email" class="mdl-textfield__label">Email</label>
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" class="mdl-textfield__input"
                       name="email" id="input_email"/>
            </div>


            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="input_password" class="mdl-textfield__label">Password</label>
                <input type="password" class="mdl-textfield__input" name="senha" id="input_password"/>
            </div>
            <?php if ($erro == -12) {
                echo "<br><font color = '#ff0000'>Email Ou Senha Incorreto !</font>";
            }
            ?>

    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Logar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Remover -->
<dialog class="mdl-dialog dialog-remover" style="margin: 45%; width: 350px;">
    <h4 class="mdl-dialog__title">Remover</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="usuario.php">
            <input type="hidden" name="funcao" value="3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <?php
                $email = $_SESSION['email'];
                echo "<h6>$email</h6>"
                ?>
            </div>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Remover</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Cadastro Funcionario -->
<dialog class="mdl-dialog dialog-funcionario" style="margin: 45%">
    <h4 class="mdl-dialog__title">Cadastro</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="funcionario.php">
            <input type="hidden" name="funcao" value="1">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_text_nome" class="mdl-textfield__label">Usuario</label>
                <input type="text" class="mdl-textfield__input" name="nome" id="input_text_nome"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_cpf_cadastro" class="mdl-textfield__label">CPF</label>
                <input type="text" class="mdl-textfield__input" name="cpf" id="input_cpf_cadastro"/>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label for="input_celular_cadastro" class="mdl-textfield__label">Celular</label>
                <input type="text" class="mdl-textfield__input" name="celular" id="input_celular_cadastro"/>
            </div>
            <?php if ($erro == 111) {
                echo "<br><font color = '#ff0000'>Dados Invalidos !</font>";
            }
            ?>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Cadastrar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Remover Funcionario -->
<dialog class="mdl-dialog dialog-remover-funcionario" style="margin: 45%; width: 350px;">
    <h4 class="mdl-dialog__title">Remover</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="funcionario.php">
            <input type="hidden" name="funcao" value="3">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="opcoes" name="opcoes">
                    <option></option>
                    <?php
                    $Usuarios = mysqli_query($link, "SELECT * FROM funcionarios WHERE 1");

                    while ($row = mysqli_fetch_array($Usuarios)) {
                        echo "<option value='$row[cpf]'>$row[nome] - $row[cpf]</option>";

                    } ?>
                </select>
                <label class="mdl-textfield__label" for="opcoes">Funcionarios</label>
            </div>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Remover</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Alterar Funcionario -->
<dialog class="mdl-dialog dialog-funcionario-alterar" style="margin: 45%">
    <h4 class="mdl-dialog__title">Alterar</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="funcionario.php">
            <input type="hidden" name="funcao" value="4">
            <input type="hidden" name="cpfAntigo" id="cpfAntigo">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label style="color: deepskyblue">Nome</label>
                <input type="text" class="mdl-textfield__input" name="nome" id="input_alterar_nome"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label style="color: deepskyblue">CPF</label>
                <input maxlength="14" type="text" class="mdl-textfield__input" name="cpf" id="input_cpf_alterar"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label style="color: deepskyblue">Celular</label>
                <input type="text" class="mdl-textfield__input" name="celular" id="input_celular_alterar"/>
            </div>
            <?php if ($erro == 111) {
                echo "<br><font color = '#ff0000'>Dados Invalidos !</font>";
            }
            ?>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Alterar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Cadastro Evento -->
<dialog class="mdl-dialog dialog-Evento" style="margin: 45%">
    <h4 class="mdl-dialog__title">Cadastro</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="Eventos.php">
            <input type="hidden" name="funcao" value="1">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_text_nome" class="mdl-textfield__label">Cliente</label>
                <input type="text" class="mdl-textfield__input" required name="nomeCliente" id="input_cliente_nome"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label for="input_cpf_cadastro" class="mdl-textfield__label">Local</label>
                <input type="text" class="mdl-textfield__input" required name="local" id="input_local"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select onchange="selecionaPreco(value)" required class="mdl-textfield__input" id="opcoes" name="opcoes">
                    <option></option>
                    <option value="Casamento">Casamento</option>
                    <option value="Anivesario">Anivesario</option>
                    <option value="Despedida De Solteiro">Despedida De Solteiro</option>
                    <option value="Formatura">Formatura</option>
                </select>
                <label class="mdl-textfield__label" for="opcoes">Tipo</label>
            </div>
            <input type="hidden" class="mdl-textfield__input" name="preco" id="preco"/>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label style="color: deepskyblue">Preço</label>
                <input style="color: black" type="" disabled class="mdl-textfield__input" id="preco1"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label style="color: deepskyblue">Data e Hora Inicial</label>
                <input type="datetime-local" class="mdl-textfield__input" required name="data_inicio" id="data_inicio"/>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label style="color: deepskyblue">Data e Hora Termino</label>
                <input type="date" class="mdl-textfield__input" required name="data_termino" id="data_termino"/>
            </div>
            <?php if ($erro == 5555) {
                echo "<br><font color = '#ff0000'>Dados Invalidos !</font>";
            }
            ?>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Cadastrar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Remover Evento -->
<dialog class="mdl-dialog dialog-remover-Evento" style="margin: 45%">
    <h4 class="mdl-dialog__title">Remover</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="Eventos.php">
            <input type="hidden" name="funcao" value="4">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <select class="mdl-textfield__input" id="opcoes" name="opcoes">
                    <?php
                    date_default_timezone_set('America/sao_Paulo');
                    $date = date('Y-m-d');

                    $Eventos = mysqli_query($link, "SELECT * FROM eventos WHERE data_inicial >= '$date' ");

                    while ($row = mysqli_fetch_array($Eventos)) {
                        echo "<option value='$row[id_evento]'>$row[id_evento] - $row[cliente]</option>";

                    } ?>
                </select>
                <label class="mdl-textfield__label" for="opcoes">Funcionarios</label>
            </div>
    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Remover</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Cadastro Funcionario Evento -->
<dialog class="mdl-dialog dialog-cadastra-FuncEvento" style="margin: 45%">
    <h4 class="mdl-dialog__title">Cadastro</h4>
    <div class="mdl-dialog__content">
        <form method="get" action="Eventos.php">
            <input type="hidden" name="funcao" value="2">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label style="color: deepskyblue">Eventos</label>
                <?php
                date_default_timezone_set('America/sao_Paulo');
                $date = date('Y-m-d');

                $eventos = mysqli_query($link, "SELECT * FROM eventos WHERE data_termino >= '$date'");
                echo " <select class=\"mdl-textfield__input\" id=\"eventos\" name=\"eventos\">";
                while ($row = mysqli_fetch_array($eventos)) {
                    echo "<option value=\"$row[id_evento]\">$row[id_evento] - $row[cliente]</option>";
                }
                echo "</select>"
                ?>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                <label style="color: deepskyblue">Funcionarios</label>
                <?php
                $funcionarios = mysqli_query($link, "SELECT * FROM funcionarios WHERE 1");
                echo " <select class=\"mdl-textfield__input\" id=\"funcionarios\" name=\"funcionarios\">";
                while ($row = mysqli_fetch_array($funcionarios)) {
                    echo "<option value=\"$row[cpf]\">$row[nome] - $row[cpf]</option>";
                }
                echo "</select>"
                ?>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label style="color: deepskyblue">Função</label>

                <select class="mdl-textfield__input" id="funcoes" name="funcoes">
                    <optgroup label="Buffet">
                        <option value="Garcon">Garçon</option>
                        <option value="Cozinheiro">Cozinheiro</option>
                        <option value="Bar Man">Bar Man</option>
                    </optgroup>
                    <optgroup label="Atendimento">
                        <option value="Recepcionista">Recepcionista</option>
                        <option value="Seguranca">Segurança</option>
                        <option value="Manobrista">Manobrista</option>
                        <option value="Fotografo ">Fotógrafo</option>
                    </optgroup>
                    <optgroup label="Tecnicos">
                        <option value="Tecnicos de Som ">Técnicos de Som</option>
                        <option value="Tecnicos de Vídeo">Técnicos de Vídeo</option>
                    </optgroup>
                </select>
            </div>
            <?php if ($erro == 600) {
                echo "<br><font color = '#ff0000'>Funcionario Já Cadastrado No Evento !</font>";
            }
            ?>

    </div>
    <div class="mdl-dialog__actions">
        <button class="mdl-button">Cadastrar</button>
        <button type="button" class="mdl-button close">Cancelar</button>
    </div>
    </form>
</dialog>
<!-- Dialog Visualizar Funcionario Evento -->
<dialog class="mdl-dialog dialog-visualiza-FuncEvento" style="width: 600px; height: auto;">
    <h4 class="mdl-dialog__title">Funcionarios</h4>
    <div class="mdl-dialog__content" style="align-self:center ;">
        <?php
        $id = $_SESSION['id_evento'];

        $Usuarios = mysqli_query($link, "SELECT * FROM  `funcionario_evento` LEFT JOIN funcionarios ON ( funcionario_evento.id_funcionario = funcionarios.id_funcionario ) WHERE funcionario_evento.id_evento = $id");

        $table = "";
        $table .= "<table  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">";
        $table .= "<thead>";
        $table .= "<tr style='background-color: gray'>";
        $table .= "<td >NOME</td>";
        $table .= "<td >Função</td>";
        $table .= "<td>CPF</td>";
        $table .= "<td>Celular</td>";
        $table .= "</tr>";
        $table .= "</thead>";
        $table .= "<tbody>";

        while ($row = mysqli_fetch_array($Usuarios)) {
            $table .= "<tr>";
            $table .= "<td>$row[nome]</td>";
            $table .= "<td>$row[funcao]</td>";
            $table .= "<td>$row[cpf]</td>";
            $table .= "<td>$row[celular]</td>";
            $table .= "</tr>";

        }

        $table .= "</tbody></table>";

        echo $table;

        ?>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button close">Fechar</button>
    </div>
</dialog>

<!-- Barra De cima -->
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Eventos</span>
            <div class="mdl-layout-spacer"></div>
            <button type="button"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    id="btn-login">
                Login
            </button>
            <div style="width: 20px"></div>
            <button type="button"
                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    id="btn-cadastro">
                Cadastra-se
            </button>
        </div>
    </header>
    <!-- link lateral -->
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/usuario.png" width="40%" height="50%" style="margin-bottom: 20px;">
            <div class="demo-avatar-dropdown">
                <div class="mdl-layout-spacer" id="div_email">
                    <?php
                    if ($erro > 1) {
                        $email = $_SESSION['email'];
                        echo "$email";
                    }

                    ?>
                </div>
            </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

            <a id="btn-cadastroFunc" class=""><i id="icon-cadastrarFunc"
                                                 class="mdl-color-text--blue-grey-400 material-icons"
                                                 role="presentation">add</i>Cadastrar Funcionario</a>

            <a class="" id="btn-removerFunc"><i id="icon-removerFunc"
                                                class="mdl-color-text--blue-grey-400 material-icons"
                                                role="presentation">delete</i>Remover Funcionario</a>
            <a class="mdl-navigation__link" id="btn-cadastrar-evento"><i id="icon-cadastrar-evento"
                                                                         class="mdl-color-text--blue-grey-400 material-icons"
                                                                         role="presentation">event</i>Adicionar
                Evento</a>

            <a class="" id="btn-cadastra-funcEvento"><i id="icon-cadastra-funcEvento"
                                                        class="mdl-color-text--blue-grey-400 material-icons"
                                                        role="presentation">add_box</i>Cadastra Funcionario Evento</a>
            <a class="" id="btn-remover-Evento"><i id="icon-remover-Evento"
                                                        class="mdl-color-text--blue-grey-400 material-icons"
                                                        role="presentation">delete_forever</i>Remover Evento</a>
            <a id="btn-remover"><i id="icon-remover" class="mdl-color-text--blue-grey-400 material-icons"
                                   role="presentation">delete</i>Remover Conta</a>
            <a id="btn-sair" href="usuario.php?funcao=4"><input type="hidden" value="4"><i id="icon-sair"
                                                                                           class="mdl-color-text--blue-grey-400 material-icons"
                                                                                           role="presentation">highlight_off</i>Sair</a>
            <div class="mdl-layout-spacer"></div>
            <a class="mdl-navigation__link"><i class="mdl-color-text--blue-grey-400 material-icons"
                                               role="presentation">help_outline</i><span
                        class="visuallyhidden">Help</span></a>
        </nav>
    </div>

    <!-- Listagens -->
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <!-- Quadrado De Listagem 1 Eventos Do Dia -->
            <div id="div_1" class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                <h5 style="text-align: center; margin-left: -20px; margin-top: 10px; margin-right: 0px; margin-left: 0px;"><b>Eventos Do Dia</b></h5>
                <?php

                date_default_timezone_set('America/sao_Paulo');
                $date = date('Y-m-d');

                $date1 = date_create($date);
                $data3 = date_format(date_add($date1,date_interval_create_from_date_string("1 days")),"Y-m-d");
                $eventos = mysqli_query($link, "SELECT * FROM eventos WHERE data_inicial >= '$date' AND data_inicial <= '$data3' ");

                echo "<table border='1'  style='margin-left: 100px; margin-bottom: 10px;'  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">
  <thead>
    <tr style='background-color: gray'>
    <td>ID Evento</td>
      <td >Cliente</td>
      <td>Local</td>
      <td>Tipo</td>
      <td>Preço</td>
      <td>Data Inicio</td>
      <td>Data Termino</td>
      <td>funcinarios</td>
    </tr>
  </thead>
  <tbody>";
                while ($row = mysqli_fetch_array($eventos)) {
                    echo "<tr>
                     <td >$row[id_evento]</td>
                     <td >$row[cliente]</td>
                    <td>$row[local]</td>
                    <td>$row[tipo]</td>
                    <td>$row[preco]</td>
                    <td>$row[data_inicial]</td>
                    <td>$row[data_termino]</td>
                    <td><button onclick='visualizarFunc($row[id_evento])' class=\"mdl-button mdl-js-button mdl-js-ripple-effect\"><i class=\"material-icons\">remove_red_eye</i></button></td>
                    </tr>";

                }
                echo "  </tbody> </table>";
                ?>
            </div>
            <!-- Quadrado De Listagem 2 Funcionarios -->
            <div id="div_2" class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--7-col">
                <h5 style="text-align: center; margin-left: -20px; margin-top: 0px; margin-right: 0px; margin-left: 0px;"><b>Funcionarios</b></h5>
                <?php

                $Usuarios = mysqli_query($link, "SELECT * FROM funcionarios WHERE 1");

                echo "<table border='1'  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">
  <thead>
    <tr style='background-color: gray'>
      <td >NOME</td>
      <td>CPF</td>
      <td>Celular</td>
      <td>Alterar</td>
    </tr>
  </thead>
  <tbody>";
                while ($row = mysqli_fetch_array($Usuarios)) {
                    echo "<tr>
                     <td >$row[nome]</td>
                    <td>$row[cpf]</td>
                    <td>$row[celular]</td>
                    <td><!-- Flat button with ripple -->
                    <button onclick=\"salvaId('$row[cpf]','$row[nome]','$row[celular]')\" class=\"mdl-button mdl-js-button mdl-js-ripple-effect\">
                    <i class=\"material-icons\">create</i></button></td>
                    </tr>";
                    $cont += 1;
                }

                echo "  </tbody>
</table>";
                echo "<h6>Quant Funcionarios $cont.</h6>";
                ?>

            </div>
            <!-- Quadrado De Listagem 3 Tipos De Festas -->
            <div id="div_3"
                 class="demo-cards mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
                <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
                    <h3 style="font-size: 20px; text-align: center; margin-left: -20px; margin-top: 0px; margin-right: 0px; margin-left: 0px;"><b>Serviços</b></h3>
                    <table border='1'  style="margin-top: -40px; margin-left: 50px;margin-bottom: 10px;"
                           class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
                        <br>
                        <tr style="background-color: grey">
                            <th class="mdl-data-table__cell--non-numeric">Tipo</th>
                            <th>Duração</th>
                            <th>Preco</th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>Casamento</td>
                            <td class="mdl-data-table__cell--non-numeric">8H</td>
                            <td>$22.000</td>
                        </tr>
                        <tr>
                            <td>Aniversário</td>
                            <td class="mdl-data-table__cell--non-numeric">4H</td>
                            <td>$10.000</td>
                        </tr>
                        <tr>
                            <td>Despedida De Solteiro</td>
                            <td class="mdl-data-table__cell--non-numeric">7H</td>
                            <td>$15.000</td>
                        </tr>
                        <tr>
                            <td>Formatura</td>
                            <td class="mdl-data-table__cell--non-numeric">6H</td>
                            <td>$20.000</td>
                        </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Quadrado De Listagem 4 Eventos Terminados -->
            <div id="div_4" class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                <h5 style="text-align: center; margin-left: -20px; margin-top: 10px; margin-right: 0px; margin-left: 0px;"><b>Eventos Terminados</b></h5>
                <?php

                date_default_timezone_set('America/sao_Paulo');
                $date = date('Y-m-d');

                $date1 = date_create($date);
                $data3 = date_format(date_add($date1,date_interval_create_from_date_string("1 days")),"Y-m-d");
                $eventos = mysqli_query($link, "SELECT * FROM eventos WHERE data_termino < '$date' ");

                echo "<table border='1' style='margin-left: 50px; margin-bottom: 10px;'  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">
  <thead>
    <tr style='background-color: gray'>
    <td>ID Evento</td>
      <td >Cliente</td>
      <td>Local</td>
      <td>Tipo</td>
      <td>Preço</td>
      <td>Data Inicio</td>
      <td>Data Termino</td>
      <td>Lucro</td>
      <td>Funcinarios</td>
    </tr>
  </thead>
  <tbody>";
                while ($row = mysqli_fetch_array($eventos)) {
                    if($row['tipo'] == "Casamento" ){
                        $lucro = $row['preco'] - 19000;
                    }else if($row['tipo'] == "Formatura" ){
                        $lucro = $row['preco'] - 18000;
                    }else if($row['tipo'] == "Despedida De Solteiro" ){
                        $lucro = $row['preco'] - 13000;
                    }else if($row['tipo'] == "Aniversario" ){
                        $lucro = $row['preco'] - 7000;
                    }
                    echo "<tr>
                     <td >$row[id_evento]</td>
                     <td >$row[cliente]</td>
                    <td>$row[local]</td>
                    <td>$row[tipo]</td>
                    <td>$row[preco]</td>
                    <td>$row[data_inicial]</td>
                    <td>$row[data_termino]</td>
                    <td>$lucro</td>
                    <td><button onclick='visualizarFunc($row[id_evento])' class=\"mdl-button mdl-js-button mdl-js-ripple-effect\"><i class=\"material-icons\">remove_red_eye</i></button></td>
                    </tr>";

                }
                echo "  </tbody> </table>";
                ?>
            </div>
            <!-- Quadrado De Listagem 5 Todos Os Eventos -->
            <div id="div_5" class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                <h5 style="text-align: center; margin-left: -20px; margin-top: 10px; margin-right: 0px; margin-left: 0px;"><b>Todos Os Eventos</b></h5>
                <?php
                date_default_timezone_set('America/sao_Paulo');
                $date = date('Y-m-d');

                $eventos = mysqli_query($link, "SELECT * FROM eventos WHERE data_inicial >= '$date' ");

                echo "<table border='1'  style='margin-left: 100px; margin-bottom: 10px;'  class=\"mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp\">
  <thead>
    <tr style='background-color: gray'>
    <td>ID Evento</td>
      <td >Cliente</td>
      <td>Local</td>
      <td>Tipo</td>
      <td>Preço</td>
      <td>Data Inicio</td>
      <td>Data Termino</td>
      <td>funcinarios</td>
    </tr>
  </thead>
  <tbody>";
                while ($row = mysqli_fetch_array($eventos)) {
                    echo "<tr>
                     <td >$row[id_evento]</td>
                     <td >$row[cliente]</td>
                    <td>$row[local]</td>
                    <td>$row[tipo]</td>
                    <td>$row[preco]</td>
                    <td>$row[data_inicial]</td>
                    <td>$row[data_termino]</td>
                    <td><button onclick='visualizarFunc($row[id_evento])' class=\"mdl-button mdl-js-button mdl-js-ripple-effect\"><i class=\"material-icons\">remove_red_eye</i></button></td>
                    </tr>";

                }
                echo "  </tbody> </table>";
                ?>
            </div>
        </div>
    </main>
</div>
<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>

</html>


<!-- Script Cadastro -->
<script>
    var suc = <?php echo "'$erro';"?>
    if (suc == "-122") {
        var dialog_cadastro = document.querySelector('.dialog-cadastro');
        dialog_cadastro.showModal();
    }
    var dialog = document.querySelector('.dialog-cadastro');
    var showDialogButton = document.querySelector('#btn-cadastro');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function () {
        dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
</script>
<!-- Script Login -->
<script>
    var suc = <?php echo "'$erro';"?>
    if (suc == "1") {
        var dialog_login = document.querySelector('.dialog-login');
        dialog_login.showModal();
    }
    if (suc == "-12") {
        var dialog_login = document.querySelector('.dialog-login');
        dialog_login.showModal();
    }
    var dialog_login = document.querySelector('.dialog-login');
    var showDialogButton_login = document.querySelector('#btn-login');
    if (!dialog_login.showModal) {
        dialogPolyfill.registerDialog(dialog_login);
    }
    showDialogButton_login.addEventListener('click', function () {
        dialog_login.showModal();
    });
    dialog_login.querySelector('.close').addEventListener('click', function () {
        dialog_login.close();
    });
</script>
<!-- Script Remover -->
<script>
    var dialog1 = document.querySelector('.dialog-remover');
    var showDialogButton1 = document.querySelector('#btn-remover');
    if (!dialog1.showModal) {
        dialogPolyfill.registerDialog(dialog1);
    }
    showDialogButton1.addEventListener('click', function () {
        dialog1.showModal();
    });
    dialog1.querySelector('.close').addEventListener('click', function () {
        dialog1.close();
    });
</script>
<!-- Script Cadastro Funcionario -->
<script>
    var suc = <?php echo "'$erro';"?>
    if (suc == "111") {
        var dialog_cadastro_func = document.querySelector('.dialog-funcionario');
        dialog_cadastro_func.showModal();
    }

    var dialog_cadastroFunc = document.querySelector('.dialog-funcionario');
    var showDialogButton_cadastroFunc = document.querySelector('#btn-cadastroFunc');
    if (!dialog_cadastroFunc.showModal) {
        dialogPolyfill.registerDialog(dialog_cadastroFunc);
    }
    showDialogButton_cadastroFunc.addEventListener('click', function () {
        dialog_cadastroFunc.showModal();
    });
    dialog_cadastroFunc.querySelector('.close').addEventListener('click', function () {
        dialog_cadastroFunc.close();
    });
</script>
<!-- Script Remover Funcionario -->
<script>
    var dialog1Func = document.querySelector('.dialog-remover-funcionario');
    var showDialogButton1Func = document.querySelector('#btn-removerFunc');
    if (!dialog1Func.showModal) {
        dialogPolyfill.registerDialog(dialog1Func);
    }
    showDialogButton1Func.addEventListener('click', function () {
        dialog1Func.showModal();
    });
    dialog1Func.querySelector('.close').addEventListener('click', function () {
        dialog1Func.close();
    });
</script>
<!-- Script Alterar Funcionario -->
<script>
    function salvaId(id, nome, celular) {
        document.getElementById('input_cpf_alterar').value = id;
        document.getElementById('cpfAntigo').value = id;
        document.getElementById('input_alterar_nome').value = nome;
        document.getElementById('input_celular_alterar').value = celular;
        var dialog12 = document.querySelector('.dialog-funcionario-alterar');
        dialog12.showModal();
        dialog12.querySelector('.close').addEventListener('click', function () {
            dialog12.close();
        });
    }
</script>
<!-- Script Visualizar Funcionario Evento -->
<script>
    var suc = <?php echo "'$erro';"?>
        function visualizarFunc(id) {
            window.location.href = "Eventos.php?funcao=3&id=" + id;
        }

    if (suc == 444) {
        var dialog_cadastroVFunc = document.querySelector('.dialog-visualiza-FuncEvento');
        dialog_cadastroVFunc.showModal();
        dialog_cadastroVFunc.querySelector('.close').addEventListener('click', function () {
            window.location.href = "index.php?erro=4";
        });
    }


</script>
<!-- Script Adicionar Evento -->
<script>
    var suc = <?php echo "'$erro';"?>
    if(suc == 5555){
        var dialog_cadastroEvento = document.querySelector('.dialog-Evento');
        dialog_cadastroEvento.showModal();
    }
    var dialog_cadastroEvento = document.querySelector('.dialog-Evento');
    var showDialogButton_cadastroEvento = document.querySelector('#btn-cadastrar-evento');
    if (!dialog_cadastroEvento.showModal) {
        dialogPolyfill.registerDialog(dialog_cadastroEvento);
    }
    showDialogButton_cadastroEvento.addEventListener('click', function () {
        dialog_cadastroEvento.showModal();
    });
    dialog_cadastroEvento.querySelector('.close').addEventListener('click', function () {
        dialog_cadastroEvento.close();
    });
</script>
<!-- Script Remover Evento -->
<script>
    var dialog_removerEvento = document.querySelector('.dialog-remover-Evento');
    var showDialogButton_removerEvento = document.querySelector('#btn-remover-Evento');
    if (!dialog_removerEvento.showModal) {
        dialogPolyfill.registerDialog(dialog_removerEvento);
    }
    showDialogButton_removerEvento.addEventListener('click', function () {
        dialog_removerEvento.showModal();
    });
    dialog_removerEvento.querySelector('.close').addEventListener('click', function () {
        dialog_removerEvento.close();
    });
</script>
<!-- Script Adicionar Funcionario Evento -->
<script>
    var suc = <?php echo "$erro" ?>;
    if(suc == 600){
        var dialog_cadastroFuncEvento = document.querySelector('.dialog-cadastra-FuncEvento');
        dialog_cadastroFuncEvento.showModal();
    }
    var dialog_cadastroFuncEvento = document.querySelector('.dialog-cadastra-FuncEvento');
    var showDialogButton_cadastroFuncEvento = document.querySelector('#btn-cadastra-funcEvento');
    if (!dialog_cadastroFuncEvento.showModal) {
        dialogPolyfill.registerDialog(dialog_cadastroFuncEvento);
    }
    showDialogButton_cadastroFuncEvento.addEventListener('click', function () {
        dialog_cadastroFuncEvento.showModal();
    });
    dialog_cadastroFuncEvento.querySelector('.close').addEventListener('click', function () {
        dialog_cadastroFuncEvento.close();
    });
</script>
<!-- Configuração Do Menu-->
<script>
    var sucesso = <?php echo "'$erro';"?>
    if (sucesso > "1") {
        $(document).ready(function () {
            $('#div_2').show();
            $('#div_5').show();
            $('#div_3').show();
            $('#btn-login').hide();
            $('#btn-cadastro').hide();

            $('#btn-remover').addClass("mdl-navigation__link");
            $('#btn-sair').addClass("mdl-navigation__link");
            $('#btn-cadastroFunc').addClass("mdl-navigation__link");
            $('#btn-removerFunc').addClass("mdl-navigation__link");
            $('#btn-cadastrar-evento').addClass("mdl-navigation__link");
            $('#btn-remover-Evento').addClass("mdl-navigation__link");
            $('#btn-cadastra-funcEvento').addClass("mdl-navigation__link");

        });

    }
    else {
        $(document).ready(function () {

            $('#div_2').hide();
            $('#div_5').hide();
            $('#div_3').hide();

            $('#btn-remover').removeClass("mdl-navigation__link");
            $('#btn-remover').hide();
            $('#icon-remover').hide();

            $('#btn-sair').removeClass("mdl-navigation__link");
            $('#btn-sair').hide();
            $('#icon-sair').hide();

            $('#btn-cadastroFunc').removeClass("mdl-navigation__link");
            $('#btn-cadastroFunc').hide();
            $('#icon-cadastrarFunc').hide();

            $('#btn-removerFunc').removeClass("mdl-navigation__link");
            $('#btn-removerFunc').hide();
            $('#icon-removerFunc').hide();

            $('#btn-cadastrar-evento').removeClass("mdl-navigation__link");
            $('#btn-cadastrar-evento').hide();
            $('#icon-cadastrar-evento').hide();

            $('#btn-cadastra-funcEvento').removeClass("mdl-navigation__link");
            $('#btn-cadastra-funcEvento').hide();
            $('#icon-cadastra-funcEvento').hide();

            $('#btn-remover-Evento').removeClass("mdl-navigation__link");
            $('#btn-remover-Evento').hide();
            $('#icon-remover-funcEvento').hide();


        });
    }

    $(document).ready(function () {
        $('#input_celular_cadastro').mask('(00) 00000-0000');
        $('#input_cpf_cadastro').mask('000.000.000-00');
        $('#input_cpf_alterar').mask('000.000.000-00');
        $('#input_celular_alterar').mask('(00) 00000-0000');
    });
</script>
