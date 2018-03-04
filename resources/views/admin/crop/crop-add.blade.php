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
                  <h3 class="box-title">Add Crop</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('crop.store') }}" method="post">
                   
                   {{ csrf_field() }}

                  <div class="box-body">
                    <div class="form-group">
                      <label for="cropName" class="col-sm-4 control-label">Crops Name:</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cropName" name="cropName" placeholder="Crop Name"  value="{{ old('cropName') }}">
                      </div>
                    </div>
                    
					          <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Crop Group Name</label>

                      <div class="col-sm-8">
                          <select name="CropGroupName" class="form-control">
    		                    <option value="Rice">Rice</option>
              							<option value="Pulses">Pulses</option>
              							<option value="Oilseeds">Oilseeds</option>
              							<option value="Fibres">Fibres</option>
              							<option value="Starches">Starches</option>
              							<option value="Spices">Spices</option>
		                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Time Period:</label>

                      <div class="col-sm-8">
                         <div class="row">
                          <div class="col-sm-5">
                           <select name="TimePeriodStart" class="form-control">
                								<option>Jan</option>
                								<option>Feb</option>
                								<option>Mar</option>
                								<option>Apr</option>
                								<option>May</option>
                								<option>Jun</option>
                								<option>Jal</option>
                								<option>Aug</option>
                								<option>Sep</option>
                								<option>Nov</option>
                								<option>Dec</option>
                						</select>
                          </div>
                							<span class="col-sm-1">-</span>
                            <div class="col-sm-6">
                							  <select name="TimePeriodEnd" class="form-control">
                								<option>Jan</option>
                								<option>Feb</option>
                								<option>Mar</option>
                								<option>Apr</option>
                								<option>May</option>
                								<option>Jun</option>
                								<option>Jal</option>
                								<option>Aug</option>
                								<option>Sep</option>
                								<option>Nov</option>
                								<option>Dec</option>
                						</select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TotalWeeks" class="col-sm-4 control-label">Total Weeks Needed:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="TotalWeeks" name="TotalWeeks" value="{{ old('TotalWeeks') }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TotalCost" class="col-sm-4 control-label">Total Cost:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="TotalCost" name="TotalCost"  value="{{ old('TotalCost') }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="EstimatedProduction" class="col-sm-3 col-sm-offset-1 control-label">Estimated Production:</label>

                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="EstimatedProduction" name="EstimatedProduction">
                      </div>
                      <div class="col-sm-2">
                        <select name="unit" class="form-control">
                          <option>KG</option>
                          <option>Ton</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Land Type:</label>

                      <div class="col-sm-8">
                          <select name="LandType" class="form-control">
                            <option value="High ground">High ground</option>
                            <option value="Low ground">Low ground</option>
                            <option value="Beside river">Beside river</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="waterSource" class="col-sm-4 control-label">Water Source:</label>

                      <div class="col-sm-8">
                          <select name="WaterSource" class="form-control">
                            <option value="River">River</option>
                            <option value="Pond">Pond</option>
                            <option value="Well">Well</option>
                          </select>
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