<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Angular Karama L4</title>
    <link rel="stylesheet" href="notifications.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- AngularJS -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.20/angular.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular-route.min.js"></script>
    <!-- AngularUI Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/0.11.0/ui-bootstrap-tpls.min.js"></script>
    <!-- app -->
    <!-- // <script src="/assets/js/app.js"></script> -->
    <script>
    // angular.element(document).ready(function() {
    //     angular.bootstrap(document, ['TodoApp']);
    // });


    var app = angular
        .module('MyApp', [
            'ngRoute',
            'ui.bootstrap'
        ]);

    angular.element(document).ready(function() {
        angular.bootstrap(
            document.getElementById("web-notification"), 
            ['MyApp']
        );
    });
    </script>
    <!--<script src="/assets/js/services/http.js"></script>-->
    <!--<script src="/assets/js/directives/myFadeInChars.js"></script>-->
    <script src="/assets/js/services/NotificationsService.js"></script>
    <!-- // <script src="/assets/js/controllers/karuta.js"></script> -->
    <script src="/assets/js/directives/kajigger.js"></script>
    <script src="/assets/js/directives/notificationDropdown.js"></script>
    <!--<script src="/assets/js/controllers/modal/result.js"></script>-->


</head>
<body>
<div class="container" id="web-notification">
    <!-- <div ng-view></div> -->
    <style>
    .notifications-panel-heading {
        border-bottom: 1px solid #ddd;
        padding-top: 8px;
        padding-bottom: 25px;
        font-size: 13px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .userImg50 {
        width: 50px;
    }

    .notification-media {
        border-bottom: 1px solid #ddd;
        margin-top: 0px;
        padding: 10px;
    }

    .unread {
      background: #EBF6FF;
    }

    .notification-media:hover {
      background: #EBF6FE;
    }

    </style>

    <h1>Custom directive</h1>

    <notification-dropdown></notification-dropdown>

    <button class="btn btn-success" ng-click="addNotification()">Add Notification</button>
</div>




</body>
</html>