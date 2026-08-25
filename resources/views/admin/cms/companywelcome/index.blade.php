@extends('layouts.app.master')

@section('title', 'Company Welcome Management')

@section('css')
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Company Welcome Section Management</h3>
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
                        <li class="breadcrumb-item active">Company Welcome Section</li>
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
                        <h5>Company Welcome Section Content</h5>
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

                        <form method="POST" action="{{ route('admin.company.welcome.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Main Company Welcome Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Main Company Welcome Section</h6>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading</label>
                                        <input type="text" class="form-control" name="tab_heading" 
                                               value="{{ old('tab_heading', $ourCompany->tab_heading ?? '') }}" 
                                               placeholder="Enter Tab Heading">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" 
                                               value="{{ old('heading', $ourCompany->heading ?? '') }}" 
                                               placeholder="Enter Heading">
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" name="description" rows="4" 
                                                  placeholder="Enter Description">{{ old('description', $ourCompany->description ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" 
                                               value="{{ old('button_text', $ourCompany->button_text ?? '') }}" 
                                               placeholder="Enter Button Text">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" 
                                               value="{{ old('button_link', $ourCompany->button_link ?? '') }}" 
                                               placeholder="Enter Button Link">
                                    </div>
                                </div>

                           
                            </div>

                            <!-- Tab Information Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Tab Information</h6>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 1</label>
                                        <input type="text" class="form-control" name="tab_heading_1" 
                                               value="{{ old('tab_heading_1', $ourCompany->tab_heading_1 ?? '') }}" 
                                               placeholder="Enter Tab Heading 1">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 1</label>
                                        <input type="text" class="form-control" name="tab_value_1" 
                                               value="{{ old('tab_value_1', $ourCompany->tab_value_1 ?? '') }}" 
                                               placeholder="Enter Tab Value 1">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 2</label>
                                        <input type="text" class="form-control" name="tab_heading_2" 
                                               value="{{ old('tab_heading_2', $ourCompany->tab_heading_2 ?? '') }}" 
                                               placeholder="Enter Tab Heading 2">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 2</label>
                                        <input type="text" class="form-control" name="tab_value_2" 
                                               value="{{ old('tab_value_2', $ourCompany->tab_value_2 ?? '') }}" 
                                               placeholder="Enter Tab Value 2">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 3</label>
                                        <input type="text" class="form-control" name="tab_heading_3" 
                                               value="{{ old('tab_heading_3', $ourCompany->tab_heading_3 ?? '') }}" 
                                               placeholder="Enter Tab Heading 3">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 3</label>
                                        <input type="text" class="form-control" name="tab_value_3" 
                                               value="{{ old('tab_value_3', $ourCompany->tab_value_3 ?? '') }}" 
                                               placeholder="Enter Tab Value 3">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Heading 4</label>
                                        <input type="text" class="form-control" name="tab_heading_4" 
                                               value="{{ old('tab_heading_4', $ourCompany->tab_heading_4 ?? '') }}" 
                                               placeholder="Enter Tab Heading 4">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Value 4</label>
                                        <input type="text" class="form-control" name="tab_value_4" 
                                               value="{{ old('tab_value_4', $ourCompany->tab_value_4 ?? '') }}" 
                                               placeholder="Enter Tab Value 4">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Company Welcome Section
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