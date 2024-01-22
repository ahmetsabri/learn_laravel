<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {

        // response all about

        // - header
        // - cookie (encrypt, get , expire)
        // - redirects : named route , action controller, away, flashed session
        // - types : view, json , file, download,
        // - streamDownload
        // - macro

        $data = [
            [
                'username' => 'moahmmed',
            ],

            [
                'username' => 'ali',
            ],

            [
                'username' => 'ahmed',
            ],
        ];

        return response()->formatName($data);
    }

    // format name to upper case

    public function formatName($name)
    {
        return strtoupper($name);
    }
}
