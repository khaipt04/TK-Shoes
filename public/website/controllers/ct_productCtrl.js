app.controller('ct_productCtrl', function($scope, $routeParams, $http){
    $scope.dm = {};
    $http.get('http://localhost:3000/categoryes/' + $routeParams.id).then(
        function(res){
            $scope.dm = res.data
        },
        function(res){
            alert("Không tải được dữ liệu !")
        }
    );

    $scope.dsSP = [];
    $http.get('http://localhost:3000/products').then(
        function(res){
            $scope.dsSP = res.data
            $scope.iddmFilter = $scope.dm.id
        },
        function(res){
            alert("Không tải được dữ liệu !")
        }
    );
    
    $scope.selectOption = 'default';
    $scope.sortPD = function() {
        switch ($scope.selectOption) {
            case 'priceAsc':
                return 'price';
            case 'priceDesc':
                return '-price';
            case 'nameAsc':
                return 'name';
            case 'nameDesc':
                return '-name';
            default:
                return '';
        }
    };

    

    $scope.limit = 9;
    // $scope.page = 1;
    // //page = 1 -> begin = 0
    // //page = 2 -> begin = 3
    // //page = 3 -> begin = 6
    // //page = n -> begin = (n-1)*3 //(page - 1) * limit
    // $scope.begin = ($scope.page-1) * $scope.limit;

    // $scope.chuyenTrang = function(trang){
    //     $scope.page = trang;
    //     $scope.begin = ($scope.page - 1) * $scope.limit;
    // }

    // $scope.totalPage = function(){
    //     return Math.ceil($scope.dsSP.length / $scope.limit);
    // }

    // $scope.pageList = function(){
    //     let arr = [];
    //     let totalPage = $scope.totalPage();

    //     for(let i=1; i<=totalPage; i++){
    //         arr.push(i);
    //     }
    //     return arr;
    // }
})