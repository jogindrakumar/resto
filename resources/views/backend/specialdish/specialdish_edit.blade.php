 @extends('admin.admin_master')
@section('main_content')

 {{-- Add About form here  --}}

            	<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Special Dish</h3>
				</div>
        <div class="box-body">
            <div class="table-responsive">
	<form action="{{route('specialdish.update',$specialdishs->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
      
    
        <div class="form-group">
        <h5>Head Dish Name<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="dish_name_first" class="form-control"  value="{{$specialdishs->dish_name_first}}"  > 
		@error('dish_name_first')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
      <div class="form-group">
        <h5>Dish Name<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="dish_name_second" class="form-control"  value="{{$specialdishs->dish_name_second}}"  > 
		@error('dish_name_second')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	 <div class="form-group">
        <h5>Description <span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="desp" class="form-control"  value="{{$specialdishs->desp}}"  > 
		@error('desp')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
    <div class="form-group">
        <h5>Price<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="text" name="price" class="form-control" value="{{$specialdishs->price}}"> 
		@error('price')
		<span class="text-danger">{{$message}}</span>
		@enderror
		</div>
    </div>
	<input type="hidden" name="old_image" value="{{$specialdishs->img}}">

    <img src="{{asset($specialdishs->img)}}" alt="" style="height: 50px;width:50px;">
	<div class="form-group">
        <h5>image<span class="text-danger">*</span></h5>
        <div class="controls">
        <input type="file" name="img"  class="form-control"  value="{{$specialdishs->img}}"  > 
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
      @endsection