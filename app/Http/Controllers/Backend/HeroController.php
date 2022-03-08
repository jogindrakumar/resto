<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use Image;

class HeroController extends Controller
{
    //
       public function HeroView(){
        $heros = Hero::latest()->get();
        return view('backend.hero.hero_view',compact('heros'));
    }
    public function HeroAdd(){
        $heros = Hero::latest()->get();
        return view('backend.hero.add_hero',compact('heros'));
    }

    public function HeroStore(Request $request){
        $request->validate([
       
        'img'              => 'required',
    
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,600)->save('upload/hero/'.$name_gen);
        $save_url = 'upload/hero/'.$name_gen;

       
        Hero::insert([

        'img'                           =>  $save_url,
       
        ]);
         $notification = array(
            'message' => 'Hero Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.hero')->with($notification);
    }

    public function HeroEdit($id){

        
        $heros = Hero::findOrFail($id);
        return view('backend.hero.hero_edit',compact('heros'));

    }

    public function HeroUpdate(Request $request,$id){

         $old_image = $request->old_image;
        
            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(550,600)->save('upload/hero/'.$name_gen);
                $save_url = 'upload/hero/'.$name_gen;

        Hero::FindOrFail($id)->update([

       'img'    =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'Hero Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.hero')->with($notification);
         

    }

    public function HeroDelete($id){
        $old_image = Hero::findOrFail($id);
    	$img = $old_image->img;
    	unlink($img);
        
       Hero::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'hero Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
