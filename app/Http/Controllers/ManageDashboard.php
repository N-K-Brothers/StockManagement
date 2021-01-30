<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageDashboard extends Controller
{
    public function index()
    {
        $products=Product::all()->count();
        $lowproduct=DB::select('select count(*) as count from product_details where quantity<restock')[0]->count;
        return view('Admin.dashboard',['products'=>$products,'lowcount'=>$lowproduct]);
    }
}
