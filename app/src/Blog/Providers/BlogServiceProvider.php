<?php
namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;
use Config, View;

class BlogServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->package('vendor/blog', 'blog', app_path().'/src/Blog');
    }


    public function boot()
    {
        require __DIR__.'/../Resources/routes/routes.php';
    }
}

 ?>
