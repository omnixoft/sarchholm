<?php
namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUpload
{
    public function imageUpload($thumbnailImage,$slug,$path,$width,$height)
    {
        $slug =  Str::slug($slug);
        if (isset($thumbnailImage))
        {
            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit($width, $height)->save(public_path('images/'.$path.'/' .  $fileName . '.jpg'));

            $thumbnailName = $image->basename;
        } else
        {
            $thumbnailName ='default.png';
        }

        return $thumbnailName;
    }

    public function imageUpdate($thumbnailImage,$slug,$model,$path,$width,$height)
    {
        $slug =  Str::slug($slug);

        if (isset($thumbnailImage))
        {
            if(isset($model->file))
            {
//                Storage::disk('public')->delete("$path/{$model->file}");
                File::delete(public_path() . "/images/"."$path/{$model->file}");

            }
            if(isset($model->image))
            {
//                Storage::disk('public')->delete("$path/{$model->image}");
                File::delete(public_path() . "/images/"."$path/{$model->image}");

            }

            if(isset($model->url))
            {
//                Storage::disk('public')->delete("$path/{$model->image}");
                File::delete(public_path() . "/images/"."$path/{$model->url}");

            }


            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit($width, $height)->save(public_path('images/'.$path.'/'  .  $fileName . '.jpg'));
            $thumbnailName = $image->basename;
        } else
        {
            if(isset($model->file))
            {
                $thumbnailName =$model->file;
            }
            if(isset($model->image))
            {
                $thumbnailName =$model->image;
            }
            if(isset($model->url))
            {
                $thumbnailName =$model->url;
            }else{
                $thumbnailName = '';
            }
        }
        return $thumbnailName;
    }

    public function propertyImageUpdate($thumbnailImage,$slug,$model,$path,$width,$height)
    {
        // dd($model->background_image);

        $slug =  Str::slug($slug);

        if (isset($thumbnailImage))
        {
            if(isset($model->thumbnail))
            {
                File::delete(public_path() . "/images/"."$path/{$model->thumbnail}");
            }
            if(isset($model->background_image))
            {
                File::delete(public_path() . "/images/"."$path/{$model->background_image}");
            }


            $currentDate = Carbon::now()->toDateString();
            $fileName = $slug.'-'.$currentDate.'-'.uniqid();
            $image = \Intervention\Image\Facades\Image::make($thumbnailImage)->encode('jpg', 90)->fit($width, $height)->save(public_path('images/'.$path.'/'  .  $fileName . '.jpg'));
            $thumbnailName = $image->basename;
        } else
        {
            if($path == 'thumbnail')
            {
                $thumbnailName = $model->thumbnail;
            }elseif($path == 'backgroundImage')
            {
                $thumbnailName =$model->background_image;
            }else{
                $thumbnailName = '';
            }
        }
        return $thumbnailName;
    }
}
