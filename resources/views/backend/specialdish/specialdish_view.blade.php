@extends('admin.admin_master')
@section('main_content')


	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Special Dishes</h3>
                  <br>
                  <br>
                   <a href="{{route('add.specialdish')}}" class="btn btn-success btn-sm" title="Add Portfolio"><i class="fa fa-plus"></i></a>
				</div>
                <div>
                   
                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image</th>
								<th>Head Dish Name</th>
								<th>Dish Name</th>
								<th>Description</th>
								<th>Price</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                           
                            
 @foreach ($specialdishs as $specialdish)                         
<tr>
	<td><img src="{{asset($specialdish->img)}}" alt="" style="width: 70px; height:70px"></td>	
	<td>{{$specialdish->dish_name_first}}</td>
	<td>{{$specialdish->dish_name_second}}</td>
	<td>{{$specialdish->desp}}</td>	
	<td>{{$specialdish->price}}</td>	
	
<td>
<a href="{{route('specialdish.edit',$specialdish->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('specialdish.delete',$specialdish->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
</td>
      @endforeach      
        </tr>
         
							
						</tbody>
					
					  </table>
					</div>
				</div>
				
			  </div>
			        
			</div>



           
  @endsection
