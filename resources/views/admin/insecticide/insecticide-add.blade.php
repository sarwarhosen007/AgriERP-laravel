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
                  <h3 class="box-title">Add Insecticde</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('insecticide.store') }}" method="post">
                   
                   {{ csrf_field() }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="insecticdieName" class="col-sm-4 control-label">Insecticdie Name:</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="insecticdieName" name="Name" placeholder="Insecticdie Name"  value="{{ old('Name') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="PricePerUnit" class="col-sm-4 control-label"> Price Unit:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="PricePerUnit" name="PricePerUnit" value="{{ old('PricePerUnit') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="InsectName" class="col-sm-4 control-label"> Insect Name:</label>

                      <div class="col-sm-8">
                        <input type="text" placeholder="Insect Name" class="form-control" id="InsectName" name="InsectName" value="{{ old('InsectName') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="DiseaseName" class="col-sm-4 control-label"> Disease Name:</label>

                      <div class="col-sm-8">
                        <input type="text" placeholder="Disease Name" class="form-control" id="DiseaseName" name="DiseaseName" value="{{ old('DiseaseName') }}">
                      </div>
                    </div>

                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('insecticide.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Add</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>
      </div>
    </section>

	@endsection