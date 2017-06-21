var app =  angular.module('main-App',['ngRoute','angularUtils.directives.dirPagination']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/home.html',
                controller: 'AdminController'
            }).
            when('/buku', {
                templateUrl: 'templates/buku.html',
                controller: 'BukuController'
            }).
            when('/anggota', {
                templateUrl: 'templates/anggota.html',
                controller: 'AnggotaController'
            });
}]);

app.value('apiUrl', 'http://localhost/perpus2/public');