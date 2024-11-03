<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index(){
        $companies = Company::count();
        $products = Product::count();
        $totalPrice = Product::sum('price');

    return view('home' , compact('companies','products','totalPrice'));

    }
}