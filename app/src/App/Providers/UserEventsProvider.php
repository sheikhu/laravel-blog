<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Listeners\UserListener;
use App\Listeners\PostsListener;
use App\Listeners\ImageListener;
use User, Post, Image;

class UserEventsProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        User::observe(new UserListener);
        Post::observe(new PostsListener);
        Image::observe(new ImageListener);
    }
}
 ?>
