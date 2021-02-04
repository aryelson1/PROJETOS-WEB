<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="css/material.css">
    <link rel="stylesheet" href="css/index.css">
    <script defer src="js/material.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projeto</title>
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <!--header-->

    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Controle de Frota</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>

    <!--body page-->
    <div class="mdl-layout__content">
        <main class="mdl-grid">
            <div class="mdl-cell--4-col-desktop"></div>
            <div class="mdl-cell--4-col-desktop mdl-card mdl-shadow--2dp body-page">
                <span class="mdl-layout-title" style="width: 100%; text-align: center">Entrar - Controle de Frota</span>
                <hr>
                <form action="home.php">
                    <div class="mdl-grid" style="width: 100%; padding-right: 16px; padding-bottom: 16px; padding-left: 16px">

                        <div class="mdl-cell--12-col-desktop" style="margin-bottom: 26px;" id="div-error">
                            <span class="mdl-textfield__error" style="visibility: visible">Email inválido !</span>
                        </div>
                        <div class="mdl-cell--12-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"
                                 style="width: 100%; padding-right: 32px">
                                <input class="mdl-textfield__input" id="email" type="email">
                                <label class="mdl-textfield__label" for="email">Email</label>
                                <span class="mdl-textfield__error">Email inválido !</span>
                            </div>
                        </div>
                        <div class="mdl-cell--12-col-desktop">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"
                                 style="width: 100%; padding-right: 32px">
                                <input class="mdl-textfield__input" type="password" id="senha">
                                <label class="mdl-textfield__label" for="senha">Senha</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"
                    style="float: right;">
                        Entrar
                    </button>
                </form>
            </div>
            <div class="mdl-cell--4-col-desktop"></div>
        </main>
    </div>
</div>

</body>
</html>