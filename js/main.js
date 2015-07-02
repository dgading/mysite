'use strict';
(function() {
  var app = angular.module('myApp', []); 
  
  app.controller('ReviewController', function($scope, $http){
    $scope.formData = {};
    $scope.submitForm = function() {
      $http({
        method: 'POST',
        url: 'process.php',
        data: $.param($scope.formData),
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }
      })
      .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorName = data.errors.name;
          $scope.errorEmail = data.errors.email;
          $scope.errorBody = data.errors.body;
        } else {
        // if successful, bind success message to message
          $scope.success = data.success;
          $scope.contactMe.$setPristine();
          $scope.formData = {};
        }
      });
    };
  });
})();