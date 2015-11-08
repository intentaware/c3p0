var app = angular.module('StarterApp', ['ngMaterial', 'angular-jquery-maskedinput']);
app.config( function($mdThemingProvider){
    // Configure a dark theme with primary foreground yellow
    $mdThemingProvider.theme('docs-dark', 'default');
});

app.controller('AppCtrl', function($scope, $http) {
    $scope.submitted = false;

    var config = {
        headers: {
            "WP-API-KEY": "WP_nEhj6FkTJNiFfiS5moVeUE"
        }
    };

    var url = 'http://app.adomattic.com/api/users/register/company/';

    $scope.submitForm = function () {
        console.log($scope.user);
        $http.post(
        url, $scope.user, config
        )
        .success(function(response) {
            console.log(response);
            $scope.submitted = true;
        }).error(function(response) {
            angular.forEach(response, function(value, key){
                console.log(value);
                console.log(key);
                console.log($scope.userForm);
            });
            $scope.errors = response;
            console.log($scope.errors);
        });
    };
});

app.directive("passwordVerify", function() {
    return {
        require: "ngModel",
        scope: {
            passwordVerify: '='
        },
        link: function(scope, element, attrs, AppCtrl) {
            scope.$watch(function() {
                var combined;

                if (scope.passwordVerify || AppCtrl.$viewValue) {
                    combined = scope.passwordVerify + '_' + AppCtrl.$viewValue;
                }
                return combined;
            }, function(value) {
                if (value) {
                    AppCtrl.$parsers.unshift(function(viewValue) {
                        var origin = scope.passwordVerify;
                        if (origin !== viewValue) {
                            AppCtrl.$setValidity("passwordVerify", false);
                            return undefined;
                        } else {
                            AppCtrl.$setValidity("passwordVerify", true);
                            return viewValue;
                        }
                    });
                }
            });
        }
    };
});

app.directive('initialValue', function() {
  return{
    restrict: 'A',
    controller: ['$scope', '$element', '$attrs', '$parse', function($scope, $element, $attrs, $parse){

      var getter, setter, val, tag;
      tag = $element[0].tagName.toLowerCase();

      val = $attrs.initialValue || $element.val();
      if(tag === 'input'){
        if($element.attr('type') === 'checkbox'){
          val = $element[0].checked ? true : undefined;
        } else if($element.attr('type') === 'radio'){
          val = ($element[0].checked || $element.attr('selected') !== undefined) ? $element.val() : undefined;
        }
      }

      if($attrs.ngModel){
        getter = $parse($attrs.ngModel);
        setter = getter.assign;
        setter($scope, val);
      }
    }]
  };
});

jQuery(function($){
   $("#phone").mask("999 - 999 - 9999");
});
