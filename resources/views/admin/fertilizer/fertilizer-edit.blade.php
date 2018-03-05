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
                  <h3 class="box-title">Edit Fertilizer</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('fertilizer.update',$fertilizer->FertilizerId) }}" method="post">
                   
                   {{ csrf_field() }}
                  
                  <input name="_method" type="hidden" value="PATCH">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="fertilizerName" class="col-sm-4 control-label">Fertilizer Name:</label>

                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="fertilizerName" name="Name" placeholder="Fertilizer Name"  value="{{ $fertilizer->Name }}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="PricePerUnit" class="col-sm-4 control-label"> Price Unit:</label>

                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="PricePerUnit" name="PricePerUnit" value="{{ $fertilizer->PricePerUnit }}">
                      </div>
                    </div>

                    <!-- /.box-body -->
                <div class="box-footer">
                  <a href="{{ route('fertilizer.index') }}" class="btn btn-default">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Update</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

        </div>
      </div>
    </section>

  @endsection