<?php

class BlogController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('blog.home', ['posts' => Post::with('category')->paginate(1)]);
	}

	public function showPost($slug)
	{
		$post = Post::whereSlug($slug)->first();

		return View::make('blog.blog-single', compact('post'));
	}

	public function showByTag($slug)
	{
		$posts = Tag::whereSlug($slug)->first()->posts()->paginate(1);

		return View::make('home', compact('posts'));

	}

	public function showByCategory($slug)
	{
		$posts = Category::whereSlug($slug)->first()->posts()->paginate(1);

		return View::make('blog.home', compact('posts'));

	}

}
