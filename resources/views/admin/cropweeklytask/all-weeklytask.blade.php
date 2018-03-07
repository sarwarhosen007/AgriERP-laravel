@extends('layouts.master')
	@section('title', 'All weeklytask')

	@section('content')
		<section class="content">
	      <div class="row">
			
			
	        <div class="col-md-12">
	          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">{{ $crop->Name }} weeklytask list</h3>
	            </div>
				<div class="col-md-6">
					 @include('layouts.messages.flash-success-message')
				</div>
	            
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tr>
	                  <th style="width: 10px">#</th>
	                  <th>Week Number</th>
	                  <th>CropInsectSysId</th>
	                  <th>CropFertSysId</th>
	                  <th>FertilizerTask</th>
	                  <th>InsecticideTask</th>
	                  <th>OtherTask</th>
	                  <th>Created At</th>
	                  <th>Action</th>
	                </tr>
	                	@if(count($cropWeeklytasks) > 0)
			                @foreach($cropWeeklytasks as $cropweeklytask)
				                <tr>
				                  <td>{{ $loop->iteration }}</td>
				                  <td>{{ $cropweeklytask->WeekNumber }}</td>
				                  <td>{{ $cropweeklytask->CropInsectSysId }}</td>
				                  <td>{{ $cropweeklytask->CropFertSysId }}</td>
				                  <td>{{ $cropweeklytask->FertilizerTask }}</td>
				                  <td>{{ $cropweeklytask->InsecticideTask }}</td>
				                  <td>{{ $cropweeklytask->OtherTask }}</td>
				                  <td>{{ $cropweeklytask->created_at->diffForHumans() }}</td>
				                  <td>
				                  	<a href="{{ route('cropweeklytask.edit',$cropweeklytask->WeekId) }}" class="btn btn-primary btn-xs" role="button">Edit</a>

				                  	<form id="delete-form-{{ $cropweeklytask->WeekId }}" action="{{ route('cropweeklytask.destroy',$cropweeklytask->WeekId) }}" style="display: none;" method="post">
									 	{{ csrf_field() }}
									 	{{ method_field('DELETE') }}
									 	<input type="hidden" name="CropId" value="{{ $crop->CropId }}">
								    </form>

	                                <a href="#" class="btn btn-danger btn-xs" onclick="
	                              	if(confirm('Are You sure Want to Delete?')){
	                              		event.preventDefault();
	                              		document.getElementById('delete-form-{{ $cropweeklytask->WeekId }}').submit();
	                              	}else{
	                              		event.preventDefault();
	                              	}
	                              ">Delete</a>
				                  </td>
				                </tr>
				            @endforeach
			            @endif
	              </table>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer clearfix">
	               
	                {{ $cropWeeklytasks->links() }}
	               

	              <a href="{{ route('crop.index') }}" class="btn btn-info btn-xm">Back To List</a>
	            </div>

	          </div>

	          <!-- /.box -->
	        </div>

	        <!-- /.New Weekly Task -->
	        <div class="col-md-8">

              @include('layouts.messages.error-message')
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add New Weekly task</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('cropweeklytask.store') }}" method="post">
                   
                   {{ csrf_field() }}

                  <div class="box-body">
                   	<input type="hidden" name="CropId" value="{{ $crop->CropId }}">
                    <div class="form-group">
                      <label for="TotalWeeks" class="col-sm-4 control-label">Week Number:</label>

                      <div class="col-sm-8">
                         <select name="WeekNumber" class="form-control">
							 @for ($i = 1; $i <= 12; $i++)

							    <option value="{{ $i }}">week{{ $i }}</option>	 
							@endfor
	                    
	                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                       <label for="TotalWeeks" class="col-sm-4 control-label">Select Fertilizer  Name:</label>

                      <div class="col-sm-8">
                         <select name="CropFertSysId" class="form-control">
							  @foreach($ferlizers as $ferlizer)

							    <option value="{{ $ferlizer->FertilizerId }}">{{ $ferlizer->Name }}</option>	 
							@endforeach
	                    
	                    </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="FertilizerTask" class="col-sm-3 col-sm-offset-1 control-label">Task For Fertilizer:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" placeholder="Write Some Task About the ferlizer" name="FertilizerTask"></textarea> 
                        <i>Please write "N/A" if no task to be added</i> 
                      </div>
                    </div>
                    <div class="form-group">
                       <label for="TotalWeeks" class="col-sm-4 control-label">Select Insecticide Name:</label>

                      <div class="col-sm-8">
                         <select name="CropInsectSysId" class="form-control">
							  @foreach($insecticides as $insecticide)

							    <option value="{{ $insecticide->InsecticideId }}">{{ $insecticide->Name }}</option>	 
							@endforeach
	                    
	                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InsecticideTask" class="col-sm-3 col-sm-offset-1 control-label">Task For Insecticide:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" placeholder="Write Some Task About the insecticide" name="InsecticideTask"></textarea>  
                        <i>Please write "N/A" if no task to be added</i>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="OtherTask" class="col-sm-3 col-sm-offset-1 control-label">Other Task:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" placeholder="Write Some About the OtherTask" name="OtherTask"></textarea> 
                        <i>Please write "N/A" if no task to be added</i>
                      </div>
                    </div>
                    
                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('crop.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>


	     </div>
    </section>
		
	@endsection

	@section('extra-js')
		<script>
			 
			$(document).ready(function(){
			    $('.box-footer ul').addClass('pagination-sm no-margin pull-right');
			});
		</script>
	@endsection