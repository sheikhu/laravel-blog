<?php
namespace Blog\Composers;

use Category, Tag;

class BlogSidebarComposer
{
    public function compose($view)
    {

        $categories = Category::all();
        $tags = Tag::all();

        $view->with('categories', $categories)
                ->with('tags', $tags);

    }
}
 ?>
