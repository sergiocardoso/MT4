<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Integração SSH</title>

    <!--//CSS-->
    <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/ssh.css">

    <!--//JS-->
    <script src="public/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="public/bower_components/angular/angular.min.js"></script>
    <script src="public/bower_components/angular-ui-mask/dist/mask.min.js"></script>
    <script src="public/js/criptApp.js"></script>

</head>
<body ng-app="MT4" ng-controller="SSHController">

    <div class="header">

        <div class="bodyFix">

            <h4>Criptografia AES256 com SALT</h4>

            <div class="form">

                <div class="block blockCommand">
                    <label>Texto para Criptografar</label>
                    <textarea name="cCommand" id="cCommand" ng-model="cript.text" cols="30" rows="10"></textarea>
                </div>

                <button id="btnLogin" ng-click="cripClick();">Criptografar!</button>

                <div class="clear"></div>
            </div>

            <div class="divisor"></div>

            <div class="form">

                <div class="block blockCommand">
                    <label>Texto Criptografado</label>
                    <textarea name="cCommand" id="cCommand" ng-model="cript.decripttext" cols="30" rows="10"></textarea>
                </div>

                <div class="block blockCommand">
                    <label>Chave</label>
                    <input name="cChave" id="cChave" ng-model="cript.key" value="insira aqui a chave publica"/>
                </div>

                <button id="btnLogin" ng-click="decriptClick();">Descriptografar!</button>

                <div class="clear"></div>
            </div>

            <div class="clear"></div>

        </div>

        <div class="screenWaiting" ng-show="screen.waiting.visible">
            <img ng-src="public/img/{{screen.waiting.image}}"/>
            <div class="title">{{screen.waiting.message}}</div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="response">
        <div class="serverBadge">MENSAGEM [ saida ]</div>
        <div class="serverResponse">
            <div class="user"></div>
            <div class="prompt"></div>
            <div class="responseHTML">
                <pre>{{cript.response}}</pre>
            </div>

        </div>
    </div>


</body>
</html>