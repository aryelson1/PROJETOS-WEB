<?php
$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
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
    <style type="text/css">

        tr {
            font-size: 12px;
            color: black;
        }

    </style>

    <script>
        function enviaTela2() {
            var senha = document.getElementById('senha_remove').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_2";
        }
        function enviaTela3() {
            var senha = document.getElementById('senha_lista1').value;
            window.location.href = "validarADM.php?senhaAdmin=" + senha + "_3";
        }
    </script>
    <script type="text/javascript">
        function EnterTab(InputId, Evento) {

            if (Evento.keyCode == 13) {

                document.getElementById(InputId).focus();

            }

        }


    </script>
</head>
<body>
<dialog class="mdl-dialog remove">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <input id="senha_remove" onkeydown="javascript:EnterTab('btn2',event)" type="password" class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn2" onclick="enviaTela2()">Entrar</button>
        <button type="button" class="mdl-button close4">Cancelar</button>
    </div>
</dialog>
<dialog class="mdl-dialog lista">
    <h4 class="mdl-dialog__title">Digite A Senha!</h4>
    <div class="mdl-dialog__content">
        <input id="senha_lista1" onkeydown="javascript:EnterTab('btn3',event)" type="password" class="mdl-textfield__input">
    </div>
    <div class="mdl-dialog__actions">
        <button type="button" class="mdl-button" id="btn3" onclick="enviaTela3()">Entrar</button>
        <button type="button" class="mdl-button close5">Cancelar</button>
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
            <a href="#scroll-tab-1" class="mdl-layout__tab is-active" id="1">Adicionar Funcionário</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab" id="2">Adicionar Administrador</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab" id="3">Adicionar Bateria</a>
            <a href="#scroll-tab-4" class="mdl-layout__tab" id="4">Adicionar Peça</a>
        </div>
    </header>

            <div class="mdl-layout__drawer">
                <span class="mdl-layout-title">Menu</span>
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="layoutReserva.php" style="color: black;">Gerenciador De Baterias</a>
                    <a class="mdl-navigation__link" onclick="validaE(2)" style="color: black;">Remover</a>
                    <a class="mdl-navigation__link" onclick="validaE(3)" style="color: black;">Listar</a>
                    <a class="mdl-navigation__link" href="index.php" style="color: black;">Sair</a>

                </nav>
            </div>

    <script type="text/javascript"></script>

    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
            <div class="page-content">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
                    <main class="mdl-layout__content">
                        <hgroup>

                            <h3>Adicionar Funcionário</h3>
                            <h4> <?php if ($erro == '1f') {
                                    echo "<font color = '#ff0000'>Usuario Sem Acesso!</font>";
                                } elseif ($erro == '2f') {
                                    echo "<font color = '#ff0000'>ID Já Cadastrado!</font>";
                                } elseif ($erro == '3f') {
                                    echo "<font color = '#ff0000'> Senha Já Cadastrada!</font>";
                                } else if ($erro == '4f') {
                                    echo "<font color = '#4caf50'> Fucionário Cadastrado Com Sucesso!</font>";
                                } ?></h4>

                        </hgroup>
                        <form method="post" action="ExecutarCadastroFuncionario.php">
                            <div class="group">
                                <input type="text" required="" autocomplete="off" id="usuario" name="usuario">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="Nome">Nome Do Funcionário</label>
                            </div>
                            <div class="group">
                                <input type="password" required="" id="senhaUsuario" name="senhaUsuario">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="Senha">Senha Do Funcionário</label>
                            </div>
                            <div class="group">
                                <input type="text" required="" id="Equipamento" autocomplete="off"  name="Equipamento">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="Senha">Equipamento</label>
                            </div>

                            <button class="button buttonRed" id="Cadastre-se">Cadastrar
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>

                        </form>

                    </main>
                </div>
            </div>

        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-2">
            <div class="page-content">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
                    <main class="mdl-layout__content">
                        <hgroup>

                            <h3>Adicionar Administrador</h3>
                            <h4> <?php if ($erro == '1a') {
                                    echo "<font color = '#ff0000'>Administrador Sem Acesso</font>";
                                } elseif ($erro == '4a') {
                                    echo "<font color = '#4caf50'>ADM Cadastrado Com Sucesso!</font>";
                                } elseif ($erro == '2a') {
                                    echo "<font color = '#ff0000'>Senha Já Cadastrada! </font>";
                                } else if ($erro == '3a') {
                                    echo "<font color = '#ff0000'>ERRO INTERNO!</font>";

                                } ?></h4>
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
                        </hgroup>
                        <form method="post" action="ExecutarCadastroAdim.php">
                            <div class="group">
                                <input type="text" required="" id="usuario" name="usuario">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="Nome">Nome Do Novo Administrador</label>
                            </div>
                            <div class="group">
                                <input type="password" required="" id="senhaUsuario" name="senhaUsuario">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="Senha">Senha Do Novo Administrador</label>
                            </div>

                            <button class="button buttonRed" id="Cadastre-se">Cadastre-se
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>

                        </form>
                    </main>
                </div>
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-3">
            <div class="page-content">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
                    <main class="mdl-layout__content">
                        <hgroup>

                            <h3>Adicionar Bateria</h3>
                            <h4> <?php if ($erro == '1b') {
                                    echo "<font color = '#ff0000'>Administrador Sem Acesso!</font>";
                                } else if ($erro == '2b') {
                                    echo "<font color = '#ff0000'>Bateria Já Existe!</font>";
                                } else if ($erro == '3b') {
                                    echo "<font color = '#ff0000'>ERRO INTERNO!</font>";

                                } else if ($erro == '4b') {
                                    echo "<font color = '#4caf50'>Bateria Cadastrada Com Sucesso!</font>";

                                } ?></h4>
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
                        </hgroup>
                        <form method="post" action="ExecutarCadastroBateria.php">

                            <div class="group">
                                <input type="number" required="" id="numBateria" name="numBateria">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="numBateria">Número da Bateria</label>
                            </div>
                            <div class="group">
                                <input type="text" required="" id="bip" name="bip">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="nome">Número do Bip</label>
                            </div>
                            <div class="group">
                                <input type="text" required="" id="equip" name="equip">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="equip">Equipamento</label>
                            </div>
                            <button class="button buttonRed" id="Cadastre-se">Cadastrar
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>

                        </form>
                    </main>
                </div>
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-4">
            <div class="page-content">
                <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
                    <main class="mdl-layout__content">
                        <hgroup>

                            <h3>Adicionar Peça</h3>
                            <h4> <?php if ($erro == '1p') {
                                    echo "<font color = '#ff0000'>Administrador Sem Acesso!</font>";
                                } else if ($erro == '2p') {
                                    echo "<font color = '#ff0000'>Peça Já Cadastrada!</font>";
                                } else if ($erro == '3p') {
                                    echo "<font color = '#ff0000'>ERRO INTERNO!</font>";
                                } else if ($erro == '4p') {
                                    echo "<font color = '#4caf50'>Peça Cadastrada Com Sucesso!</font>";

                                } ?></h4>
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
                        </hgroup>
                        <form method="post" action="CadastroEstoque.php">

                            <div class="group">
                                <input type="text" required="" id="descricao" name="descricao">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="numBateria">descrição</label>
                            </div>
                            <div class="group">
                                <input type="number" required="" id="quant" name="quant">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label id="nome">Quantidade</label>
                            </div>
                            <button class="button buttonRed" id="Cadastre-se">Cadastrar
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                            </button>

                        </form>
                    </main>
                </div>
            </div>
        </section>

    </main>
</div>
</body>
<script>
    function validaE(a) {
        if(a == 2){
            var dialogE = document.querySelector('.remove');
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
</html>