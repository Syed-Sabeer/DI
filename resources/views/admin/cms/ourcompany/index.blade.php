@extends('layouts.app.master')

    @section('title', 'Our Company Section Management')

@section('css')
@endsection

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Our Company Section Management</h3>
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
                        <li class="breadcrumb-item active">Our Company Section</li>
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
                        <h5>Our Company Section Content</h5>
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

                        <form method="POST" action="{{ route('admin.ourcompany.cms.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Main Our Company Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Main Our Company Section</h6>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Tab Title</label>
                                        <input type="text" class="form-control" name="tab_title" 
                                               value="{{ old('tab_title', $ourCompany->tab_title ?? '') }}" 
                                               placeholder="Enter Tab Title">
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

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Section Image</label>
                                        @if($ourCompany && $ourCompany->image)
                                            <div class="mb-2">
                                                <img src="{{ asset($ourCompany->image) }}" style="max-width: 200px; height: auto; border-radius: 5px;" alt="Current Image">
                                                <p class="text-muted small">Current image</p>
                                            </div>
                                        @endif
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        <small class="text-muted">Leave empty to keep current image</small>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Section -->
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="mb-3 text-primary">Card Information</h6>
                                </div>
                                
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Title 1</label>
                                        <input type="text" class="form-control" name="card_title_1" 
                                               value="{{ old('card_title_1', $ourCompany->card_title_1 ?? '') }}" 
                                               placeholder="Enter Card Title 1">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Value 1</label>
                                        <input type="text" class="form-control" name="card_value_1" 
                                               value="{{ old('card_value_1', $ourCompany->card_value_1 ?? '') }}" 
                                               placeholder="Enter Card Value 1">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Title 2</label>
                                        <input type="text" class="form-control" name="card_title_2" 
                                               value="{{ old('card_title_2', $ourCompany->card_title_2 ?? '') }}" 
                                               placeholder="Enter Card Title 2">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Value 2</label>
                                        <input type="text" class="form-control" name="card_value_2" 
                                               value="{{ old('card_value_2', $ourCompany->card_value_2 ?? '') }}" 
                                               placeholder="Enter Card Value 2">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Title 3</label>
                                        <input type="text" class="form-control" name="card_title_3" 
                                               value="{{ old('card_title_3', $ourCompany->card_title_3 ?? '') }}" 
                                               placeholder="Enter Card Title 3">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label class="form-label">Card Value 3</label>
                                        <input type="text" class="form-control" name="card_value_3" 
                                               value="{{ old('card_value_3', $ourCompany->card_value_3 ?? '') }}" 
                                               placeholder="Enter Card Value 3">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save me-2"></i>Update Our Company Section
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
@endsection