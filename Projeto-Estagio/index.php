<?php 
    $erro = isset($_GET["erro"])? $_GET['erro']:0;
 header('location:layoutReserva.php');
     ?>
<!DOCTYPE html>

<html>
  <head>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#admin').onKeyDown_(function () {
                if ($('#admin').css({'border-color': '#5264AE'})) {
                    $('#senhaAdmin').css({'border-color': '#5264AE'});
                    $('#senha').css({'color': '#5264AE'});


            });

        });
       $(document).ready(function() {
         $('#senhaAdmin').click(function(){
          if ($('#senhaAdmin').css({'border-color': 'red'})) {
            $('#senhaAdmin').css({'border-color': '#5264AE'});
            $('#senha').css({'color': '#5264AE'});
          }

        });

        $('#admin').click(function(){
          if ($('#admin').css({'border-color': 'red'})) {
            $('#admin').css({'border-color': '#5264AE'});
            $('#nomeAdmin').css({'color': '#5264AE'});
          }
        
        });

      });     

      $(document).ready(function(){


        $('#click').click(function(){
          
          
          var campo_vazio = false;
          

          if ($('#admin').val() == '') {
            $('#admin').css({'border-color': 'red'});
            $('#nomeAdmin').css({'color': 'red'});
            campo_vazio = true;
          } 

          if ($('#senhaAdmin').val() == '') {
            $('#senhaAdmin').css({'border-color': 'red'});
            $('#senha').css({'color': 'red'});
            campo_vazio = true;
          } 
          return !campo_vazio;

        });
      });  
    </script>
      <script>(function(window) {
              'use strict';

              var noback = {

                  //globals
                  version: '0.0.1',
                  history_api : typeof history.pushState !== 'undefined',

                  init:function(){
                      window.location.hash = '#no-back';
                      noback.configure();
                  },

                  hasChanged:function(){
                      if (window.locat
                          ion.hash == '#no-back' ){
                          window.location.hash = '#BLOQUEIO';
                          //mostra mensagem que não pode usar o btn volta do browser
                          if($( "#msgAviso" ).css('display') =='none'){
                              $( "#msgAviso" ).slideToggle("slow");
                          }
                      }
                  },

                  checkCompat: function(){
                      if(window.addEventListener) {
                          window.addEventListener("hashchange", noback.hasChanged, false);
                      }else if (window.attachEvent) {
                          window.attachEvent("onhashchange", noback.hasChanged);
                      }else{
                          window.onhashchange = noback.hasChanged;
                      }
                  },

                  configure: function(){
                      if ( window.location.hash == '#no-back' ) {
                          if ( this.history_api ){
                              history.pushState(null, '', '#BLOQUEIO');
                          }else{
                              window.location.hash = '#BLOQUEIO';
                              //mostra mensagem que não pode usar o btn volta do browser
                              if($( "#msgAviso" ).css('display') =='none'){
                                  $( "#msgAviso" ).slideToggle("slow");
                              }
                          }
                      }
                      noback.checkCompat();
                      noback.hasChanged();
                  }

              };

              // AMD support
              if (typeof define === 'function' && define.amd) {
                  define( function() { return noback; } );
              }
              // For CommonJS and CommonJS-like
              else if (typeof module === 'object' && module.exports) {
                  module.exports = noback;
              }
              else {
                  window.noback = noback;
              }
              noback.init();
          }(window)); </script>
      <script type="text/javascript">

          function EnterTab(InputId,Evento){

              if(Evento.keyCode == 13){

                  document.getElementById(InputId).focus();

              }

          }

      </script>
    <title>Tela Inicial</title>

    

  </head>
  <body>
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
          <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
              <span class="mdl-layout-title">
                Baterias Almeida
              </span>
        
              <div class="mdl-layout-spacer"></div>
              <nav class="mdl-navigation">
                <a href="CadastroAdministradores.php">
                  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn buttonRed" >
                    Cadastra-se
                  </button>
                </a>
                
              </nav>
        
        
            </div>
          </header>
          <main class="mdl-layout__content">
            <hgroup>
              <h1>Baterias Almeida</h1>
              <h3>Login</h3>
              <h5>     <?php
                  if($erro == 1){
                    echo "<font color = '#ff0000'>Login e/ou senha inválida</font>";
                    
                  }
                  ?></h5>
            </hgroup>

            <form method="post" action="ExecutarLogin.php">
              <div class="group">
                <input type="text" required="requiored" id="admin" name="admin" autocomplete="off" ><span class="highlight"></span><span class="bar"></span>
                <label id="nomeAdmin">Administrador</label>
              </div>
              <div class="group">
                <input type="password" required="requiored" id="senhaAdmin" name="senhaAdmin" >
                <span class="highlight"></span><span class="bar"></span>
                  <label id="senha">Senha</label>
              </div>
              <button  class="button buttonBlue" id="click" >Entrar
                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
              </button>
              <br/>
            </form>

            <footer>
              <p><a href="http://www.almeidadistribuidor.com.br/" target="_blank">Almeida Distribuidora</a></p>
            </footer>
          </main>
        </div>   
  </body>
</html>