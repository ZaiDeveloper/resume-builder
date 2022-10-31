<?php

namespace App\Support;

use Illuminate\Support\{Str};

/**
 * Helper
 *
 * @method void errorForm($errors, $name)
 * @method void showImage($uri)
 * @method void randomString($length)
 */
class Helper
{
    /**
     * Error Form
     *
     * @param mixed $errors, $name
     * @return array
     */
    public static function errorForm($errors, $name): array
    {
        $response = [
            'class' => '',
            'message' => '',
        ];
        // dd($errors);
        if ($errors->first($name)) {
            $response['class'] .= 'is-invalid';
            $response['message'] = '<div class="invalid-feedback">' . $errors->first($name) . '</div>';
        } else if ($errors->first($name . '.*')) {
            $response['class'] .= 'is-invalid';
            $response['message'] = '<div class="invalid-feedback">' . $errors->first($name . '.*') . '</div>';
        } else if (!$errors->first($name) && $errors->any()) {
            $response['class'] .= 'is-valid';
        }

        return $response;
    }

    /**
     * Show image
     *
     * @param mixed $uri
     * @return void
     */
    public static function showImage($uri = null)
    {
        if (!$uri) return null;

        return asset('/storage/' . @$uri);
    }

    /**
     * Random string
     *
     * @param mixed $length
     * @return void
     */
    public static function randomString($length = 8)
    {
        return Str::upper(Str::random($length));
    }
}
