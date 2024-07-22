app.controller('detailCtrl', function($scope, $routeParams, $http){
    $scope.sp = {};
    $http.get('http://localhost:3000/products/' + $routeParams.id).then(
        function(res){
            $scope.sp = res.data
            $scope.nameFilter = $scope.sp.name.substring(0, 5);

            $scope.isNotName = function(item) {
                return item.name !== $scope.sp.name;
            };
        },
        function(res){
            alert("Không tải được dữ liệu !")
        }
    );

    $scope.dsSPLQ = [];
    $http.get('http://localhost:3000/products').then(
        function(res){
            //load thanh cong
            $scope.dsSPLQ = res.data
        },
        function(res){
            //load that bai
            alert("Không tải được dữ liệu !")
        }
    );

})