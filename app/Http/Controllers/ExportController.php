<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function Export_productrDetails(Request $request){
        return Excel::download(new ProductsExport,"ProductList.xlsx");
    }
}
