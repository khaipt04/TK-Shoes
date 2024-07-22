app.controller('changePassCtrl', function($scope, $rootScope, $http, $location){
    $scope.isErrorPass = false;
    $scope.isErrorPassConfirm = false;
    $scope.isError = false;
    $scope.isSuccess = false;

    $scope.updatePass = function(){
        if($scope.passOld != $rootScope.user.pass){
            $scope.isErrorPass = true;
        }else{
            $scope.isErrorPass = false;
            if($scope.passNew !== $scope.confirmPassNew){
                $scope.isErrorPassConfirm = true;
            }else{
                $http.patch(`http://localhost:3000/users/${$rootScope.user.id}`, {
                    pass: $scope.passNew
                }).then(
                    function(res){
                        localStorage.setItem('USER', JSON.stringify($rootScope.user));
                        $scope.isErrorPassConfirm = false;
                        $scope.isSuccess = true;
                    },
                    function(res){
                        $scope.isError = true;
                    }
                );
            }
        }
    };
});