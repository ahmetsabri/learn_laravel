<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{

    public function __invoke(Product $product)
    {
        return $product;
    }
}
