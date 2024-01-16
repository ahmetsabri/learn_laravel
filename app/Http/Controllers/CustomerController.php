<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Exports\CustomersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CreateCustomerRequest;
use App\Imports\CustomerImport;
use Http;
use Storage;

class CustomerController extends Controller
{
    public function export(Request $request)
    {
        // return (new CustomersExport('ahmed'))->download('queued-customers.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new CustomerImport, $request->file('customers'));


        return 'success';
    }

}
