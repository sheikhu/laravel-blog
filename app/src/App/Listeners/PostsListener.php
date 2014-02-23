<?php
namespace App\Listeners;

use Post,
Category,
Input,
Imager,
Image, Str, Config, File;

class PostsListener
{

    public function creating($post)
    {
        $post->slug = Str::slug($post->title);

        $count = Post::whereSlug($post->slug)->count();

        if($count > 0)
            $post->slug = $post->slug .= ($count + 1);

        $category = Category::find(Input::get('category_id'));

            // Attach category
        $post->category()->associate($category);
    }

    public function created($post)
    {
         // Attach image

        if(!Input::file('image'))
            return;

        // $image = $this->handleFileUpload(Input::file('image'), new Image);

        $post->image()->save(new Image);

    }

    public function saved($post)
    {
        $tags = array_values(Input::get('tags', array()));

        $post->tags()->sync($tags);

        if(!Input::file('image'))
            return;

        $image = is_null($post->image) ? new Image : $post->image;

        $post->image()->save($image);

    }


    private function handleFileUpload($image, $entity)
    {
        $uploadPath = Config::get('settings.uploadPath');

        $fileName = $this->generateFilename($image);

        $fullPath = $uploadPath . '/' . $fileName;

        $status = Imager::make($image->getRealPath())
                ->resize(400, 300)
                ->blur(6)
                ->save($fullPath);

        $entity->name = $fileName;

        $entity->url = Config::get('settings.publicUploadPath') . '/' . $fileName;

        $entity->slug = uniqid();

        return $entity;

    }

    public function generateFilename($image)
    {
        return uniqid() . '.' . $image->getClientOriginalExtension();
    }
}
?>
