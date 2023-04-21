<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    public static function upLoadImage($image, $slug, $model)
    {
        if ($image) {
            static::deleteImageFolder($model);
            $folder = "$slug/$model->id";
            $ext = $image->getClientOriginalExtension();
            $filename = rand(111111, 999999) . '.' . $ext;
            Storage::disk('public')->putFileAs($folder, $image, $filename);
            return "storage/$folder/$filename";
        }
    }
    public static function deleteImageFolder($model)
    {
        Storage::disk('public')->deleteDirectory("projects/$model->id");
    }
}
