@extends('layouts.app.master')

@section('title', 'Business Settings Management')

@section('css')
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Business Settings Management</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Business Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Business Settings Content</h5>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.business.settings.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Logo Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Logo Settings</h6>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Light Logo Image</label>
                                        @if($businessSetting && $businessSetting->light_logo_image)
                                            <div class="mb-2">
                                                <img src="{{ asset($businessSetting->light_logo_image) }}" style="max-width: 200px; height: auto; border-radius: 5px;" alt="Current Light Logo">
                                                <p class="text-muted small">Current light logo</p>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="light_logo_image" accept="image/*">
                                        <small class="text-muted">Leave empty to keep current light logo</small>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Dark Logo Image</label>
                                        @if($businessSetting && $businessSetting->dark_logo_image)
                                            <div class="mb-2">
                                                <img src="{{ asset($businessSetting->dark_logo_image) }}" style="max-width: 200px; height: auto; border-radius: 5px;" alt="Current Dark Logo">
                                                <p class="text-muted small">Current dark logo</p>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="dark_logo_image" accept="image/*">
                                        <small class="text-muted">Leave empty to keep current dark logo</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Contact Information</h6>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email"
                                               value="{{ old('email', $businessSetting->email ?? '') }}"
                                               placeholder="Enter Email Address">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone"
                                               value="{{ old('phone', $businessSetting->phone ?? '') }}"
                                               placeholder="Enter Phone Number">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="3"
                                                  placeholder="Enter Business Address">{{ old('address', $businessSetting->address ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Social Media Links</h6>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Facebook Link</label>
                                        <input type="text" class="form-control" name="facebook_link"
                                               value="{{ old('facebook_link', $businessSetting->facebook_link ?? '') }}"
                                               placeholder="Enter Facebook URL">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">YouTube Link</label>
                                        <input type="text" class="form-control" name="youtube_link"
                                               value="{{ old('youtube_link', $businessSetting->youtube_link ?? '') }}"
                                               placeholder="Enter YouTube URL">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">TikTok Link</label>
                                        <input type="text" class="form-control" name="tiktok_link"
                                               value="{{ old('tiktok_link', $businessSetting->tiktok_link ?? '') }}"
                                               placeholder="Enter TikTok URL">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Instagram Link</label>
                                        <input type="text" class="form-control" name="instagram_link"
                                               value="{{ old('instagram_link', $businessSetting->instagram_link ?? '') }}"
                                               placeholder="Enter Instagram URL">
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Section -->
                            <div class="row mb-4 d-none">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Footer Settings</h6>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Footer Copyright Text</label>
                                        <textarea class="form-control" name="footer_copyright_text" rows="3"
                                                  placeholder="Enter Footer Copyright Text">{{ old('footer_copyright_text', $businessSetting->footer_copyright_text ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Business Settings
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Any additional JavaScript for business settings management can be added here
  });
</script>
@endsection
