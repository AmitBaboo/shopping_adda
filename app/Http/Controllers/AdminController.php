<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\sub_category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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



// start delete sub category //

public function delete_sub_category($id){
       $sub_category=sub_category::find($id);
       $sub_category->delete();
       return redirect()->back()->with('message','Sub Category Deleted Succesfully');
    }

// end delete sub category //









}
