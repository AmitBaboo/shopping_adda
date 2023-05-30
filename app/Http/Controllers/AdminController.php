<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\sub_category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{


// category //
    public function category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
// category //

    
// add category //
    public function add_category(Request $request){
        
        $data= new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Category Added Succesfully');
 }

 // add category //

 // add sub category //

 public function add_sub_category(Request $request){
        
    $data= new sub_category;

    $data->category_name=$request->main_category;

    $data->sub_category_name=$request->sub_category;

    $data->save();

    return redirect()->back()->with('message','Category Added Succesfully');
}

 // add sub category //



}
