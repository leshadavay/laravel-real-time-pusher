<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
//${id} comes from parameter on the name of channel
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//in case only authenticated user
Broadcast::channel('notifications', function ($user) {
    return $user != null;
});

Broadcast::channel('chat', function ($user) {
    if($user!=null){
        return [
            'id'    =>  $user->id,
            'name'  =>  $user->name
        ];
    }
});

//chat with specific user
Broadcast::channel('chat.with.{receiver}', function ($user,$receiver) {
    return (int) $user->id === (int) $receiver;
});
