@extends('layouts.app.master')

@section('title', 'Contact CMS Management')

@section('css')
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Contact CMS Section Management</h3>
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
                        <li class="breadcrumb-item">CMS</li>
                        <li class="breadcrumb-item active">Contact CMS Section</li>
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
                        <h5>Contact CMS Section Content</h5>
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

                        <form method="POST" action="{{ route('admin.contact.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Main Contact CMS Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Main Contact CMS Section</h6>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading</label>
                                        <input type="text" class="form-control" name="tab_heading" 
                                               value="{{ old('tab_heading', $contact->tab_heading ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" 
                                               value="{{ old('heading', $contact->heading ?? '') }}" 
                                               placeholder="Enter Heading">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" 
                                                  placeholder="Enter Description">{{ old('description', $contact->description ?? '') }}</textarea>
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
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="number" 
                                               value="{{ old('number', $contact->number ?? '') }}" 
                                               placeholder="Enter Phone Number">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" 
                                               value="{{ old('email', $contact->email ?? '') }}" 
                                               placeholder="Enter Email Address">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="3" 
                                                  placeholder="Enter Address">{{ old('address', $contact->address ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Location Link</label>
                                        <input type="text" class="form-control" name="location_link" 
                                               value="{{ old('location_link', $contact->location_link ?? '') }}" 
                                               placeholder="Enter Location Link (Google Maps, etc.)">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Contact CMS Section
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
    // Any additional JavaScript for contact management can be added here
  });
</script>
@endsection 