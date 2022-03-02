<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
      public function AboutView(){
         
        $abouts = About::latest()->get();
        return view('backend.about.about_view',compact('abouts'));
    }
    public function AboutAdd(){
        $Abouts = About::latest()->get();
        return view('backend.about.add_about',compact('abouts'));
    }

    public function AboutStore(Request $request){
        $request->validate([
            
        'heading'                => 'required',
        'desp'                  => 'required',
        'img'                   => 'required',
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(550,600)->save('upload/about/'.$name_gen);
        $save_url = 'upload/about/'.$name_gen;

       
        About::insert([

        'heading'              => $request->heading,
        'desp'              => $request->desp,
        'img'              =>  $save_url,
        ]);
         $notification = array(
            'message' => 'About Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.about')->with($notification);
    }

    public function AboutEdit($id){

        
        $Abouts = About::findOrFail($id);
        return view('backend.about.about_edit',compact('abouts'));

    }

    public function AboutUpdate(Request $request,$id){

         $old_image = $request->old_image;
        


         if($request->file('img')){

            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(550,600)->save('upload/about/'.$name_gen);
                $save_url = 'upload/about/'.$name_gen;

              

        About::FindOrFail($id)->update([

       'img'              =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.about')->with($notification);
         }else{

            
        About::FindOrFail($id)->update([

        'heading'              => $request->heading,
        'desp'              => $request->desp,
        
       
       
        ]);
         $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.about')->with($notification);

         }



    }

    public function AboutDelete($id){
        $old_img = About::findOrFail($id);
    	$img = $old_img->About_image;
    	unlink($img);
       
       About::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'About Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
