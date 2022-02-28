<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialDish;
use Image;

class SpecialDishController extends Controller
{
    //

      public function SpecialDishView(){
        $specialdishs = SpecialDish::latest()->get();
        return view('backend.specialdish.specialdish_view',compact('specialdishs'));
    }
    public function SpecialDishAdd(){
        $specialdishs = SpecialDish::latest()->get();
        return view('backend.specialdish.add_specialdish',compact('specialdishs'));
    }

    public function SpecialDishStore(Request $request){
        $request->validate([
            
        'dish_name_first'   => 'required',
        'desp'              => 'required',
        'img'              => 'required',
        'price'             => 'required',
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(400,500)->save('upload/specialdish/'.$name_gen);
        $save_url = 'upload/specialdish/'.$name_gen;

       
        SpecialDish::insert([

        'dish_name_first'              => $request->dish_name_first,
        'dish_name_second'              => $request->dish_name_second,
        'desp'                          =>  $request->desp,
        'img'                           =>  $save_url,
        'price'                         => $request->price,   
        ]);
         $notification = array(
            'message' => 'Special Dish Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialdish')->with($notification);
    }

    public function SpecialDishEdit($id){

        
        $specialdishs = SpecialDish::findOrFail($id);
        return view('backend.specialdish.specialdish_edit',compact('specialdishs'));

    }

    public function SpecialDishUpdate(Request $request,$id){

         $old_image = $request->old_image;
        


         if($request->file('img')){

            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,801)->save('upload/specialdish/'.$name_gen);
                $save_url = 'upload/specialdish/'.$name_gen;

              

        SpecialDish::FindOrFail($id)->update([

       'img'    =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'SpecialDish Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialdish')->with($notification);
         }else{

            
        SpecialDish::FindOrFail($id)->update([

        'dish_name_first'              => $request->dish_name_first,
        'dish_name_second'              => $request->dish_name_second,
        'desp'                          =>  $request->desp,
        'price'                         => $request->price,  
       
        ]);
         $notification = array(
            'message' => 'SpecialDish Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialdish')->with($notification);

         }



    }

    public function SpecialDishDelete($id){
        $old_project_img = SpecialDish::findOrFail($id);
    	$img = $old_project_img->project_img;
    	unlink($img);
        $old_model_img = SpecialDish::findOrFail($id);
    	$model_img = $old_model_img->model_img;
    	unlink($model_img);
       SpecialDish::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'SpecialDish Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
