(function() {
    // NOT SURE WHY I DON"T NEED TO INJECT NOTIFICATIONSERVICE!!!!
    angular.module('MyApp')
        .directive("notificationDropdown", function($http, notificationService) {
            return {
                restrict: "E",
                templateUrl: "assets/partials/notification-dropdown.html",
                replace: true,
                link: function(scope) { //Unused: element, attrs
                    $http.get('user/notifications').success(function(notifications) {
                        angular.forEach(notifications, function(notification) {
                            notificationService.addNotification(notification);
                        });
                    });

                    scope.notificationService = notificationService;

                    scope.addNotification = function() {
                        notificationService.addNotification({
                                id: 2,
                                url: "www.google.com",
                                category_id: 1,
                                message: "Test add notification",
                                thumbnail: "https://www.filepicker.io/api/file/EV5c74b5SPSHwa5sX1Iw",
                                seenState: "UNSEEN_AND_UNREAD",
                                timestamp: "2014-08-11T23:17:11.072Z", 
                        });
                    };

                    scope.removeNotification = function(id) {
                      notificationService.removeNotification(id);
                    };

                    
                    scope.markAllAsRead = function() {
                        notificationService.markAllAsRead();
                    };

                    scope.markAsRead = function(id) {
                        notificationService.markAsRead(id);
                    };

                    scope.markAllAsSeen = function() {
                        notificationService.markAllAsSeen();
                    }

                }
            }
        });

})();