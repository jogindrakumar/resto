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
				  <h3 class="box-title">Menu </h3>
                 
                  
				</div>
                <div>
                   
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Image</th>
								<th>Actions</th>	
							</tr>
						</thead>
						<tbody>
                           
                            
 @foreach ($specialrecipes as $specialrecipe)                         
<tr>
	
	<td>{{$specialrecipe->name}}</td>
	<td><img src="{{asset($specialrecipe->img)}}" alt="" style="height:50px;width:50px;"></td>
	
	
<td>
<a href="{{route('specialrecipe.edit',$specialrecipe->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('specialrecipe.delete',$specialrecipe->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Special Recipe</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('specialrecipe.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5> Name <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="name" class="form-control"  value=""  required=""> 
		@error('name')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
           
      <div class="form-group">
        <h5>Image <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img" class="form-control"  value=""  required=""> 
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
