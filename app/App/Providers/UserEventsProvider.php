<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Listeners\UserListener;
use User;

class UserEventsProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        User::observe(new UserListener);
    }
}
 ?>
