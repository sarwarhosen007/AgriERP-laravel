@extends('layouts.master')
	@section('title', 'All Region')

	@section('content')
		<section class="content">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">All Region List</h3>
	            </div>
				<div class="col-md-6">
					 @include('layouts.messages.flash-success-message')
				</div>
	            
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tr>
	                  <th style="width: 10px">#</th>
	                  <th>RegionNumber</th>
	                  <th>Area</th>
	                  <th>Created At</th>
	                  <th>Action</th>
	                </tr>
					@if(count($allRegion) > 0)
						@foreach($allRegion->all() as $region)
			                <tr>
			                  <td>{{ $loop->iteration }}</td>
			                  <td>{{ $region->RegionNumber }}</td>
			                  <td>{{ $region->Area }}</td>
			                  <td>{{ $region->created_at->diffForHumans() }}</td>
			                  <td>
			                  	<a href="{{ route('region.edit',$region->RegionId) }}" class="btn btn-info btn-xs" role="button">Edit</a>

			                  	<form id="delete-form-{{ $region->RegionId }}" action="{{ route('region.destroy',$region->RegionId) }}" style="display: none;" method="post">
									 	{{ csrf_field() }}
									 	{{ method_field('DELETE') }}
								</form>

	                                <a href="#" class="btn btn-danger btn-xs" onclick="
	                              	if(confirm('Are You sure Want to Delete?')){
	                              		event.preventDefault();
	                              		document.getElementById('delete-form-{{ $region->RegionId }}').submit();
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
	              <a href="{{ route('region.create') }}" class="btn btn-info btn-xm">Add New Region</a>
	            </div>

	          </div>

	          <!-- /.box -->
	        </div>
	     </div>
    </section>
		
	@endsection