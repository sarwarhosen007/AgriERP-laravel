@extends('layouts.master')
	@section('title', 'All weeklytask')

	@section('content')
		<section class="content">
	      <div class="row">
	        <!-- /.New Weekly Task -->
	        <div class="col-md-8">

              @include('layouts.messages.error-message')
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit task</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('cropweeklytask.update',$cropweeklytask->WeekId) }}" method="post">
                   
                   {{ csrf_field() }}
					 <input name="_method" type="hidden" value="PATCH">
                  <div class="box-body">
                   	<input type="hidden" name="CropId" value="{{ $cropweeklytask->CropId }}">
                    <div class="form-group">
                      <label for="TotalWeeks" class="col-sm-4 control-label">Week Number:</label>

                      <div class="col-sm-8">
                         <select name="WeekNumber" class="form-control">
							 @for ($i = 1; $i <= 12; $i++)

							    <option value="{{ $i }}" {{ $cropweeklytask->WeekNumber== $i ?'selected' : '' }}>week{{ $i }}</option>	 
							@endfor
	                    
	                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                       <label for="TotalWeeks" class="col-sm-4 control-label">Select Fertilizer  Name:</label>

                      <div class="col-sm-8">
                         <select name="CropFertSysId" class="form-control">
							  @foreach($ferlizers as $ferlizer)

							    <option value="{{ $ferlizer->FertilizerId }}" {{ $cropweeklytask->CropFertSysId== $ferlizer->FertilizerId ?'selected' : '' }}>{{ $ferlizer->Name }}</option>	 
							@endforeach
	                    
	                    </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="FertilizerTask" class="col-sm-3 col-sm-offset-1 control-label">Task For Fertilizer:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" name="FertilizerTask">{{ $cropweeklytask->FertilizerTask }}"
                        </textarea> 
                        <i>Please write "N/A" if no task to be added</i> 
                      </div>
                    </div>
                    <div class="form-group">
                       <label for="TotalWeeks" class="col-sm-4 control-label">Select Insecticide Name:</label>

                      <div class="col-sm-8">
                         <select name="CropInsectSysId" class="form-control">
							  @foreach($insecticides as $insecticide)

							    <option value="{{ $insecticide->InsecticideId }}" {{ $cropweeklytask->CropInsectSysId== $insecticide->InsecticideId ?'selected' : '' }} >{{ $insecticide->Name }}</option>	 
							@endforeach
	                    
	                    </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="InsecticideTask" class="col-sm-3 col-sm-offset-1 control-label">Task For Insecticide:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" name="InsecticideTask">{{ $cropweeklytask->InsecticideTask }}</textarea>  
                        <i>Please write "N/A" if no task to be added</i>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="OtherTask" class="col-sm-3 col-sm-offset-1 control-label">Other Task:</label>

                      <div class="col-sm-8">
                        <textarea  class="form-control" name="OtherTask">{{ $cropweeklytask->OtherTask }}
                        </textarea> 
                        <i>Please write "N/A" if no task to be added</i>
                      </div>
                    </div>
                    
                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('cropweeklytask.show',$cropweeklytask->CropId) }}" class="btn btn-default">Cancel</a>
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