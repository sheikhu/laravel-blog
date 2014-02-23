<?php

class BlogController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DESC')->paginate(Config::get('settings.posts_per_page', 2));

        return View::make('blog.home', compact('posts'));
	}

	public function showPost($slug)
	{
		$post = Post::whereSlug($slug)->first();

		return View::make('blog.blog-single', compact('post'));
	}

	public function showByTag($slug)
	{
		$posts = Tag::whereSlug($slug)->first()->posts()->paginate(Config::get('settings.post_per_page', 2));

		return View::make('blog.home', compact('posts'));
	}

	public function showByCategory($slug)
	{
		$posts = Category::whereSlug($slug)->first()->posts()->paginate(Config::get('settings.post_per_page', 2));

		return View::make('blog.home', compact('posts'));
	}

	public function showAuthor(User $author)
	{
		$posts = $author->posts()->paginate(Config::get('settings.post_per_page', 2));

		return View::make('blog.home', compact('posts'));
	}

}
