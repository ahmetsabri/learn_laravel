<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploaderController extends Controller
{
    // invoke method
    public function __invoke(Request $request)
    {
        $path = $request->file('file')->storePublicly('public/images');

        return response()->json([
            'path' => "https://laravelboy.s3.amazonaws.com/$path",
            'msg' => 'success',
        ]);
    }
}
