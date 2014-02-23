<?php
namespace App\Listeners;

use Input, Imager,
    Image, Config, File, Symfony\Component\HttpFoundation\File\UploadedFile;
class ImageListener
{
    public function saving($image)
    {

        if(!Input::file('image'))
            return;

        if(File::exists($image->getRootPath()))
            File::delete($image->getRootPath());


        $this->handleFileUpload(Input::file('image'), $image);

    }

    public function saved($image)
    {

    }

    private function handleFileUpload(UploadedFile $image, Image $entity)
    {
        $uploadPath = Config::get('settings.uploadPath');

        $fileName = $this->generateFilename($image);

        $fullPath = $uploadPath . '/' . $fileName;

        $status = Imager::make($image->getRealPath())
                ->resize(400, 300)
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


    public function deleted($image)
    {
        if(File::exists($image->getRootPath()))
            File::delete($image->getRootPath());
    }
}
 ?>
