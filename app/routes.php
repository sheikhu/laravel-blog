<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('portfolio', array('as' => 'portfolio', 'uses' => 'HomeController@getPortfolio'));

Route::match(array('GET', 'POST', 'PUT'), 'contact', array('as' => 'contact', 'uses' => 'HomeController@getContact'));

Route::get('/test', array('as' => 'test', function(){

    return URL::action('BlogController@index', [], false);
}));

Route::get('/', array('as' => 'home', function()
{
    $posts = Post::paginate(1);
    return View::make('home', ['posts' => $posts]);
}));

Route::get('/me', array('as' => 'me', function(){

    return View::make('about');
}));

Route::get('/contact', array('as' => 'contact', function(){

    return View::make('contact');
}));

Route::match(array('GET', 'POST') ,'login', array('as' => 'login', 'uses' => 'HomeController@login'));

Route::get('logout', array('as' => 'logout', 'before' => 'auth', 'uses' => 'HomeController@logout'));

Route::group(array('prefix' => 'blog'), function(){

    Route::get('/', array('as' => 'blog.home', 'uses' => 'BlogController@index'));

    Route::get('{slug}', array('as' => 'blog.show', 'uses' =>'BlogController@showPost'));

    Route::get('tag/{tag}', array('as' => 'show_by_tag', 'uses' => 'BlogController@showByTag'));

    Route::get('category/{tag}', array('as' => 'show_by_category', 'uses' => 'BlogController@showByCategory'));

});

Route::group(array('prefix' => '/', 'before' => 'auth'), function(){

Route::resource('posts', 'PostsController');

Route::resource('users', 'UsersController');

Route::resource('categories', 'CategoriesController');

Route::resource('tags', 'TagsController');

Route::resource('photos', 'PhotosController');

Route::resource('portfolios', 'PortfoliosController');
});


View::composer('layouts.partials.navbar', function($view){

    $factory = new Knp\Menu\MenuFactory();
    $menu = $factory->createItem('navbar')->setChildrenAttribute('class', 'nav navbar-nav');
    $menu->addChild('Accueil', array('uri' => URL::action('home', [], false)));
    $menu->addChild('Portfolio', array('uri' => '#portfolio'));
    $menu->addChild('Blog', array('uri' => URL::action('blog.home', [], false)));
    $menu->addChild('Contact', array('uri' => URL::action('contact', [], false )));

    $matcher = new Knp\Menu\Matcher\Matcher();
    $matcher->addVoter(new Knp\Menu\Matcher\Voter\UriVoter(Request::server('REQUEST_URI')));

    $renderer = new Knp\Menu\Renderer\ListRenderer($matcher);
    $view->with('menu', $renderer->render($menu, array('currentClass' => 'active')));
});


View::composer('layouts.partials.admin_sidebar', function($view){

    $factory = new Knp\Menu\MenuFactory();
    $menu = $factory->createItem('sidebar')
                    ->setChildrenAttribute('class', 'sidebar-nav');
    $menu->addChild('Home', array(
        'uri' => URL::action('posts.index', [], false),
        'label' => 'Dashboard',
        'allow_safe_labels' => true,
        'extras' => array('safe_label' => true)
        ))
                ->setAttribute('class', 'sidebar-brand');
    $menu->addChild('Posts', array('uri' => URL::action('posts.index', [], false)));
    $menu->addChild('Categories', array('uri' => URL::action('categories.index', [], false)));
    $menu->addChild('Users', array('uri' => URL::action('users.index', [], false )));
    $menu->addChild('Photos', array('uri' => URL::action('photos.index', [], false )));
    $menu->addChild('Portolios', array('uri' => URL::action('portfolios.index', [], false )));
    $menu->addChild('Tags', array('uri' => URL::action('tags.index', [], false)));
    $menu->addChild('Contacts', array('uri' => '#'));

    $matcher = new Knp\Menu\Matcher\Matcher();
    $matcher->addVoter(new Knp\Menu\Matcher\Voter\UriVoter(Request::server('REQUEST_URI')));

    $renderer = new Knp\Menu\Renderer\ListRenderer($matcher);
    $view->with('sidebar', $renderer->render($menu, array(
        'currentClass' => 'active',
        'allow_safe_labels' => true,
        'extras' => array('safe_label' => true)

        )));
});
?>


