(function() {

    angular.module('MyApp')
        .directive("kajigger", function() {
            return {
                restrict: "E",
                templateUrl: "assets/partials/kajigger.html",
                scope: {
                    thing: "="
                },
                complile: function() {
                    return function() {
                        
                    }
                }
            }
        });

})();