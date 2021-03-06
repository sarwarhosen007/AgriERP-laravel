@extends('layouts.master')
	@section('title','Add Crop')
	
	@section('content')
	
		<section class="content">
      <div class="row">
        <div class="col-md-8">

              @include('layouts.messages.error-message')
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Add Fertilizer</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('fertilizer.store') }}" method="post">
                   
                   {{ csrf_field() }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="fertilizerName" class="col-sm-4 control-label">Fertilizer Name:</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="fertilizerName" name="Name" placeholder="Fertilizer Name"  value="{{ old('Name') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="PricePerUnit" class="col-sm-4 control-label"> Price Unit:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="PricePerUnit" name="PricePerUnit" value="{{ old('PricePerUnit') }}">
                      </div>
                    </div>

                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('fertilizer.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>
      </div>
    </section>

	@endsection