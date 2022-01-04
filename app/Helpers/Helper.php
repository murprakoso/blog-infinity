<?php

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class Helper
{
    /** set active menu */
    public static function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }

    /**
     * $timestamps ... ago
     */
    public static function date_since($timestamp)
    {
        $dt = Carbon::parse($timestamp);
        return $dt->diffForHumans();
    }

    public static function date_post($timestamp)
    {
        return Carbon::parse($timestamp)->isoFormat('MMMM D, YYYY');
    }

    /** delete file directory */
    public static function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir") self::rrmdir($dir . "/" . $object);
                    else unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }
}
