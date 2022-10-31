<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    /*
	$file = $request->file('product_image');
	 */
    public function uploadImageWithResize($file, $folderName, $resize = [500, 300], $watermark = false)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $imageName = $folderName . '-image-' . md5(time() . rand(10, 100)) . '.' . $fileExtension;

        $path = Storage::disk('public')->putFileAs($folderName, $file, $imageName);
        $fullPath = Storage::disk('public')->path($path);

        $img = Image::make($fullPath)->resize($resize[0], $resize[1], function ($constraint) {
            $constraint->aspectRatio();
        });

        if ($watermark) {
            $img->insert(public_path('img/mallmart-watermark.png'));
        }

        $img->save($fullPath);

        return $path;
    }

    /*
	$file = $request->file('product_image');
	 */
    public function updateUploadImageWithResize($file, $folderName, $oldImagePath = '', $resize = [500, 300], $watermark = false)
    {
        $fileExtension = $file->getClientOriginalExtension();
        $imageName = $folderName . '-image-' . md5(time() . rand(10, 100)) . '.' . $fileExtension;

        if ($oldImagePath) {
            $oldImage = Storage::disk('public')->path($oldImagePath);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $path = Storage::disk('public')->putFileAs($folderName, $file, $imageName);
        $fullPath = Storage::disk('public')->path($path);

        $img = Image::make($fullPath)->resize($resize[0], $resize[1], function ($constraint) {
            $constraint->aspectRatio();
        });

        if ($watermark) {
            $img->insert(public_path('img/mallmart-watermark.png'));
        }

        $img->save($fullPath);

        return $path;
    }

    public function deleteUploadImage($oldImagePath = '')
    {
        if ($oldImagePath) {
            $oldImage = Storage::disk('public')->path($oldImagePath);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
                return true;
            }
        }
        return true;
    }

    public function uploadImageWithResizeBase64($fileBase64, $folderName, $resize = [500, 300])
    {
        if (strpos($fileBase64, 'base64') !== false && strlen($fileBase64) > 300) {
            $fileExtension = 'jpg';
            $filterFirst = explode(';base64,', $fileBase64);
            if ($filterFirst) {
                $fileExtension = @explode('data:image/', $filterFirst[0])[1] ?? 'jpg';
                if ($fileExtension && in_array($fileExtension, ['png', 'jpg', 'jpeg', 'gif'])) {
                    $imageName = 'image-' . md5(time() . rand(10, 100)) . '.' . $fileExtension;
                    $pathFolder = storage_path('app/public/' . $folderName);

                    if (!file_exists($pathFolder)) {
                        mkdir($pathFolder, 755, true);
                    }

                    $pathStore = storage_path('app/public/' . $folderName . '/' . $imageName);

                    $imgStore = Image::make(file_get_contents($fileBase64))->resize($resize[0], $resize[1], function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $imgStore->insert(public_path('img/mallmart-watermark.png'));
                    if ($imgStore->save($pathStore)) {
                        $path = $folderName . '/' . $imageName;
                        return $path;
                    }
                }
            }
        } else {
            return $fileBase64;
        }
        return null;
    }
}
