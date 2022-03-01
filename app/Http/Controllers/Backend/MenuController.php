<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Menu;
use App\Models\MenuCategory;

class MenuController extends Controller
{
    //
     public function MenuView(){
         $categories = MenuCategory::latest()->get();
        $menus = Menu::latest()->get();
        return view('backend.menu.menu_view',compact('menus','categories'));
    }
    public function MenuAdd(){
        $menus = Menu::latest()->get();
        return view('backend.menu.add_menu',compact('menus'));
    }

    public function MenuStore(Request $request){
        $request->validate([
            
        'menu_name'              => 'required',
        'category_id'            => 'required',
        'menu_image'             => 'required',
        'menu_price'             => 'required',
        ]);

        $image = $request->file('menu_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(150,150)->save('upload/menu/'.$name_gen);
        $save_url = 'upload/menu/'.$name_gen;

       
        Menu::insert([

        'menu_name'               => $request->menu_name,
        'category_id'             => $request->category_id,
        'menu_price'              =>  $request->menu_price,
        'menu_image'              =>  $save_url,
        ]);
         $notification = array(
            'message' => 'Menu Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.menu')->with($notification);
    }

    public function MenuEdit($id){

        
        $menus = Menu::findOrFail($id);
        return view('backend.menu.menu_edit',compact('menus'));

    }

    public function MenuUpdate(Request $request,$id){

         $old_image = $request->old_image;
        


         if($request->file('img')){

            unlink($old_image); 
                $image = $request->file('img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(400,500)->save('upload/menu/'.$name_gen);
                $save_url = 'upload/menu/'.$name_gen;

              

        Menu::FindOrFail($id)->update([

       'img'    =>  $save_url,
       
       
        ]);
         $notification = array(
            'message' => 'Special Dish Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.menu')->with($notification);
         }else{

            
        Menu::FindOrFail($id)->update([

        'dish_name_first'              => $request->dish_name_first,
        'dish_name_second'              => $request->dish_name_second,
        'desp'                          =>  $request->desp,
        'price'                         => $request->price,  
       
        ]);
         $notification = array(
            'message' => 'Menu Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.menu')->with($notification);

         }



    }

    public function MenuDelete($id){
        $old_img = Menu::findOrFail($id);
    	$img = $old_img->menu_image;
    	unlink($img);
       
       Menu::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Menu Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
