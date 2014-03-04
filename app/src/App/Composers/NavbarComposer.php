<?php
namespace App\Composers;

use Knp\Menu\MenuFactory;
use Knp\Menu\Matcher\Matcher;
use App\Menu\Matcher\Voter\UriVoter;
use App\Menu\Renderer\ListRenderer;
use URL, Request, Auth;


class NavbarComposer
{

    public function compose($view)
    {
        $factory = new MenuFactory();
        $classes = [];
        if(Auth::guest())
            $classes[] = 'pull-right';
        $menu = $factory->createItem('navbar')
                ->setChildrenAttribute('class', 'nav navbar-nav '. implode(' ', $classes));
        //$menu->addChild('Accueil', array('uri' => URL::action('home')));
        $menu->addChild('Portfolio', array('uri' => URL::action('portfolio')));
        $menu->addChild('Blog', array('uri' => URL::action('blog.home', [])));
        $menu->addChild('Contact', array('uri' => URL::action('contact')));

        $matcher = new Matcher();

        $matcher->addVoter(new UriVoter(URL::current()));

        $renderer = new ListRenderer($matcher);

        $view->with('menu', $renderer->render($menu, array('currentClass' => 'active')));

        if(\Auth::check())
            $view->with('admin_menu', $renderer->render($this->getAdminMenu(), array('currentClass' => 'active')));


    }


    public function getAdminMenu()
    {
        $factory = new MenuFactory();
        $menu = $factory->createItem('admin_menu')
                ->setChildrenAttribute('class', 'nav navbar-nav pull-right');
        $menu->addChild('Dashboard', array(
            'uri' => URL::action('posts.index')
            ));

        $menu->addChild('Logout', array(
            'uri' => URL::action('logout')
            ));

        return $menu;
    }


    public function adminNavbar()
    {

    }
}


?>
