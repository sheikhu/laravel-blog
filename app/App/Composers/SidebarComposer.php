<?php
namespace App\Composers;

use Knp\Menu\MenuFactory;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\UriVoter;
use Knp\Menu\Renderer\ListRenderer;
use URL, Request;

class SidebarComposer
{


    public function compose($view)
    {
        $factory = new MenuFactory();
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

        $matcher = new Matcher();
        $matcher->addVoter(new UriVoter(Request::server('REQUEST_URI')));

        $renderer = new ListRenderer($matcher);
        $view->with('sidebar', $renderer->render($menu, array(
            'currentClass' => 'active',
            'allow_safe_labels' => true,
            'extras' => array('safe_label' => true)

            )));
    }
}
?>
