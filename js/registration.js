var app = angular.module('StarterApp', ['ngMaterial']);

    app.controller('AppCtrl', ['$scope', '$mdSidenav', function($scope, $mdSidenav){
        $scope.toggleSidenav = function(menuId) {
            $mdSidenav(menuId).toggle();
        },
        $scope.user = {

        };
    }]).config( function($mdThemingProvider){
        // Configure a dark theme with primary foreground yellow
        $mdThemingProvider.theme('docs-dark', 'default')
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