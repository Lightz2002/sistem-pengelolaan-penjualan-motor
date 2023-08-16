<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{

  public function multiUpload(Array $fileInputs, $data) {
    foreach ($fileInputs as $fileInput) {
      if (request()->file($fileInput)) {
        $path = $this->upload(request()->file($fileInput));
        $data->{$fileInput} = $path;
      }
    }
  }
  public function upload($file) {
    $path = $file->store('images');
    return $path;
  }
}
