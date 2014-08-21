<?php namespace TomClarkson\WebNotifications; 

use Illuminate\Routing\Controller;
use TomClarkson\WebNotifications\WebNotification;
use Auth, Response;

class WebNotificationsController extends Controller {
    // !! Need to handle case where there is no notification found !!

    public function __construct(WebNotification $webNotification)
    {
        $this->webNotification = $webNotification;
        $this->beforeFilter('auth');
    }

    public function getUserNotifications()
    {
        $userId = Auth::user()->id;
        $notifications = $this->webNotification->whereUserId($userId)->get();

        // timestamp: "2014-08-11T23:17:11.072Z", 

        return Response::json($notifications, 200);
    }

    public function markAsRead($notificationId)
    {
        $userId = Auth::user()->id;
        $notification = $this->webNotification->whereUserId($userId)->whereId($notificationId)->first();

        $notification->seenState = "SEEN_AND_READ";
        $notification->save();

        return Response::json($notification, 200);
    }

    public function markAsSeen($notificationId)
    {
        $userId = Auth::user()->id;
        // check it belongs to user
        $notification = WebNotification::whereUserId($userId)->whereId($notificationId)->first();
        $notification->seenState = "SEEN_BUT_UNREAD";
        $notification->save();
        
        return Response::json($notification, 200);
    }

    public function remove($notificationId)
    {
        $userId = Auth::user()->id;
        // check it belongs to user
        $notification = WebNotification::whereUserId($userId)->whereId($notificationId)->first();
        $notification->delete();
        
        return Response::json(200);
    }
}

