<?php
namespace App\Composers;

use Knp\Menu\MenuFactory;
use Knp\Menu\Matcher\Matcher;
use App\Menu\Matcher\Voter\UriVoter;
use App\Menu\Renderer\ListRenderer;
use URL, Request;

class SidebarComposer
{


    public function compose($view)
    {
        $factory = new MenuFactory();
        $menu = $factory->createItem('sidebar')
        ->setChildrenAttribute('class', 'sidebar-nav');
        $menu->addChild('Home', array(
            'uri' => URL::action('posts.index'),
            'label' => 'Dashboard',
            'allow_safe_labels' => true,
            'extras' => array('safe_label' => true)
            ))
        ->setAttribute('class', 'sidebar-brand');
        $menu->addChild('Posts', array(
            'uri' => URL::action('posts.index')
            ));

        $menu->addChild('Categories', array(
            'uri' => URL::action('categories.index')
            ));

        $menu->addChild('Users', array(
            'uri' => URL::action('users.index')
            ));

        $menu->addChild('Images', array(
            'uri' => URL::action('photos.index')
            ));

        $menu->addChild('Portolios', array(
            'uri' => URL::action('portfolios.index')
            ));

        $menu->addChild('Tags', array(
            'uri' => URL::action('tags.index')
            ));

        $menu->addChild('Contacts', array(
            'uri' => route('contacts.index')
            ));


        $matcher = new Matcher();
        $matcher->addVoter(new UriVoter(URL::current()));

        $renderer = new ListRenderer($matcher);
        $view->with('sidebar', $renderer->render($menu, array(
            'currentClass' => 'active',
            'allow_safe_labels' => true,
            'extras' => array('safe_label' => true)

            )
        )
        );
    }
}
?>
