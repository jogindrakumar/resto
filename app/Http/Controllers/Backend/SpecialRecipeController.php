<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\SpecialRecipe;

class SpecialRecipeController extends Controller
{
    //
     //
     public function SpecialRecipeView(){
         
        $specialrecipes = SpecialRecipe::latest()->get();
        return view('backend.specialrecipe.specialrecipe_view',compact('specialrecipes'));
    }
    public function SpecialRecipeAdd(){
        $specialrecipes = SpecialRecipe::latest()->get();
        return view('backend.specialrecipe.add_specialrecipe',compact('specialrecipes'));
    }

    public function SpecialRecipeStore(Request $request){
        $request->validate([
            
        'name'                  => 'required',
        'img'                   => 'required',
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,600)->save('upload/specialrecipe/'.$name_gen);
        $save_url = 'upload/specialrecipe/'.$name_gen;

       
        SpecialRecipe::insert([

        'name'              => $request->name,
        'img'              =>  $save_url,
        ]);
         $notification = array(
            'message' => 'Special Recipe Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialrecipe')->with($notification);
    }

    public function SpecialRecipeEdit($id){

        
        $specialrecipes = SpecialRecipe::findOrFail($id);
        return view('backend.specialrecipe.specialrecipe_edit',compact('specialrecipes'));

    }

    public function SpecialRecipeUpdate(Request $request,$id){

         $old_image = $request->old_image;
        


         if($request->file('img')){

            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(550,600)->save('upload/specialrecipe/'.$name_gen);
                $save_url = 'upload/specialrecipe/'.$name_gen;

              

        SpecialRecipe::FindOrFail($id)->update([

       'img'              =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'Special Dish Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialrecipe')->with($notification);
         }else{

            
        SpecialRecipe::FindOrFail($id)->update([

        'name'              => $request->name,
       
       
        ]);
         $notification = array(
            'message' => 'SpecialRecipe Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialrecipe')->with($notification);

         }



    }

    public function SpecialRecipeDelete($id){
        $old_img = SpecialRecipe::findOrFail($id);
    	$img = $old_img->SpecialRecipe_image;
    	unlink($img);
       
       SpecialRecipe::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Special Recipes Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
