@extends('layouts.admin.master')
@section('title', trans('admin.add_manufacturers') .' < '. get_site_title())

@section('content')
@include('pages-message.form-submit')

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
  @include('includes.csrf-token')
  
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Add New Download &nbsp;&nbsp;<a class="btn btn-default btn-sm" href="{{ route('admin.manufacturers_list_content') }}">Download List</a></h3>
      <div class="pull-right">
        <button class="btn btn-primary pull-right btn-sm" type="submit">{{ trans('admin.save') }}</button>
      </div>
    </div>
  </div>
  

<div class="box box-solid">
  <div class="box-body">
    <div class="form-group">
      <div class="row">  
        <label class="col-sm-3 control-label" for="inputManufacturersName">Download Title</label>
        <div class="col-sm-9">
          <input type="text" placeholder="Download Title" id="inputManufacturersName" name="inputManufacturersName" class="form-control" value="{{ old('inputManufacturersName') }}">
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">    
        <label class="col-sm-3 control-label" for="inputCountryName">{{ trans('admin.country_name') }}</label>
        <div class="col-sm-9">
          <input type="text" placeholder="{{ trans('admin.country_name') }}" id="inputCountryName" name="inputCountryName" class="form-control" value="{{ old('inputCountryName') }}">
        </div>
      </div>
    </div>
    <!--<div class="form-group">
      <div class="row">    
        <label class="col-sm-3 control-label" for="inputShortDescription">{{ trans('admin.short_description') }}</label>
        <div class="col-sm-9">
          <textarea id="inputShortDescription" name="inputShortDescription" class="dynamic-editor" placeholder="{{ trans('admin.short_description') }}"></textarea>
        </div>
      </div>
    </div>-->
    <!--<div class="form-group">
      <div class="row">    
        <label class="col-sm-3 control-label" for="inputShortDescription">PDF URL</label>
        <div class="col-sm-9">
          <input type="text" id="logo_img" name="logo_img" class="form-control" value="">
        </div>
      </div>
    </div>-->
    <div class="form-group">
      <div class="row">    
        <label class="col-sm-3 control-label" for="inputStatus">{{ trans('admin.status') }}</label>
        <div class="col-sm-9">
          <select class="form-control select2" name="inputStatus" style="width: 100%;">
            <option selected="selected" value="1">{{ trans('admin.enable') }}</option>
            <option value="0">{{ trans('admin.disable') }}</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">    
        <label class="col-sm-3 control-label" for="inputUploadLogo">Upload PDF</label>
        <div class="col-sm-9">
          <div class="uploadform dropzone no-margin dz-clickable upload-manufacturers-logo" id="inputUploadLogo" name="inputUploadLogo">
            <div class="dz-default dz-message">
              <span>{{ trans('admin.drop_your_cover_picture_here') }}</span>
            </div>
          </div>
          <br>
          <div class="manufacturers-img-content">
            <div class="manufacturers-sample-img"><img class="img-responsive" src="{{ default_upload_sample_img_src() }}" alt=""></div>
            <div class="manufacturers-img"><img class="img-responsive" src="" alt=""></div>
            <br>
            <div class="manufacturers-img-remove-btn">
              <button type="button" class="btn btn-default attachtopost remove-manufacturers-img">{{ trans('admin.remove_image') }}</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="logo_img" id="logo_img" value="">
</form>

@endsection