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
				  <h3 class="box-title">Add Testimonial </h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('testimoni.update',$testimonis->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Customer Name <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="cust_name" class="form-control"  value="{{$testimonis->cust_name}}"  > 
		@error('cust_name')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
     <div class="form-group">
        <h5>Message <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="message" class="form-control"  value="{{$testimonis->message}}"  > 
		@error('message')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
     <div class="form-group">
        <h5>From <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="from" class="form-control"  value="{{$testimonis->from}}"  > 
		@error('from')
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
