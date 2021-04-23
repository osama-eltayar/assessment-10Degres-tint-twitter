<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait HasFiles
{
    public function storeFile(string $dirName , $file, $parent = NULL)
    {
        $path = $dirName;
        $path.= $parent ? '/'.$parent : null ;
        return Storage::disk($this->disk())->putFile($path, $file);
    }

    public function getFileUrl($path): ?string
    {
        if($path)
            return Storage::disk($this->disk())->url($path);
        return null;
    }

    public function getMimeType($path)
    {
        if($path)
            return Storage::disk($this->disk())->mimeType($path);
        return null;
    }

    public function disk()
    {
        return $this->storageDisk ?? 'public' ;
    }
}
