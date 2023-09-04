<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

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

  public function generatePdf($data) {
    $pdf = Pdf::loadView('pdf.invoice', $data);
    // $pdfPath = storage_path('app/public/temp/document.pdf');
    // $pdf->save($pdfPath);
    return $pdf->stream('invoice.pdf');
  }
}
