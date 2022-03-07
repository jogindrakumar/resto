<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Image;

class TeamController extends Controller
{
    //
     public function TeamView(){
         
        $teams = Team::latest()->get();
        return view('backend.team.team_view',compact('teams'));
    }
    public function TeamAdd(){
        $teams = Team::latest()->get();
        return view('backend.team.add_team',compact('teams'));
    }

    public function TeamStore(Request $request){
        $request->validate([
            
        'name'                  => 'required',
        'post'                  => 'required',
        'img'                   => 'required',
        ]);

        $image = $request->file('img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(500,750)->save('upload/team/'.$name_gen);
        $save_url = 'upload/team/'.$name_gen;

       
        Team::insert([

        'name'                  => $request->name,
        'post'                  => $request->post,
        'twt_link'              => $request->twt_link,
        'insta_link'            => $request->insta_link,
        'tube_link'             => $request->tube_link,
        'fb_link'               => $request->fb_link,
        'img'                   =>  $save_url,
        ]);
         $notification = array(
            'message' => 'team Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.team')->with($notification);
    }

    public function TeamEdit($id){

        
        $teams = Team::findOrFail($id);
        return view('backend.team.team_edit',compact('teams'));

    }

    public function TeamUpdate(Request $request,$id){

         $old_image = $request->old_image;
        


         if($request->file('img')){

            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(500,750)->save('upload/team/'.$name_gen);
                $save_url = 'upload/team/'.$name_gen;

              

        Team::FindOrFail($id)->update([

       'img'              =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'team Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.team')->with($notification);
         }else{

            
        Team::FindOrFail($id)->update([

        'heading'              => $request->heading,
        'desp'              => $request->desp,
        
       
       
        ]);
         $notification = array(
            'message' => 'team Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.team')->with($notification);

         }



    }

    public function teamDelete($id){
        $old_img = Team::findOrFail($id);
    	$img = $old_img->img;
    	unlink($img);
       
       Team::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'team Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
