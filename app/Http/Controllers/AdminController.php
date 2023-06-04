<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\sub_category;
use App\Models\brand;
use App\Models\size;
use App\Models\color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Validation\ValidationException;




class AdminController extends Controller
{


//start category //
    public function category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
// end category //

    
//start add main category //
  //  public function add_category(Request $request){
        
  //      $data= new category;

  //      $data->category_name=$request->category;

  //      $data->save();

  //      return redirect()->back()->with('message','Category Added Succesfully');
// }




public function add_category(Request $request)
{
    $categoryName = $request->input('category');

    // Check if the category already exists
    $existingCategory = DB::table('categories')
        ->where('category_name', $categoryName)
        ->first();

    if ($existingCategory) {
        // Handle the case where the category already exists
        return redirect()->back()->with('message','Category already exists.');
    }

    // Add the category if it doesn't already exist
    DB::table('categories')->insert([
        'category_name' => $categoryName,
        // other category fields
    ]);

    // Redirect or return success response
    // ...
    return redirect('show_category')->with('message','Category Added Succesfully');
}



 //end add main category //



 // start add sub category //

 //public function add_sub_category(Request $request){
        
  //  $data= new sub_category;

 //   $data->category_name=$request->main_category;

 //   $data->sub_category_name=$request->sub_category;

  //  $data->save();

  //  return redirect()->back()->with('message','Category Added Succesfully');
//}


public function add_sub_category(Request $request)
{
    $main_category = $request->input('main_category');
    $sub_category = $request->input('sub_category');
  


    // Check if the category already exists
    $existingCategory = DB::table('sub_categories')
        ->where('sub_category_name', $sub_category)
        ->first();

    if ($existingCategory) {
        // Handle the case where the category already exists
        return redirect()->back()->with('message','Sub Category already exists.');
    }

    // Add the category if it doesn't already exist
    DB::table('sub_categories')->insert(['category_name' => $main_category,'sub_category_name' => $sub_category]);




    // Redirect or return success response
    // ...
    return redirect('show_category')->with('message','Category Added Succesfully');
}



 // end add sub category //




  //start show all category //
  public function show_category(){
    $sub_category=sub_category::all();
    $category=category::all();
    return view('admin.show_category',compact('sub_category','category'));
}

    // end show all category //


    // start update main category //

    public function update_category($id){
        $category=category::find($id);
        return view('admin.update_category',compact('category'));
    }


    public function update_category_confirm(Request $request,$id){
        $category=category::find($id);
        $category->category_name=$request->category;
        $category->save();
        return redirect('show_category')->with('message','Category Updated Seccessfully');
    }

    // start update main category //


//start delete main category //

//public function delete_category($id){
//   $category=category::find($id);
//   $category->delete();
//   return redirect()->back();
//}

function delete_category($categoryId)
{
  
    $categoryName = DB::table('categories')
        ->where('id', $categoryId)
        ->value('category_name');

    
    $hasSubcategories = DB::table('sub_categories')
        ->where('category_name', $categoryName)
        ->where('category_name', '!=',$categoryName='category_name')
        ->exists();

    if (!$hasSubcategories) {
      
        DB::table('categories')
            ->where('id', $categoryId)
            ->delete();
            return redirect()->back()->with('message','Category Deleted Succesfully');
    } else {
       

        return redirect()->back()->with('message','Cannot delete category because it has subcategories with the same name');
    
    }
}

// end delete main category //




// start update sub category //

public function update_sub_category($id){
    $data=category::all();
    $sub_category=sub_category::find($id);
    return view('admin.update_sub_category',compact('sub_category','data'));
    
}





public function update_sub_category_confirm(Request $request,$id){
    $sub_category=sub_category::find($id);
    $sub_category->category_name=$request->main_category;
    $sub_category->sub_category_name=$request->sub_category;
    $sub_category->save();
    return redirect('show_category')->with('message','Sub_Category Updated Seccessfully');
}

// start update sub category //




// start delete sub category //

public function delete_sub_category($id){
       $sub_category=sub_category::find($id);
       $sub_category->delete();
       return redirect()->back()->with('message','Sub Category Deleted Succesfully');
    }

// end delete sub category //

// start brand  //

public function brand(){
    return view('admin.brand');
}

// end brand  //

// start add brand  //

public function add_brand(Request $request)
{
    $brandName = $request->input('brand_name');

    // Check if the brand egory already exists
    $existingbrand= DB::table('brands')
        ->where('brand_name', $brandName)
        ->first();

    if ($existingbrand) {
        // Handle the case where the brand already exists
        return redirect()->back()->with('message','brand already exists.');
    }

    // Add the brand if it doesn't already exist

    $image = $request->brand_image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->brand_image->move('images/brand_image',$imagename);
    
    DB::table('brands')->insert(['brand_name' => $brandName,'brand_image' => $imagename,]);
    
   

    // Redirect or return success response
    // ...
    return redirect('show_brand')->with('message','brand Added Succesfully');
}

// end add brand  //

// start show brand  //

public function show_brand(){
    $brand=brand::all();
    return view('admin.show_brand',compact('brand'));
}
// end show brand  //



// start update brand  //

public function update_brand($id){
    $brand=brand::find($id);
    return view('admin.update_brand',compact('brand'));
}


public function update_brand_confirm(Request $request,$id){

  
    $brand = DB::table('brands')->find($id);
    $brandName = $request->input('brand_name');

    DB::table('brands')->where('id', $id)->update(['brand_name' => $brandName]);

    if ($request->hasFile('brand_image')) {
        $image = $request->file('brand_image');


       
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->brand_image->move('images/brand_image',$imagename);
      
        DB::table('brands')->where('id', $id)->update(['brand_image' => $imagename]);

        if ($brand->brand_image) {
            Storage::disk('public')->delete($brand->brand_image);
        }

        return redirect('show_brand')->with('message','brand updated Succesfully');



    }else{
        return redirect('show_brand')->with('message','brand updated Succesfully');
    }




}

// end update brand  //


// start delete brand  //

public function delete_brand($id){
    $brand=brand::find($id);
    $brand->delete();
    return redirect()->back()->with('message','brand Deleted Succesfully');
 }


// end delete brand  //






// start size  //

public function show_size(){
    $size=size::all();
    return view('admin.show_size',compact('size'));
}


public function size(){
    return view('admin.size');
}





public function add_size(Request $request)
{
    $sizename = $request->input('size');

    $existingsize= DB::table('sizes')
        ->where('size', $sizename)
        ->first();

    if ($existingsize) {
        return redirect()->back()->with('message','Size already exists.');
    }

    DB::table('sizes')->insert(['size' => $sizename]);
    
    return redirect('show_size')->with('message','size Added Succesfully');
}


public function update_size($id){
    $size=size::find($id);
    return view('admin.update_size',compact('size'));
}


public function update_size_confirm(Request $request,$id){
    $size=size::find($id);
    $size->size=$request->size;
    $size->save();
    return redirect('show_size')->with('message','Size Updated Seccessfully');
}

public function delete_size($id){
    $size=size::find($id);
    $size->delete();
    return redirect()->back()->with('message','Size Deleted Succesfully');
 }


// end size  //



// start color  //


public function show_color(){
    $color=color::all();
    return view('admin.show_color',compact('color'));
}


public function color(){
    return view('admin.color');
}


public function add_color(Request $request)
{
    $colorname = $request->input('color');

    $existingcolor= DB::table('colors')
        ->where('color', $colorname)
        ->first();

    if ($existingcolor) {
        return redirect()->back()->with('message','Color already exists.');
    }

    DB::table('colors')->insert(['color' => $colorname]);
    
    return redirect('show_color')->with('message','Color Added Succesfully');
}


public function update_color($id){
    $color=color::find($id);
    return view('admin.update_color',compact('color'));
}


public function update_color_confirm(Request $request,$id){
    $color=color::find($id);
    $color->color=$request->color;
    $color->save();
    return redirect('show_color')->with('message','Color Updated Seccessfully');
}

public function delete_color($id){
    $color=color::find($id);
    $color->delete();
    return redirect()->back()->with('message','Color Deleted Succesfully');
 }







// end color  //


}
