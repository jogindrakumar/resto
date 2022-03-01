<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategory;

class MenuCategoryController extends Controller
{
      public function MenuCategoryView(){
        $menucategorys = MenuCategory::latest()->get();
        return view('backend.menu.menu_category_view',compact('menucategorys'));
    }
   

    public function MenuCategoryStore(Request $request){
        $request->validate([
            
        'category_name'   => 'required',
        
        ]);

        MenuCategory::insert([

        'category_name'    => $request->category_name,
       
        ]);
         $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.menucategory')->with($notification);
    }

    public function MenuCategoryEdit($id){

        
        $menucategorys = MenuCategory::findOrFail($id);
        return view('backend.menu.menucategory_edit',compact('menucategorys'));

    }

    public function MenuCategoryUpdate(Request $request,$id){
  
        MenuCategory::FindOrFail($id)->update([

        'category_name'              => $request->category_name,
        
       
        ]);
         $notification = array(
            'message' => 'category_name Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.menucategory')->with($notification);

         



    }

    public function MenuCategoryDelete($id){
     
       MenuCategory::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Category Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
