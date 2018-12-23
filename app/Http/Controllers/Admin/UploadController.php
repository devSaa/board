<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(Request $request): string
    {
        $this->validate($request, [
            'upload' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $file = $request->file('upload');

        $message = 'Failed';

        if ($pathToFile = '/storage/' . $file->store('images', 'public')) {
            $message = 'Uploaded';
        }

        return '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("' . $request->CKEditorFuncNum . '", "' . $pathToFile . '", "' . $message . '");</script>';
    }
}