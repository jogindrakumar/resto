<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimoni;
class TestimoniController extends Controller
{
    //
     public function TestimoniView(){
        $testimonis = Testimoni::latest()->get();
        return view('backend.testimoni.testimoni_view',compact('testimonis'));
    }
   

    public function testimoniStore(Request $request){
        $request->validate([
            
        'cust_name'   => 'required',
        'message'   => 'required',
        'from'   => 'required',
        
        ]);

        Testimoni::insert([

        'cust_name'    => $request->cust_name,
        'message'    => $request->message,
        'from'    => $request->from,
       
        ]);
         $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.testimoni')->with($notification);
    }

    public function testimoniEdit($id){

        
        $testimonis = Testimoni::findOrFail($id);
        return view('backend.testimoni.testimonicategory_edit',compact('testimonis'));

    }

    public function TestimoniUpdate(Request $request,$id){
  
        Testimoni::FindOrFail($id)->update([

       'cust_name'    => $request->cust_name,
        'message'    => $request->message,
        'from'    => $request->from,
        
       
        ]);
         $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
                );
        return redirect()->route('all.testimoni')->with($notification);

         



    }

    public function TestimoniDelete($id){
     
       Testimoni::FindOrFail($id)->delete();

         $notification = array(
                        'message' => 'Category Delete Successfully',
                        'alert-type' => 'info'
                            );
                    return redirect()->back()->with($notification);
    }
}
