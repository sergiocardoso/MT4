angular.module('MT4', ['ui.mask'])

.controller('SSHController', ['$scope', '$http', function($scope, $http){

    $scope.cript = {};
    $scope.screen = {"waiting" : { "visible" : false, "message" : "Waiting for the server.", "image" : "loading.svg" }};

    $scope.cripClick = function(){

        $http({
            method: 'POST',
            url: 'src/ws_salt.php',
            headers : { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: { text : $scope.cript.text }
        })

        .success(function(valueReturn){
            $scope.screen.waiting.visible = false;
            $scope.cript.response = valueReturn;
        });
    }

    $scope.decriptClick = function(){
        $http({
            method: 'POST',
            url: 'src/ws_salt_decript.php',
            headers : { 'Content-Type' : 'application/x-www-form-urlencoded'},
            data: { text : $scope.cript.decripttext, key: $scope.cript.key }
        })

        .success(function(valueReturn){
            $scope.screen.waiting.visible = false;
            $scope.cript.response = valueReturn;
        });
    }
}]);