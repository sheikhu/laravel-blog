<?php
namespace App\Composers;

use Knp\Menu\MenuFactory;
use Knp\Menu\Matcher\Matcher;
use App\Menu\Matcher\Voter\UriVoter;
use Knp\Menu\Renderer\ListRenderer;
use URL, Request;


class NavbarComposer
{

    public function compose($view)
    {
        $factory = new MenuFactory();
        $menu = $factory->createItem('navbar')
                ->setChildrenAttribute('class', 'nav navbar-nav');
        $menu->addChild('Accueil', array('uri' => URL::action('home', [])));
        $menu->addChild('Portfolio', array('uri' => '#portfolio'));
        $menu->addChild('Blog', array('uri' => URL::action('blog.home', [])));
        $menu->addChild('Contact', array('uri' => URL::action('contact', [])));

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
            'uri' => URL::action('posts.index', [])
            ));

        $menu->addChild('Logout', array(
            'uri' => URL::action('logout', [])
            ));


        return $menu;


    }
}


?>
