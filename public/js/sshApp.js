angular.module('MT4', ['ui.mask'])

.controller('SSHController', ['$scope', '$http', function($scope, $http){

    $scope.ssh = {};
    $scope.screen = {"waiting" : { "visible" : false, "message" : "Waiting for the server.", "image" : "loading.svg" }};

    $scope.connect = function(){

        if($scope.ssh.ip == null || $scope.ssh.username == null || $scope.ssh.password == null){
            $scope.screen.waiting.message = "Por favor preencha corretamente os campos";
            $scope.screen.waiting.image = 'warning.svg';
            $scope.screen.waiting.visible = true;
        }

        else {
            $scope.screen.waiting.visible = true;

            $http({
                method: 'POST',
                url: 'src/ws_ssh.php',
                headers : { 'Content-Type' : 'application/x-www-form-urlencoded'},
                data: { ssh : $scope.ssh }
            })

            .success(function(valueReturn){
                $scope.screen.waiting.visible = false;
                $scope.ssh.response = valueReturn;
            });
        }

    }
}]);