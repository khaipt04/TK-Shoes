var app = angular.module('myApp', ['ngRoute']);
app.config(function($routeProvider){
    $routeProvider
    .when('/', {
        templateUrl: 'views/home.html',
        controller: 'homeCtrl'
    })
    .when('/detail/:id', {
        templateUrl: 'views/detail.html',
        controller: 'detailCtrl'
    })
    .when('/cart', {
        templateUrl: 'views/cart.html',
        controller: 'cartCtrl'
    })
    .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'loginCtrl'
    })
    .when('/register', {
        templateUrl: 'views/register.html',
        controller: 'registerCtrl'
    })
    .when('/changepass', {
        templateUrl: 'views/changePass.html',
        controller: 'changePassCtrl'
    })
    .when('/ct_product/:id', {
        templateUrl: 'views/category_product.html',
        controller: 'ct_productCtrl'
    })
    .when('/checkoutdone', {
        templateUrl: 'views/checkoutDone.html',
        controller: 'checkoutdoneCtrl'
    })
    .when('/order', {
        templateUrl: 'views/order.html',
        controller: 'orderCtrl'
    })
    .otherwise({
        templateUrl: 'views/404notfound.html'
    })
})