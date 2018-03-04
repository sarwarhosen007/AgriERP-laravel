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
                  <h3 class="box-title">Edit Crop</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('crop.update',$crop->CropId) }}" method="post">
                   
                   {{ csrf_field() }}
                   <input name="_method" type="hidden" value="PATCH">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="cropName" class="col-sm-4 control-label">Crops Name:</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="cropName" name="cropName" placeholder="Crop Name"  value="{{ $crop->Name }}">
                      </div>
                    </div>
                    
					          <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Crop Group Name</label>

                      <div class="col-sm-8">
                          <select name="CropGroupName" class="form-control">
    		                    <option value="Rice" {{ $crop->CropGroupName == 'Rice' ? 'selected' : '' }}>Rice</option>
              							<option value="Pulses" {{ $crop->CropGroupName == 'Pulses' ? 'selected' : '' }}>Pulses</option>
              							<option value="Oilseeds" {{ $crop->CropGroupName == 'Oilseeds' ? 'selected' : '' }}>Oilseeds</option>
              							<option value="Fibres" {{ $crop->CropGroupName == 'Fibres' ? 'selected' : '' }}>Fibres</option>
              							<option value="Starches" {{ $crop->CropGroupName == 'Starches' ? 'selected' : '' }}>Starches</option>
              							<option value="Spices" {{ $crop->CropGroupName == 'Spices' ? 'selected' : '' }}>Spices</option>
		                      </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Time Period:</label>

                      <div class="col-sm-8">
                         <div class="row">
                          <div class="col-sm-5">
                           <select name="TimePeriodStart" class="form-control">
                               <?php 
                                  $months = array("Jan", "Feb", "Mar", "Apr","May","Jun","July","Aug","Sep","Oct","Nov","Dec");
                                ?>
                                @foreach($months as $month)

                								  <option {{ $timePeriod[0]==$month ? 'selected' : '' }}>{{ $month }}</option>
                								
                                @endforeach
                						</select>
                          </div>
                							<span class="col-sm-1">-</span>
                            <div class="col-sm-6">
                							  <select name="TimePeriodEnd" class="form-control">
                                @foreach($months as $month)

                                  <option  {{ $timePeriod[1]==$month ? 'selected' : '' }}>{{ $month }}</option>
                                
                                @endforeach
                						</select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TotalWeeks" class="col-sm-4 control-label">Total Weeks Needed:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="TotalWeeks" name="TotalWeeks" value="{{ $crop->TotalWeeks }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="TotalCost" class="col-sm-4 control-label">Total Cost:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="TotalCost" name="TotalCost"  value="{{ $crop->TotalCost }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="EstimatedProduction" class="col-sm-3 col-sm-offset-1 control-label">Estimated Production:</label>

                      <div class="col-sm-6">
                        <input type="number" class="form-control" id="EstimatedProduction" name="EstimatedProduction" value="{{ $EstimatedProduction[0] }}">
                      </div>
                      <div class="col-sm-2">
                        <select name="unit" class="form-control">
                          <option {{ $EstimatedProduction[1] == 'KG' ? 'selected' : '' }}>KG</option>
                          <option {{ $EstimatedProduction[1] == 'Ton' ? 'selected' : '' }}>Ton</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Land Type:</label>

                      <div class="col-sm-8">
                          <select name="LandType" class="form-control">
                            
                            <?php 
                              $landTypes = array("High ground", "Low ground", "Beside river");
                            ?>
                            @foreach($landTypes as $type)
                              <option value="{{ $type }}" {{ $type==$crop->LandType ? 'selected' : '' }} >{{ $type }}</option>
                            @endforeach

                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="waterSource" class="col-sm-4 control-label">Water Source:</label>

                      <div class="col-sm-8">
                          <select name="WaterSource" class="form-control">
                          <?php 
                              $WaterSources = array("River", "Pond", "Well");
                            ?>
                             @foreach($WaterSources as $source)
                              <option value="{{ $source }}" {{ $source==$crop->WaterSource ? 'selected' : '' }} >{{ $source }}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('crop.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>
      </div>
    </section>

	@endsection