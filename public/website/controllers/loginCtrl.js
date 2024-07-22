app.controller('loginCtrl', function($scope, $rootScope, $http, $location){
    $scope.login = function(){
        $scope.isError = false;
        $http.get(`http://localhost:3000/users?email=${$scope.email}&pass=${$scope.pass}`).then(
            function(res){
                if(res.data.length == 0){
                    $scope.isError = true;
                }else{
                    $rootScope.user = res.data[0];
                    localStorage.setItem('USER', JSON.stringify($rootScope.user));
                    $location.path('/');
                }
            },
            function(res){
                $scope.isError = true;
            }
        )
    }
})