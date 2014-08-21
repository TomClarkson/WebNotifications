<?php

Route::get('user/notifications', 'TomClarkson\WebNotifications\WebNotificationsController@getUserNotifications');
Route::post('user/notifications/{notificationId}/markasread', 'TomClarkson\WebNotifications\WebNotificationsController@markAsRead');
Route::post('user/notifications/{notificationId}/markasseen', 'TomClarkson\WebNotifications\WebNotificationsController@markAsSeen');
Route::post('user/notifications/{notificationId}/remove', 'TomClarkson\WebNotifications\WebNotificationsController@remove');
