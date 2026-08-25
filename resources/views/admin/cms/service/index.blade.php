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
                  <h3>Service Page CMS Management</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Service Page</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Update Service Page Sections</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row g-3" method="POST" action="{{ route('admin.service-page.update') }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <!-- Banner Section -->
                      <div class="col-sm-12">
                        <h3>Banner Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="banner_heading">Banner Heading:</label>
                          <input class="form-control" id="banner_heading" name="banner_heading" type="text" value="{{ old('banner_heading', $servicePage->banner_heading ?? '') }}" placeholder="Banner Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="banner_description">Banner Description:</label>
                          <textarea class="form-control" id="banner_description" name="banner_description" rows="3" placeholder="Banner Description">{{ old('banner_description', $servicePage->banner_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="banner_button_link">Banner Button Link:</label>
                          <input class="form-control" id="banner_button_link" name="banner_button_link" type="text" value="{{ old('banner_button_link', $servicePage->banner_button_link ?? '') }}" placeholder="https://example.com">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="banner_image">Banner Image:</label>
                          <input class="form-control" id="banner_image" name="banner_image" type="file" accept="image/*">
                          @if (!empty($servicePage->banner_image))
                            <div class="mt-2"><img src="{{ asset($servicePage->banner_image) }}" alt="Current Banner Image" style="max-width: 200px;"></div>
                          @endif
                        </div>
                      </div>

                      <!-- Company Section -->
                      <div class="col-sm-12">
                        <h3>Company Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="company_heading">Company Heading:</label>
                          <input class="form-control" id="company_heading" name="company_heading" type="text" value="{{ old('company_heading', $servicePage->company_heading ?? '') }}" placeholder="Company Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="company_description">Company Description:</label>
                          <textarea class="form-control" id="company_description" name="company_description" rows="4" placeholder="Company Description">{{ old('company_description', $servicePage->company_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="company_video">Company Video File:</label>
                          <input class="form-control" id="company_video" name="company_video" type="file" accept="video/*">
                          @if (!empty($servicePage->company_video))
                            <div class="mt-2">
                              <small class="text-muted">Current video:</small><br>
                              <video controls style="max-width: 300px; max-height: 200px;">
                                <source src="{{ asset($servicePage->company_video) }}" type="video/mp4">
                                Your browser does not support the video element.
                              </video>
                            </div>
                          @endif
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="company_subheading">Company Subheading:</label>
                          <input class="form-control" id="company_subheading" name="company_subheading" type="text" value="{{ old('company_subheading', $servicePage->company_subheading ?? '') }}" placeholder="Company Subheading">
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="company_button_title">Company Button Title:</label>
                              <input class="form-control" id="company_button_title" name="company_button_title" type="text" value="{{ old('company_button_title', $servicePage->company_button_title ?? '') }}" placeholder="Button Title">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="company_button_link">Company Button Link:</label>
                              <input class="form-control" id="company_button_link" name="company_button_link" type="text" value="{{ old('company_button_link', $servicePage->company_button_link ?? '') }}" placeholder="https://example.com">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Blog Section -->
                      <div class="col-sm-12">
                        <h3>Service Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="blog_tab_title">Service Tab Title:</label>
                          <input class="form-control" id="blog_tab_title" name="blog_tab_title" type="text" value="{{ old('blog_tab_title', $servicePage->blog_tab_title ?? '') }}" placeholder="Blog Tab Title">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="blog_heading">Service Heading:</label>
                          <input class="form-control" id="blog_heading" name="blog_heading" type="text" value="{{ old('blog_heading', $servicePage->blog_heading ?? '') }}" placeholder="Blog Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="blog_description">Service Description:</label>
                          <textarea class="form-control" id="blog_description" name="blog_description" rows="4" placeholder="Blog Description">{{ old('blog_description', $servicePage->blog_description ?? '') }}</textarea>
                        </div>
                      </div>

                      <!-- Service Main Section -->
                      <div class="col-sm-12">
                        <h3>Service Main Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="service_main_image">Service Main Image:</label>
                          <input class="form-control" id="service_main_image" name="service_main_image" type="file" accept="image/*">
                          @if (!empty($servicePage->service_main_image))
                            <div class="mt-2"><img src="{{ asset($servicePage->service_main_image) }}" alt="Current Service Main Image" style="max-width: 200px;"></div>
                          @endif
                        </div>
                      </div>

                      <!-- Choose Section -->
                      <div class="col-sm-12">
                        <h3>Choose Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="choose_heading">Choose Heading:</label>
                          <input class="form-control" id="choose_heading" name="choose_heading" type="text" value="{{ old('choose_heading', $servicePage->choose_heading ?? '') }}" placeholder="Choose Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="choose_image">Choose Image:</label>
                          <input class="form-control" id="choose_image" name="choose_image" type="file" accept="image/*">
                          @if (!empty($servicePage->choose_image))
                            <div class="mt-2"><img src="{{ asset($servicePage->choose_image) }}" alt="Current Choose Image" style="max-width: 200px;"></div>
                          @endif
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_tab_title_1">Choose Tab Title 1:</label>
                              <input class="form-control" id="choose_tab_title_1" name="choose_tab_title_1" type="text" value="{{ old('choose_tab_title_1', $servicePage->choose_tab_title_1 ?? '') }}" placeholder="Tab Title 1">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_tab_value_1">Choose Tab Value 1:</label>
                              <input class="form-control" id="choose_tab_value_1" name="choose_tab_value_1" type="text" value="{{ old('choose_tab_value_1', $servicePage->choose_tab_value_1 ?? '') }}" placeholder="Tab Value 1">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_tab_title_2">Choose Tab Title 2:</label>
                              <input class="form-control" id="choose_tab_title_2" name="choose_tab_title_2" type="text" value="{{ old('choose_tab_title_2', $servicePage->choose_tab_title_2 ?? '') }}" placeholder="Tab Title 2">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_tab_value_2">Choose Tab Value 2:</label>
                              <input class="form-control" id="choose_tab_value_2" name="choose_tab_value_2" type="text" value="{{ old('choose_tab_value_2', $servicePage->choose_tab_value_2 ?? '') }}" placeholder="Tab Value 2">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_button_title">Choose Button Title:</label>
                              <input class="form-control" id="choose_button_title" name="choose_button_title" type="text" value="{{ old('choose_button_title', $servicePage->choose_button_title ?? '') }}" placeholder="Button Title">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="choose_button_link">Choose Button Link:</label>
                              <input class="form-control" id="choose_button_link" name="choose_button_link" type="text" value="{{ old('choose_button_link', $servicePage->choose_button_link ?? '') }}" placeholder="https://example.com">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="common-flex justify-content-end mt-3">
                        <button class="btn btn-primary" type="submit">Update Service Page Sections</button>
                        <input class="btn btn-secondary" type="reset" value="Discard">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha512-OF6VwfoBrM/wE3gt0I/lTh1ElROdq3etwAquhEm2YI45Um4ird+0ZFX1IwuBDBRufdXBuYoBb0mqXrmUA2VnOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.ckeditor').forEach(function (el) {
      CKEDITOR.replace(el, {
        toolbar: [
          { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
          { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
          { name: 'styles', items: ['Format', 'FontSize'] },
          { name: 'links', items: ['Link', 'Unlink'] }
        ],
        removePlugins: 'elementspath',
        resize_enabled: false
      });
    });
  });
</script>
@endsection
