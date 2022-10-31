<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void errorForm($errors, $name)
 * @method static void showImage($uri)
 * @method static void randomString($length)
 *
 * @see \App\Support\Helper
 */
class Helper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'helper';
    }
}
