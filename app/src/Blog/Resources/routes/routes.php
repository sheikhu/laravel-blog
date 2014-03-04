<?php


Route::get('mask', function()
{
    $comment = new Blog\Models\Comment();
    $comment->fill(array(
        'author' => 'Sheikhu',
        'body' => 'Lorem ipsum dolor si amet....',
        'created_at' => new Datetime
        ));
    return $comment;
});

Route::group(array('prefix' => 'blog', 'namespace' => 'Blog\Controllers'), function(){

    Route::get('/', array('as' => 'blog.home', 'uses' => 'BlogController@index'));

    Route::get('{slug}', array('as' => 'blog.show', 'uses' =>'BlogController@showPost'));

    Route::get('tag/{tag}', array('as' => 'show_by_tag', 'uses' => 'BlogController@showByTag'));

    Route::get('category/{tag}', array('as' => 'show_by_category', 'uses' => 'BlogController@showByCategory'));

    Route::get('author/{author}', array('as' => 'show_by_author', 'uses' => 'BlogController@showAuthor'));

}
);

?>
