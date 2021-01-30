<?php


namespace App\Http\Controllers;

use App\Imports\ProductsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function Import_productDetails(Request $request){
        $this->checkValidation($request);
        $path = $request->file('File_Upload')->store('public/Upload_productDetails');
        Excel::import(new ProductsImport,$path);
        return redirect('/manageproduct');
    }
    public function checkValidation(Request $request){
        $request->validate([
            'File_Upload'=>array(
                'required',
                'max:10000',
                'mimes:xlsx'
                )
        ]);
    }
}
