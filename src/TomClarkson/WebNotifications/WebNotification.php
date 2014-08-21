<?php namespace TomClarkson\WebNotifications; 

use Illuminate\Database\Eloquent\Model as Eloquent;

class WebNotification extends Eloquent {
    protected $table = 'web_notifications';
    protected $fillable = ['url', 'user_id', 'historable_id', 'historable_type', 'message', 'thumbnail', 'seenState'];

}


