var movieApp = angular.module('movieApp', []);


movieApp.controller('movieListCtrl', function($scope, $http) {
  
  $http.get('movie-list.php').success(function(data) {
    $scope.moviesData = data;
  });
  
});

movieApp.controller('movieDetailCtrl', function($scope, $http) {
  
  $http.get('movie-details.php').success(function(data) {
    $scope.movieDetail = data
  });
});

movieApp.controller('registrationController', function() {
  
});