<?php
namespace App\Listeners;

 class UserListener
 {

    public function creating($user)
    {
        $user->password = \Hash::make($user->password);
    }

    public function updating($model){

    }

    public function updated($model){

    }

    public function saved($model)
    {
        //exit('saved');
    }
 }

 ?>
