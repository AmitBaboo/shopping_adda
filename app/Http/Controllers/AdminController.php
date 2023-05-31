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


// category //
    public function category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
// category //

    
// add category //
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











  // show category //
  public function show_category(){
    $sub_category=sub_category::all();
    $category=category::all();
    return view('admin.show_category',compact('sub_category','category'));
}

    // show category //

// delete category //

//public function delete_category($id){
//   $category=category::find($id);
//   $category->delete();
//   return redirect()->back();
//}

// delete category //




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

















}
