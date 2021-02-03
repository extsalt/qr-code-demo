<?php

namespace App\Helper;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ImageUpload
{
//    /**
//     * Upload images.
//     *
//     * @param $files
//     * @return Collection
//     */
//    public static function process($files): Collection
//    {
//        $storage = self::directory();
//
//        return collect($files)->map(function ($file) use ($storage) {
//            $name = self::name($file);
//            $file->move($storage, $name);
//
//            return ['url' => "/images/products/$name"];
//        })->map(function ($url) {
//            return Image::query()->insertGetId($url);
//        });
//    }

    /**
     * Upload image and return path
     *
     * @param $file
     * @return string
     */
    public static function uploadGetName($file): string
    {
        $storage = self::directory();

        $name = self::name($file);

        $file->move($storage, $name);

        return "/images/{$name}";
    }


    public static function directory(): string
    {
        return config('app.env') === 'local'
            ? public_path('/images/')
            : base_path('/public_html/images/');
    }

    /**
     * @param $file
     * @return string
     */
    private static function name($file): string
    {
        return sprintf("%s_%s.%s",
            Str::random(30),
            time(),
            $file->getClientOriginalExtension()
        );
    }
}