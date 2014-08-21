(function() {

  // var module = angular.module('loom_notifications_service', []);

  // Private Variables
  var notifications = [];
  var nextNotificationId = 0;
  var rootScope = null;
  
  // seen_state: "SEEN_AND_READ"
  // seen_state: "SEEN_BUT_UNREAD"
  // UNSEEN_AND_UNREAD

  // message_counts unread_count:1, unseen_count:1, seen_timestamp:1408400735696, last_action_id:1408438715637000000
  // when you open the message it becomes unread:1, unseen: 0

  // could be called NotificationCollection
  angular.module('MyApp').service('notificationService', function($rootScope, $http) {

    this.getNotifications = function() {
      return notifications;
    };

    this.addNotification = function(notification) {
      // notification.id must be unique
      // notification.id = nextNotificationId;
      // nextNotificationId = nextNotificationId + 1;
      notifications.push(notification);
      $rootScope.$broadcast('notification_added', notification);
    };

    this.countUnseenAndUnread = function() {
      var unseenAndUnread = 0, i;

      for (i = 0; i < notifications.length; i = i + 1) {
        if (notifications[i].seenState === "UNSEEN_AND_UNREAD") {
          unseenAndUnread = unseenAndUnread + 1;
        }
      }
      return unseenAndUnread;
    };

    this.markAsRead = function(notificationId) {
        var notification = this.find(notificationId);
        notification.seenState = "SEEN_AND_READ";
        $rootScope.$broadcast('notification_updated', notification);

        $http.post("user/notifications/" + notificationId + "/markasread");
    };

    this.markAllAsRead = function() {
      var i;
      for (i = 0; i < notifications.length; i = i + 1) {
        notifications[i].seenState = "SEEN_AND_READ";
        $rootScope.$broadcast('notification_updated', notification);
      }


    };

    this.markAllAsSeen = function() {
      var i;
      for (i = 0; i < notifications.length; i = i + 1) {
        if(notifications[i].seenState == "UNSEEN_AND_UNREAD") {
          notifications[i].seenState = "SEEN_BUT_UNREAD";
          $http.post("user/notifications/" + notifications[i].id + "/markasseen");
        }
      }
    };

    this.find = function(id) {
      var i;
      for (i = 0; i < notifications.length; i = i + 1) {
        if (notifications[i].id === id) {
          return notifications[i];
        }
      }
      // throw exception could not find notification?
      return null;
    };

    this.removeNotification = function(id) {
      var index = -1, i;
      for (i = 0; i < notifications.length; i = i + 1) {
        if (notifications[i].id === id) {
          index = i;
        }
      }
      if (index > -1) {
        notifications.splice(index, 1);
      }

      $http.post("user/notifications/" + id + "/remove");
      
      $rootScope.$broadcast('notification_removed', id);
    };
  });

}());
