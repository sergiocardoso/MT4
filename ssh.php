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
    <script src="public/js/sshApp.js"></script>

</head>
<body ng-app="MT4" ng-controller="SSHController">

    <div class="header">

        <div class="bodyFix">

            <h4>Integração SSH {{teste}}</h4>

            <div class="form">

                <div class="line">

                    <div class="block">
                        <label>IP</label>
                        <input  type="text" id="cIP"
                                ng-model="ssh.ip"
                                ng-pattern="/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/"
                                placeholder="000.000.000.000"
                                >
                    </div>

                    <div class="block">
                        <label>Username</label>
                        <input type="text" id="cUsername" ng-model="ssh.username">
                    </div>

                    <div class="block">
                        <label>Password</label>
                        <input type="password" id="cPassword" ng-model="ssh.password">
                    </div>

                </div>

                <div class="block blockCommand">
                    <label>Command</label>
                    <textarea name="cCommand" id="cCommand" ng-model="ssh.command" cols="30" rows="10"></textarea>
                </div>

                <button id="btnLogin" ng-click="connect();">Connect!</button>

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
        <div class="serverBadge">SERVIDOR [ saida ]</div>
        <div class="serverResponse">
            <div class="user">{{ssh.username}}@{{ssh.ip}}   {{ssh.command}}</div>
            <div class="prompt"></div>
            <div class="responseHTML">
                <pre>{{ssh.response}}</pre>
            </div>

        </div>
    </div>


</body>
</html>