<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePropertyRequest;
use App\Models\Property;
use App\Models\Type;

class SavePropertyController extends Controller
{
        // invoke method

    public function __invoke(SavePropertyRequest $request){

        Property::updateOrCreate(['name'=>$request->name],$request->validated());

        return back();
    }

}
