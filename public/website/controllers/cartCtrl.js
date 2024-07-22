app.controller('cartCtrl', function($scope, $rootScope, $http, $location){
    $scope.ship = 30000;

    $scope.updateQuantity = function(product) {
        $scope.cart.forEach(sp => {
          if (sp.id === product.id) {
            sp.quantity = product.quantity;
          }
        });
      
        $scope.total();
      
        $scope.ship = $scope.cart.length > 0 ? 30000 : 0;
      
        const cartString = JSON.stringify($scope.cart);
        localStorage.setItem('CART', cartString);
    };

    $scope.delete = function(index) {
        $scope.cart.splice(index, 1);
      
        $scope.total();
      
        $scope.ship = $scope.cart.length > 0 ? 30000 : 0;
      
        const cartString = JSON.stringify($scope.cart);
        localStorage.setItem('CART', cartString);
    };

    $scope.total = function() {
      const total = $scope.cart.reduce((init, cur) => init + cur.price * cur.quantity, 0);
      return total;
    };

    $scope.saveCart = function(){
      const cartString = JSON.stringify($scope.cart);
      localStorage.setItem('CART', cartString);
    }

    $scope.deleteAll = function(){
      $scope.cart = [];
      $scope.saveCart();
    }

    $scope.checkout = function(){
      if($scope.cart.length){
        $scope.$watch('$rootScope.user', function() {
          if ($rootScope.user && $rootScope.user.id) {            
            $http.post('http://localhost:3000/orders', {
              name: $scope.user.name,
              phone: $scope.user.phone,
              address: $scope.user.address,
              $product: $scope.cart,
              idUser: $rootScope.user.id,
              total: $scope.total(),
              date: new Date().toLocaleString('sv-SE'),
              status: 'Chờ xác nhận'
            }).then(
              function(res){
                $scope.deleteAll();
                document.querySelector('.btn-out').click();
                $location.path('checkoutdone')
              }
            )
          } else {
            alert('Vui lòng đăng nhập để đặt hàng!!!')
          }
        });
      }else{
        alert('Giỏ hàng của bạn không có sản phẩm!')
      }
    }
  
    $scope.saveInfoUser = function(){
      if($scope.user.name && $scope.user.phone && $scope.user.address){
        $http.patch(`http://localhost:3000/users/${$rootScope.user.id}`,
          {
              name: $scope.user.name,
              phone: $scope.user.phone,
              address: $scope.user.address,
          }
        ).then(
          function(res){
            localStorage.setItem('USER', JSON.stringify($rootScope.user));
            alert('Lưu Thành Công!')
        });
      }else{
        alert('Vui lòng nhập đầy đủ thông tin!')
      }
    } 
})