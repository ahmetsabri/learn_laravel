<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddressBookRequest;
use App\Models\AddressBook;
use Illuminate\Http\Request;

class CreateAddressBookController extends Controller
{

    public function __invoke(CreateAddressBookRequest $request)
    {

        AddressBook::create($request->validated());



        return response()->json(['msg'=>'Success']);
    }


}
