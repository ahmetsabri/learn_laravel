<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;

class HttpController extends Controller
{
    public function __invoke(Request $request){
       $posts = Http::get('https://jsonplaceholder.typicode.com/posts')->collect();

       dd($posts->first()['title']);
    }
}
