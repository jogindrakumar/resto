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
				  <h3 class="box-title">TEAM</h3>
                 
                  
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
								<th>Post</th>
								<th>Facebook Link</th>
								<th>Tweet Link</th>
								<th>Instagram Link</th>
								<th>Youtube Link</th>
								<th>Image</th>
								<th>Actions</th>	
							</tr>
						</thead>
						<tbody>
                           
                            
 @foreach ($teams as $team)                         
<tr>
	
	<td>{{$team->name}}</td>
	<td>{{$team->post}}</td>
	<td>{{$team->fb_link}}</td>
	<td>{{$team->twt_link}}</td>
	<td>{{$team->insta_link}}</td>
	<td>{{$team->tube_link}}</td>
	<td><img src="{{asset($team->img)}}" alt="" style="height:50px;width:50px;"></td>
	
	
<td>
<a href="{{route('team.edit',$team->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('team.delete',$team->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Team</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
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
        <h5> Post <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="post" class="form-control"  value=""  required=""> 
		@error('post')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5> Fb Link <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="fb_link" class="form-control"  value=""  > 
		@error('fb_link')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5> Tweet <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="twt_link" class="form-control"  value=""  > 
		@error('twt_link')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5> Instagram Link <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="insta_link" class="form-control"  value=""  > 
		@error('insta_link')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5> Youtube Link <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="tube_link" class="form-control"  value=""  > 
		@error('tube_link')
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
