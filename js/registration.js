var app = angular.module('StarterApp', ['ngMaterial'])
app.config( function($mdThemingProvider){
        // Configure a dark theme with primary foreground yellow
        $mdThemingProvider.theme('docs-dark', 'default')
    });

app.controller('AppCtrl', function($scope, $http) {
    var config = {
        headers: {
            "WP-API-KEY": "WP_nEhj6FkTJNiFfiS5moVeUE"
        }
    };

    var url = 'http://app.adomattic.com/api/users/register/company/'
    
    $scope.submitForm = function () {
        console.log($scope.user);
        $http.post(
            url, $scope.user, config
            )
            .success(function(response) {
                console.log(response);
            }).error(function(response) {
                console.log(response);
            });
    }
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