@extends('layouts.master')
	@section('title', 'All Region')

	@section('content')
		<section class="content">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">All Crop List</h3>
	            </div>
				<div class="col-md-6">
					 @include('layouts.messages.flash-success-message')
				</div>
	            
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tr>
	                  <th style="width: 10px">#</th>
	                  <th>Crop Name</th>
	                  <th>Group</th>
	                  <th>Time Period</th>
	                  <th>Total Cost</th>
	                  <th>Estimated Production</th>
	                  <th>Created At</th>
	                  <th>Action</th>
	                </tr>
					@if(count($allCrop) > 0)
						@foreach($allCrop->all() as $crop)
			                <tr>
			                  <td>{{ $loop->iteration }}</td>
			                  <td>{{ $crop->Name }}</td>
			                  <td>{{ $crop->CropGroupName }}</td>
			                  <td>{{ $crop->TimePeriod }}</td>
			                  <td>{{ $crop->TotalCost }}</td>
			                  <td>{{ $crop->EstimatedProduction }}</td>
			                  <td>{{ $crop->created_at->diffForHumans() }}</td>
			                  <td>
			                  	<a href="#" class="btn btn-primary btn-xs" role="button">Show All Weekly Tasks</a>
			                  	<a href="{{ route('crop.edit',$crop->CropId) }}" class="btn btn-info btn-xs" role="button">Edit</a>

			                  	<form id="delete-form-{{ $crop->CropId }}" action="{{ route('crop.destroy',$crop->CropId) }}" style="display: none;" method="post">
									 	{{ csrf_field() }}
									 	{{ method_field('DELETE') }}
								</form>

	                                <a href="#" class="btn btn-danger btn-xs" onclick="
	                              	if(confirm('Are You sure Want to Delete?')){
	                              		event.preventDefault();
	                              		document.getElementById('delete-form-{{ $crop->CropId }}').submit();
	                              	}else{
	                              		event.preventDefault();
	                              	}
	                              ">Delete</a>

			                  </td>
			                </tr>
		                @endforeach
					@else
						"There is no entry"
					@endif
	              </table>
	            </div>
	            <!-- /.box-body -->
	            <div class="box-footer clearfix">
	              <ul class="pagination pagination-sm no-margin pull-right">
	                <li><a href="#">&laquo;</a></li>
	                <li><a href="#">1</a></li>
	                <li><a href="#">2</a></li>
	                <li><a href="#">3</a></li>
	                <li><a href="#">&raquo;</a></li>
	              </ul>
	              <a href="{{ route('crop.create') }}" class="btn btn-info btn-xm">Add New Crop</a>
	            </div>

	          </div>

	          <!-- /.box -->
	        </div>
	     </div>
    </section>
		
	@endsection