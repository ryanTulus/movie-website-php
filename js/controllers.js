var movieControllers = angular.module("movieControllers", []);

movieControllers.controller('movieListCtrl', function($scope, $http) {
  
  $http.get('movie-list.php').success(function(data) {
    $scope.movies = data;
  });
  
});

movieControllers.controller('movieDetailCtrl', function($scope, $http, $attrs) {
  
  if (!$attrs.idtext) throw new Error("No id text for MovieDetailCtrl");
  
  $http.get('movie-details.php', {params: {id: $attrs.idtext}}).success(function(data) {
    $scope.movieDetail = data;
  });
});

movieControllers.controller('registrationCtrl', function() {
  
});

movieControllers.controller('reviewCtrl', function() {
  
});