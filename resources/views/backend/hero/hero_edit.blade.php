@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-8">

			        
			</div>

<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Hero Images</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('hero.update',$heros->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
         <input type="hidden" name="old_image" value="{{$heros->img}}">

         <img src="{{asset($heros->img)}}" alt="" style="height:150px;width:150px;">
      <div class="form-group">
        <h5>Image <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img" class="form-control"  value="{{$heros->img}}"  required=""> 
		@error('img')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>

    
    
	
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>
     
           

          </div>

           
  @endsection
