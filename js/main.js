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
  
  app.controller('MyCtrl', function($scope) {
  $scope.modalShown = false;
  $scope.toggleModal = function() {
    $scope.modalShown = !$scope.modalShown;
  };
});
  
  app.directive('modalDialog', function() {
  return {
    restrict: 'E',
    scope: {
      show: '='
    },
    replace: true, // Replace with the template below
    transclude: true, // we want to insert custom content inside the directive
    link: function(scope, element, attrs) {
      scope.dialogStyle = {};
      if (attrs.width)
        scope.dialogStyle.width = attrs.width;
      if (attrs.height)
        scope.dialogStyle.height = attrs.height;
      scope.hideModal = function() {
        scope.show = false;
      };
    },
    template: 'templates/overlay.html' 
  };
});
  
})();