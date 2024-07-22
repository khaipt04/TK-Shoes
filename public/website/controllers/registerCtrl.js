app.controller('registerCtrl', function($scope, $http){
    $scope.register = function(){  
        $scope.checkMail = false;
        $scope.checkPass = false;
        $scope.isSuccess = false;
        $scope.isError = false;

        $http.get(`http://localhost:3000/users?email=${$scope.email}`).then(
            function(res){
                if(res.data.length > 0){
                    $scope.checkMail = true;
                }else{
                    if($scope.pass != $scope.confirmPass){
                        $scope.checkPass = true;
                    }else{
                        $http.post('http://localhost:3000/users',{
                            name: $scope.name,
                            email: $scope.email,
                            pass: $scope.pass,
                            role: "0"
                        }).then(
                            function(res){
                                $scope.checkPass = false;
                                $scope.isSuccess = true;
                            }
                        )
                    }
                }
            },
            function(res){
                $scope.isError = true;
            }
        )
    }
})