app.controller('homeCtrl', function($scope, $http){
    $scope.dsSP = [];
    $http.get('http://localhost:3000/products').then(
        function(res){
            //load thanh cong
            $scope.dsSP = res.data
        },
        function(res){
            //load that bai
            alert("Không tải được dữ liệu !")
        }
    );
    $scope.Date = function(date){
        return new Date(date);
    }
})