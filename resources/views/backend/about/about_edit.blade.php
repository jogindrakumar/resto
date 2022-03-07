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
				  <h3 class="box-title">Edit About</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('about.update',$abouts->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5> Heading <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="heading" class="form-control"  value="{{$abouts->heading}}"  > 
		@error('heading')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
     <div class="form-group">
        <h5>Description<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="desp" class="form-control"  value="{{$abouts->desp}}"  > 
		@error('desp')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <input type="hidden" name="old_image" value="{{$abouts->img}}">

    <img src="{{asset($abouts->img)}}" alt="" style="width: 50px;height:50px;">
        <div class="form-group">
        <h5> Image <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img" class="form-control"  value="{{$abouts->img}}"  > 
		@error('img')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    
	
    <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
       
    </div>
</form>
			</div>
			</div>
			
		  </div>
		  
		</section>
		
	  
	  </div>

          </div>

           
  @endsection
