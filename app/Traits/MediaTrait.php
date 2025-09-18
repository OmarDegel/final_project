<?php

namespace App\Traits;

trait MediaTrait
{
    public function uploadFile($folder, $request, $type)
    {
        if (!$request->hasFile($type)) {
            return null;
        }

        $file = $request->file($type);
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        $path = public_path("uploads/{$folder}");
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file->move($path, $fileName);

        return "uploads/{$folder}/{$fileName}";
    }



    public function editFile($request, $obj, $folder, $type)
    {
        $fileUrl = $obj->$type ?? null;

        if ($request->hasFile($type)) {
            if ($fileUrl) {
                $this->deleteFile($fileUrl);
            }
            $fileUrl = $this->uploadImage($folder, $request, $type);
        }

        return $fileUrl;
    }

    public function deleteFile($path): void
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
