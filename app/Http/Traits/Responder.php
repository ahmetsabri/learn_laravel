<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Collection;

trait Responder
{
    public function respond(array|Collection $data, string $viewName = '')
    {
        return request()->expectsJson() ? response()->json($data) : view($viewName, $data);
    }
}
