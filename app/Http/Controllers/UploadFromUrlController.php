<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadFromUrlController extends Controller
{
    // invoke method
    public function __invoke(Request $request)
    {
        // get url from request
        $url = $request->url;

        $imageContent = file_get_contents($url);

        if ($imageContent === false){
            return response()->json(['msg'=>'error']);
        }

        $imageName = Str::random(60).".png";

        $save = file_put_contents(storage_path("app/public/$imageName"), $imageContent);

        if(!$save){
            return response()->json(['msg'=>'error']);
        }

        return response()->json(['url'=>asset("storage/$imageName")]);
    }
}
