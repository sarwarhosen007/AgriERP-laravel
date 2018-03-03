@extends('layouts.master')
	@section('title', 'All Farmer')

	@section('content')
		<section class="content">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="box">
	            <div class="box-header with-border">
	              <h3 class="box-title">Bordered Table</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table class="table table-bordered">
	                <tr>
	                  <th style="width: 10px">#</th>
	                  <th>NAME</th>
	                  <th>PHONE</th>
	                  <th>DISTRICT</th>
	                  <th>Action</th>
	                </tr>
					@if(count($allFarmer) > 0)
						@foreach($allFarmer->all() as $farmer)
			                <tr>
			                  <td>{{ $loop->iteration }}</td>
			                  <td>{{ $farmer->Name }}</td>
			                  <td>{{ $farmer->email }}</td>
			                  <td>Netrokona</td>
			                  <td>
			                  	<a href="#" class="btn btn-danger btn-xs" role="button">Delete</a>
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
	            </div>
	          </div>
	          <!-- /.box -->
	        </div>
	     </div>
    </section>
		
	@endsection