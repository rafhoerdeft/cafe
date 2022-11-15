<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileStorage extends Controller
{
    public function show($path = null)
    {
        try {
            $arr = explode('.', $path);
            array_pop($arr); // remove last array value
            $file = join('', $arr); // join array value to string
            $file_path = storage_path('app/' . decode($file));

            $response = response()->file($file_path);
        } catch (\Exception $e) {
            $response = abort('404');
        }

        return $response;
    }

    public function download($path = null)
    {
        try {
            $arr = explode('.', $path);
            array_pop($arr); // remove last array value
            $file = join('', $arr); // join array value to string
            $file_path = storage_path('app/' . decode($file));

            $response = response()->download($file_path);
        } catch (\Exception $e) {
            $response = abort('404');
        }

        return $response;
    }
}
