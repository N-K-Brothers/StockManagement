<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageProduct extends Controller
{
    public function index()
    {
        $products=Product::all();
        $lowproduct=DB::select('select count(*) as count from product_details where quantity<restock')[0]->count;
        return view('Admin.ManageProduct.index',['products'=>$products, 'lowcount'=>$lowproduct]);
    }
    public function index1()
    {
        $user=isset(Auth::user()->id);
        $products=Product::all();
        return view('welcome',['products'=>$products,'isAuth'=>$user]);
    }
    public function addform()
    {
        $products=Product::all();
        return view('Admin.ManageProduct.add');
    }
    public function updateform($id)
    {
        $products=Product::find($id);
        return view('Admin.ManageProduct.edit',['products'=>$products]);
    }
    public static function setProductImage(Request $request,$products)
    {
        $path=$products->image;
        if ($request->hasFile('Image'))
              $path = $request->file('Image')->store('\product_image');
        return $path;
    }
    public function save(Request $request,$id=0)
    {
        //dd($request);
        $products=($id)?Product::find($id):new Product();
        $products->name=$request->input('Product_Name');
        $products->image=$this->setProductImage($request,$products);
        $products->price=$request->input('Price');
        $products->quantity=$request->input('Quantity');
        $products->restock=$request->input('Restock',0);
        $products->description=$request->input('Product_Description');
        $products->save();
        return redirect('/manageproduct');


    }
    public function delete($id)
    {
        $products=Product::find($id)->delete();
        return redirect('/manageproduct');
    }
    public function active($id)
    {
        $products=Product::find($id);
        $products->is_active=1;
        $products->save();
        return redirect('/manageproduct');
    }
    public function deactive($id)
    {
        $products=Product::find($id);
        $products->is_active=0;
        $products->save();
        return redirect('/manageproduct');
    }

    public function editstock(Request $request,$id)
    {
        $products=Product::find($id);
        $products->quantity+=$request->input('Stock');
        $products->save();
        return redirect('/manageproduct');
    }
    public static function getProductList()
    {
        $products=Product::where('is_active','1');
        return $products;
    }

    public function uploadform()
    {
        return view('Admin.manageproduct.uploadexcel');
    }

    public function sellProduct(Request $request,$id){
        $product=Product::find($id);
        $product->quantity-=$request->input('qty',0);
        $product->save();
        return redirect('/');
    }

}
