<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sayurmodel;

class ProductController extends Controller
{
    public function listProduct()
    {
        $sayur = sayurmodel::all();
        return response()->json($sayur, 200);
    }

}
