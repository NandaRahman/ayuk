<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user/product/index')->with('products',Product::all());
    }

    public function create(Request $request){
        $data = $request->all();
        if (!empty($request->photo)){
            $photoName = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('gallery/photo/product'), $photoName);
            $data['photo'] = $photoName;
        }
        Product::create($data);
        return back();
    }

    public function detail($id){
        $product = Product::where('id',$id)->first();
        if (empty($product)) return back();
        else return view('user/product/detail')->with('product', $product);
    }

    public function status($id, $active){
        Product::where('id',$id)->update(['active'=>$active]);
        return back();
    }
}
