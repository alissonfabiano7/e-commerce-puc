<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        header('Access-Control-Allow-Origin:  *');
        header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, PATCH, DELETE');
        header('Access-Control-Allow-Headers: Accept, Content-Type, X-Auth-Token, Origin, Authorization');
        $featuredProducts = Product::where('featured', 1)->paginate(12);
        return view('site.pages.homepage', compact('featuredProducts'));
    }
}
