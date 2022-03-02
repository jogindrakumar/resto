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
								<th>Menu Dish Name</th>
								<th>Category</th>
								<th>Price</th>
								<th>Image</th>
								<th>Actions</th>	
							</tr>
						</thead>
						<tbody>
                           
                            
 @foreach ($menus as $menu)                         
<tr>
	
	<td>{{$menu->menu_name}}</td>
	<td>{{$menu['menucategory']['category_name']}}</td>
	<td>{{$menu->menu_price}}</td>
	<td><img src="{{asset($menu->menu_image)}}" alt="" style="height:50px;width:50px;"></td>
	
	
<td>
<a href="{{route('menu.edit',$menu->id)}}" class="btn btn-warning btn-sm" title="Edit Data"><i class="fa fa-edit"></i></a>
<a href="{{route('menu.delete',$menu->id)}}" class="btn btn-danger btn-sm" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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
				  <h3 class="box-title">Add Category Menu</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('menu.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Menu Dish Name <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="menu_name" class="form-control"  value=""  required=""> 
		@error('menu_name')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
            <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="category_id"  required="" class="form-control">
                    <option  selected="" disabled="" value="">Select Category</option>
                    @foreach ($categories as $category)
                        
        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            @error('category_id')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        </div>
      <div class="form-group">
        <h5>Image <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="menu_image" class="form-control"  value=""  required=""> 
		@error('category_name')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>

      <div class="form-group">
        <h5>price <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="menu_price" class="form-control"  value="" required="" > 
		@error('menu_price')
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
