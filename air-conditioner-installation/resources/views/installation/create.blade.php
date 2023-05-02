@extends('layouts.main')

@section('pageTitle', __('Create installation'))

@section('content')
<!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ __('Create installation') }}</h1>
</div>
<!-- / Page Heading -->

<div class="row">
  <div class="col-xl-7 col-lg-6">
    <div class="card shadow mb-4">
      <form>
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Installation work form') }}</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="form-group">
              <label for="project_id">{{ __('Project') }} <span class="text-danger">*</span></label>
              <select name="project_id" id="project_id" class="form-control">
                <option value="" selected>{{ __('Please select') }}</option>
                @foreach ($projects as $project)
                  <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="airConditionerType">{{ __('Air conditioner type') }} <span class="text-danger">*</span></label>
              <select name="airConditionerType" id="airConditionerType" class="form-control">
                <option value="split" selected>Split type</option>
                <option value="vrv">VRV</option>
              </select>
            </div>

            <div class="span font-bold">พื้นที่ติดตั้ง</div>

            <div class="form-group">
              <label for="building">{{ __('Building') }}</label>
              <input type="text" id="building" name="building" class="form-control">
            </div>

            <div class="form-group">
              <label for="floor">{{ __('Floor') }}</label>
              <input type="number" id="floor" name="floor" class="form-control">
            </div>

            <div class="form-group">
              <label for="room">{{ __('Room') }}</label>
              <input type="text" id="room" name="room" class="form-control">
            </div>

            <div class="form-group">
              <label for="position">{{ __('Position') }}</label>
              <input type="text" id="position" name="position" class="form-control">
            </div>            
          
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary float-right">{{ __('Save') }}</button>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>
  </div>
</div><!-- / row -->


@endsection