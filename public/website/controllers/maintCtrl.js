app.controller('mainCtrl', function($scope, $rootScope, $http, $location){
    $scope.Date = function(date){
        return new Date(date);
    }

    if (localStorage.getItem('USER')) {
        $rootScope.user = JSON.parse(localStorage.getItem('USER'));
    }

    $scope.logout = function(){
        localStorage.removeItem('USER');
        delete $rootScope.user;
        $location.path('/login');
    }

    const cartString = localStorage.getItem('CART');
    if (cartString) {
        //gio hang co sp
        const cart = JSON.parse(cartString);
        $scope.cart = cart;
    } else {
        //gio hang k co sp
        $scope.cart = [];
    }

    $scope.addToCart = function(product) {
        if ($scope.cart.filter(i => i.id === product.id).length === 0) {
            product.quantity = 1;
            $scope.cart.push(product);
        } else {
        $scope.cart.forEach(i => {
                if (i.id === product.id) {
                    i.quantity++;
                    product.quantity++;
                }
            });
        }

        const cartString = JSON.stringify($scope.cart);
        localStorage.setItem('CART', cartString);
    };

    document.querySelector('.enterSearch').addEventListener('click', function() {
        performSearch();
    });
    
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key == 'Enter') {
            performSearch();
        }
    });
    
    function performSearch() {
        window.location.href = 'http://127.0.0.1:5500/index.html?#!/ct_product/0';
    }
})

