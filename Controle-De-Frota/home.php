<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/index.css">
    <script defer src="js/material.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>
    <script defer src="js/bootstrap-select.min.js"></script>
    <meta charset="UTF-8">
    <script src="bootbox.min.js"></script>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
</head>
<body>

<dialog class="mdl-dialog" id="dialog">
    <h4 class="mdl-dialog__title">Allow data collection?</h4>
    <div class="mdl-dialog__content">
        <p>
            Allowing us to collect data will let us get you the information you want faster.
        </p>
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button">Agree</button>
        <button type="button" class="mdl-button close">Disagree</button>
    </div>
</dialog>

<script>
    var dialog = document.getElementById('dialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }

    function abrir() {
        dialog.showModal();
    }

    dialog.querySelector('.close').addEventListener('click', function () {
        dialog.close();
    });
</script>

<script>
    var text = "<div class=\"form-group\">" +
        "        <label class=\"col-xs-3 control-label\">PLACA</label>" +
        "        <div class=\"col-xs-5\">" +
        "            <input type=\"text\" class=\"form-control\" name=\"Placa\" id='Placa' />" +
        "        </div>" +
        "    </div>" +
        "    <div class=\"form-group\">" +
        "        <label class=\"col-xs-3 control-label\">ID MOTORISTA</label>" +
        "        <div class=\"col-xs-5\">" +
        '<select id="opcao" class="form-control">' +
        '<option value=""></optionvalue>'+
        '<option value="01">01</option>  ' +
        '<option value="02">02</option>' +
        '<option value="03">03</option> ' +
        '</select> ' +
        "        </div>" +
        "    </div>" +
        "    <div class=\"form-group\">" +
        "        <label class=\"col-xs-3 control-label\">MODELO</label>" +
        "        <div class=\"col-xs-5\">" +
        "            <input type=\"text\" class=\"form-control\" name=\"Modelo\" id='Modelo' />" +
        "        </div>" +
        "    </div>" +
        "    <div class=\"form-group\">" +
        "        <label class=\"col-xs-3 control-label\">STATUS</label>" +
        "        <div class=\"col-xs-5\">" +
        "            <input type=\"radio\"  name=\"status\" value='Disponivel' id='status' /> Disponivél" +
        "        </div>" +
        "        <div class=\"col-xs-5\">" +
        "            <input type=\"radio\"  name=\"status\" value='Em Viagem' id='status'/> Em Viagem" +
        "        </div>" +
        "    </div>" +
        "    <div class=\"form-group\">" +
        "    </div>";

    function abrir() {
        //ABRIR DIALOG
        bootbox.dialog({
            // INSERIR VALORES E CAIXAS DE TEXTOS
            message: text,
            // TITULO
            title: "<span style='margin-left: -450px; '>Menu</span>",
            // BUTÕES
            buttons: {
                //CONFIRMAR
                ok: {
                    label: "Confirmar",
                    className: 'btn-danger',
                    callback: function () {
                        var Placa = document.getElementById("Placa").value;
                        var opcao = document.getElementById("opcao").value;
                        var Modelo = document.getElementById("Modelo").value;
                        var status = document.getElementsByName("status");

                        for (i = 0; i < status.length; i++) {
                            if (status[i].checked) {
                                bootbox.alert(status[i].value);
                            }
                        }
                        bootbox.alert(Placa);
                        bootbox.alert(opcao);
                        bootbox.alert(Modelo);


                    }
                },
                // CANCELAR
                noclose: {
                    label: "Cancelar",
                    className: 'btn-warning',
                    callback: function () {
                        return true;
                    }
                }
            }

        });
    }
</script>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <!--header-->

    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Controle de Frota</span>


            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <a class="mdl-navigation__link" href="index.php">Sair</a>
            </nav>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active">Veículos</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab">Motoristas</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab">Usuários</a>
            <a href="#scroll-tab-4" class="mdl-layout__tab">Faturamento</a>
        </div>
    </header>

    <!--body page-->
    <div class="mdl-layout__content">
        <main class="mdl-grid">
            <div class="mdl-cell--2-col-desktop"></div>
            <div class="mdl-cell--8-col-desktop mdl-card mdl-shadow--2dp body-page">
                <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
                    <div class="page-content">
                        <table class="mdl-data-table mdl-js-data-table" style="width: 100%; border: 0px;">
                            <thead>
                            <tr>
                                <th colspan="3" class="mdl-data-table__cell--non-numeric">Motorista</th>
                                <th class="mdl-data-table__cell--non-numeric">Veículo</th>
                                <th>Placa</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3" class="mdl-data-table__cell--non-numeric">José Aldo</td>
                                <td class="mdl-data-table__cell--non-numeric">F4000</td>
                                <td>KLK-2020</td>
                                <td>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Editar
                                    </button>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                                    onclick="abrir()"
                                    style="float: right">
                                Cadastrar
                            </button>
                            <span style="float: right; margin-top: 8px; margin-right: 16px;">10 Veículo(s) - 7 Em viagem - 3 Dísponivel(is)</span>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="scroll-tab-2">
                    <div class="page-content">
                        <table class="mdl-data-table mdl-js-data-table" style="width: 100%; border: 0px;">
                            <thead>
                            <tr>
                                <th colspan="3" class="mdl-data-table__cell--non-numeric">Nome</th>
                                <th class="mdl-data-table__cell--non-numeric">CPF</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3" class="mdl-data-table__cell--non-numeric">José Aldo</td>
                                <td class="mdl-data-table__cell--non-numeric">F4000</td>
                                <td>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Editar
                                    </button>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                                    style="float: right">
                                Cadastrar
                            </button>
                            <span style="float: right; margin-top: 8px; margin-right: 16px;">10 Veículo(s) - 7 Em viagem - 3 Dísponivel(is)</span>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="scroll-tab-3">
                    <div class="page-content">
                        <table class="mdl-data-table mdl-js-data-table" style="width: 100%; border: 0px;">
                            <thead>
                            <tr>
                                <th colspan="3" class="mdl-data-table__cell--non-numeric">Nome</th>
                                <th class="mdl-data-table__cell--non-numeric">Função</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3" class="mdl-data-table__cell--non-numeric">José Aldo</td>
                                <td class="mdl-data-table__cell--non-numeric">F4000</td>
                                <td>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Editar
                                    </button>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                                    style="float: right">
                                Cadastrar
                            </button>
                            <span style="float: right; margin-top: 8px; margin-right: 16px;">10 Veículo(s) - 7 Em viagem - 3 Dísponivel(is)</span>
                        </div>
                    </div>
                </section>
                <section class="mdl-layout__tab-panel" id="scroll-tab-4">
                    <div class="page-content">
                        <table class="mdl-data-table mdl-js-data-table" style="width: 100%; border: 0px;">
                            <thead>
                            <tr>
                                <th colspan="3" class="mdl-data-table__cell--non-numeric">Nome</th>
                                <th class="mdl-data-table__cell--non-numeric">Função</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="3" class="mdl-data-table__cell--non-numeric">José Aldo</td>
                                <td class="mdl-data-table__cell--non-numeric">F4000</td>
                                <td>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Editar
                                    </button>
                                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top: 16px;">
                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                                    style="float: right">
                                Cadastrar
                            </button>
                            <span style="float: right; margin-top: 8px; margin-right: 16px;">10 Veículo(s) - 7 Em viagem - 3 Dísponivel(is)</span>
                        </div>
                    </div>
                </section>
                <p>Content here.</p>
            </div>
            <div class="mdl-cell--2-col-desktop"></div>


        </main>
    </div>
</div>

</body>
</html>