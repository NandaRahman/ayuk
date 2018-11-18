<?php

namespace App\Http\Controllers\Admin;

use App\Partnership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnershipController extends Controller
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
        return view('user/partnership/index')->with('partnerships',Partnership::all());
    }

    public function create(Request $request){
        $data = $request->all();
        Partnership::create($data);
        return back();
    }

    public function detail($id){
        $partnership = Partnership::where('id',$id)->first();
        if (empty($partnership)) return back();
        else return view('user/partnership/detail')->with('partnership', $partnership);
    }

    public function status($id, $active){
        Partnership::where('id',$id)->update(['active'=>$active]);
        return back();
    }

}
