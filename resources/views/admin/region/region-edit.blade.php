    @extends('layouts.master')

    @section('title','Region Add')

    @section('content')
   <section class="content">
      <div class="row">
        <div class="col-md-6">

              @include('layouts.messages.error-message')
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('region.update',$region->RegionId) }}" method="post">
                   
                   {{ csrf_field() }}
                   <input name="_method" type="hidden" value="PATCH">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="regionNumber" class="col-sm-4 control-label">Region Number:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="regionNumber" name="RegionNumber" value="{{ $region->RegionNumber }}" placeholder="Region Number">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="area" class="col-sm-4 control-label">Area</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="Area" id="area" value="{{ $region->Area }}" placeholder="Area">
                      </div>
                    </div>
                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('region.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>
      </div>
    </section>
  @endsection