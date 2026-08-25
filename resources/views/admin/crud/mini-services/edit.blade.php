@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
@endsection

@section('content')




<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Edit Mini Service</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Edit Mini Service</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Mini Service Form</h5>
                  </div>
                  <div class="card-body">
                    <div class="row g-xl-5 g-3">
                      <div class="col-xxl-3 col-xl-4 box-col-4e sidebar-left-wrapper">
                        <ul class="sidebar-left-icons nav nav-pills" id="add-product-pills-tab" role="tablist">
                          <li class="nav-item"> <a class="nav-link active" id="detail-product-tab" data-bs-toggle="pill" href="#detail-product" role="tab" aria-controls="detail-product" aria-selected="false">
                              <div class="nav-rounded">
                                <div class="product-icons">
                                  <svg class="stroke-icon">
                                    <use href="{{asset('AdminAssets/svg/icon-sprite.svg#product-detail')}}"></use>
                                  </svg>
                                </div>
                              </div>
                              <div class="product-tab-content">
                                <h6>Edit Mini Service Details</h6>
                                <p>Edit Mini Service name & details</p>
                              </div></a></li>




                        </ul>
                      </div>
                      <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                        <div class="tab-content custom-input" id="add-product-pills-tabContent">
                          <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                            <div class="sidebar-body">
@php
  $isEdit = isset($miniService);
@endphp

<form method="POST" action="{{ $isEdit ? route('admin.mini-service.update', $miniService->id) : route('admin.mini-service.store') }}" enctype="multipart/form-data">
  @csrf
  @if ($isEdit)
    @method('PUT')
  @endif

  <div class="col-md-12">
    <label class="form-label" for="validationProductTitle">Mini Service Title <span class="text-danger">*</span></label>
    <input
      class="form-control @error('title') is-invalid @enderror"
      name="title"
      id="validationProductTitle"
      type="text"
      placeholder="Enter mini service title"
      value="{{ old('title', $miniService->title ?? '') }}"
      required
    >
    @error('title')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="col-md-12">
    <label class="form-label" for="validationProductIcon">Mini Service Icon Class <span class="text-danger">*</span></label>
    <input
      class="form-control @error('icon') is-invalid @enderror"
      name="icon"
      id="validationProductIcon"
      type="text"
      placeholder="Enter icon class like: flaticon-taxi-2"
      value="{{ old('icon', $miniService->icon ?? '') }}"
      required
    >
    @error('icon')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if($isEdit && $miniService->icon)
      <div class="mt-2">
        <small class="text-muted">Current Icon Class:</small><br>
        <code class="text-primary">{{ $miniService->icon }}</code>
      </div>
    @endif
  </div>

  <div class="col-md-12">
    <label class="form-label" for="validationProductImage">Mini Service Image</label>
    <input
      class="form-control @error('image') is-invalid @enderror"
      name="image"
      id="validationProductImage"
      type="file"
      accept="image/*"
    >
    @error('image')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="form-text text-muted">Upload an image (JPEG, PNG, JPG, GIF, SVG) - Max size: 2MB</small>
    
    @if($isEdit && $miniService->image)
      <div class="mt-2">
        <small class="text-muted">Current Image:</small><br>
        <img src="{{ asset($miniService->image) }}" alt="Current Mini Service Image" style="max-width: 150px; max-height: 150px; object-fit: cover; border-radius: 5px;">
      </div>
    @endif
  </div>



  <div class="col-md-6">
    <button class="btn btn-primary f-w-500" type="submit">
      {{ $isEdit ? 'Update' : 'Submit' }}
    </button>
  </div>
</form>

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>



                @endsection

@section('script')

@endsection
