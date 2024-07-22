app.controller('orderCtrl', function($scope, $http){
    $scope.dsDH = [];
    $http.get('http://localhost:3000/orders').then(
        function(res){
            //load thanh cong
            $scope.dsDH = res.data
        },
        function(res){
            //load that bai
            alert("Không tải được dữ liệu !")
        }
    );

    $scope.deleteOder = function(id) {
        $http.delete('http://localhost:3000/orders/' + id).then(
            function(res){
                $scope.dsDH = $scope.dsDH.filter(function(dh) {
                    return dh.id !== id;
                });
                alert("Xóa đơn hàng thành công !")
            },
            function(res){
                alert("Lỗi không xóa được đơn hàng !")
            }
        );
    }
})