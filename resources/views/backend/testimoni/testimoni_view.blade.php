@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Testimonial </h3>
                 
                  
				</div>
                <div>
                   
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Customer Name</th>
								<th>Message</th>
								<th>From</th>
								<th>Actions</th>	
							</tr>
						</thead>
						<tbody>
                           
                            
 @foreach ($testimonis as $testimoni)                         
<tr>
	
	<td>{{$testimoni->cust_name}}</td>
	<td>{{$testimoni->message}}</td>
	<td>{{$testimoni->from}}</td>
	
	
<td>
<a href="{{route('testimoni.edit',$testimoni->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('testimoni.delete',$testimoni->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
</td>
      @endforeach      
        </tr>
         
							
						</tbody>
					
					  </table>
					</div>
				</div>
				
			  </div>
			        
			</div>

<div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Testimonial </h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('testimoni.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Customer Name <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="cust_name" class="form-control"  value=""  > 
		@error('cust_name')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
     <div class="form-group">
        <h5>Message <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="message" class="form-control"  value=""  > 
		@error('message')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
     <div class="form-group">
        <h5>From <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="from" class="form-control"  value=""  > 
		@error('from')
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
