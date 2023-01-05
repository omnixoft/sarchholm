<?php
namespace App\Repositories;

use App\Models\Image;

class ImageRepository implements IImageRepository
{
    public function add($data)
    {
        return Image::create($data);
    }
}