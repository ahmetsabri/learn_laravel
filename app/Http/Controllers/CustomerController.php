<?php

namespace App\Http\Controllers;

use App\Exports\CustomersExport;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
