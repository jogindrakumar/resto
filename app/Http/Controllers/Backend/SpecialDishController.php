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
            
        'project_name'              => 'required',
        'project_tech'              => 'required',
        'project_img'               => 'required',
        ]);

        $image = $request->file('project_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,801)->save('upload/specialdish/'.$name_gen);
        $save_url = 'upload/specialdish/'.$name_gen;

        $model_image = $request->file('model_img');
        $name_gen = hexdec(uniqid()).'.'.$model_image->getClientOriginalExtension();
        Image::make($model_image)->resize(1050,700)->save('upload/specialdish/model/'.$name_gen);
        $save_model_url = 'upload/specialdish/model/'.$name_gen;

        SpecialDish::insert([

        'project_name'              => $request->project_name,
        'project_tech'              => $request->project_tech,
        'project_img'              =>  $save_url,
        'model_img'              =>  $save_model_url,
        'project_link'              => $request->project_link,   
        ]);
         $notification = array(
            'message' => 'SpecialDish Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialdish')->with($notification);
    }

    public function SpecialDishEdit($id){

        
        $SpecialDishs = SpecialDish::findOrFail($id);
        return view('backend.specialdish.specialdish_edit',compact('specialdish'));

    }

    public function SpecialDishUpdate(Request $request,$id){

         $old_image = $request->old_image;
         $old_model_image = $request->old_model_image;


         if($request->file('project_img') && $request->file('model_img') ){

            unlink($old_image); 
                $image = $request->file('project_img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(800,801)->save('upload/specialdish/'.$name_gen);
                $save_url = 'upload/specialdish/'.$name_gen;

                unlink($old_model_image);
                $model_image = $request->file('model_img');
                $name_gen = hexdec(uniqid()).'.'.$model_image->getClientOriginalExtension();
                Image::make($model_image)->resize(1050,700)->save('upload/specialdish/model/'.$name_gen);
                $save_model_url = 'upload/specialdish/model/'.$name_gen;

        SpecialDish::FindOrFail($id)->update([

        'project_img'              =>   $save_url,
        'model_img'              =>  $save_model_url, 
       
        ]);
         $notification = array(
            'message' => 'SpecialDish Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.specialdish')->with($notification);
         }else{

            
        SpecialDish::FindOrFail($id)->update([

        'project_name'              => $request->project_name,
        'project_tech'              => $request->project_tech,
        'project_link'              => $request->project_link,   
       
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
