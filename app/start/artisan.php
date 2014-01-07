<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/


$commandPath = app_path(). '/commands';

$finder = new Symfony\Component\Finder\Finder();

$files = $finder->files()->in($commandPath);

foreach ($files as $file) {
    $className = substr($file->getFileName(), 0, -4);

    if(!class_exists($className))
        throw new Exception("Class $className not found !");

    $parentClass = 'Illuminate\Console\Command';
    if(!class_parents($parentClass))
        throw new Exception("Class $className must extend $parentClass !");

    Artisan::add(new $className);
}

