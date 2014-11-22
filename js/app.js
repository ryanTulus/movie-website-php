var movieApp = angular.module('movieApp', []);


movieApp.controller('movieListCtrl', function($scope, $http) {
  
  $http.get('movie-list.php').success(function(data){
    $scope.moviesData = data;
  });
  
});