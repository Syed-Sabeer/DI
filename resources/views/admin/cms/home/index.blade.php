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
                  <h3>Home Page CMS Management</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Home Page</li>
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
                    <h5>Update Home Page Sections</h5>
                  </div>
                  <div class="card-body add-post">
                    <form class="row g-3" method="POST" action="{{ route('admin.home.update') }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <!-- Features Section -->
                      <div class="col-sm-12">
                        <h3>Features Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="feature_heading">Feature Heading:</label>
                          <input class="form-control" id="feature_heading" name="feature_heading" type="text" value="{{ old('feature_heading', $homePage->feature_heading ?? '') }}" placeholder="Feature Section Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="feature_image">Feature Image:</label>
                          <input class="form-control" id="feature_image" name="feature_image" type="file" accept="image/*">
                          @if (!empty($homePage->feature_image))
                            <div class="mt-2"><img src="{{ asset($homePage->feature_image) }}" alt="Current Feature Image" style="max-width: 200px;"></div>
                          @endif
                        </div>

                        <!-- Feature 1 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_1">Feature 1 Icon Class:</label>
                              <input class="form-control" id="feature_icon_1" name="feature_icon_1" type="text" value="{{ old('feature_icon_1', $homePage->feature_icon_1 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_1">Feature 1 Title:</label>
                              <input class="form-control" id="feature_title_1" name="feature_title_1" type="text" value="{{ old('feature_title_1', $homePage->feature_title_1 ?? '') }}" placeholder="Feature 1 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_1">Feature 1 Detail:</label>
                              <input class="form-control" id="feature_detail_1" name="feature_detail_1" type="text" value="{{ old('feature_detail_1', $homePage->feature_detail_1 ?? '') }}" placeholder="Feature 1 Detail">
                            </div>
                          </div>
                        </div>

                        <!-- Feature 2 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_2">Feature 2 Icon Class:</label>
                              <input class="form-control" id="feature_icon_2" name="feature_icon_2" type="text" value="{{ old('feature_icon_2', $homePage->feature_icon_2 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_2">Feature 2 Title:</label>
                              <input class="form-control" id="feature_title_2" name="feature_title_2" type="text" value="{{ old('feature_title_2', $homePage->feature_title_2 ?? '') }}" placeholder="Feature 2 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_2">Feature 2 Detail:</label>
                              <input class="form-control" id="feature_detail_2" name="feature_detail_2" type="text" value="{{ old('feature_detail_2', $homePage->feature_detail_2 ?? '') }}" placeholder="Feature 2 Detail">
                            </div>
                          </div>
                        </div>

                        <!-- Feature 3 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_3">Feature 3 Icon Class:</label>
                              <input class="form-control" id="feature_icon_3" name="feature_icon_3" type="text" value="{{ old('feature_icon_3', $homePage->feature_icon_3 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_3">Feature 3 Title:</label>
                              <input class="form-control" id="feature_title_3" name="feature_title_3" type="text" value="{{ old('feature_title_3', $homePage->feature_title_3 ?? '') }}" placeholder="Feature 3 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_3">Feature 3 Detail:</label>
                              <input class="form-control" id="feature_detail_3" name="feature_detail_3" type="text" value="{{ old('feature_detail_3', $homePage->feature_detail_3 ?? '') }}" placeholder="Feature 3 Detail">
                            </div>
                          </div>
                        </div>

                        <!-- Feature 4 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_4">Feature 4 Icon Class:</label>
                              <input class="form-control" id="feature_icon_4" name="feature_icon_4" type="text" value="{{ old('feature_icon_4', $homePage->feature_icon_4 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_4">Feature 4 Title:</label>
                              <input class="form-control" id="feature_title_4" name="feature_title_4" type="text" value="{{ old('feature_title_4', $homePage->feature_title_4 ?? '') }}" placeholder="Feature 4 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_4">Feature 4 Detail:</label>
                              <input class="form-control" id="feature_detail_4" name="feature_detail_4" type="text" value="{{ old('feature_detail_4', $homePage->feature_detail_4 ?? '') }}" placeholder="Feature 4 Detail">
                            </div>
                          </div>
                        </div>

                        <!-- Feature 5 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_5">Feature 5 Icon Class:</label>
                              <input class="form-control" id="feature_icon_5" name="feature_icon_5" type="text" value="{{ old('feature_icon_5', $homePage->feature_icon_5 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_5">Feature 5 Title:</label>
                              <input class="form-control" id="feature_title_5" name="feature_title_5" type="text" value="{{ old('feature_title_5', $homePage->feature_title_5 ?? '') }}" placeholder="Feature 5 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_5">Feature 5 Detail:</label>
                              <input class="form-control" id="feature_detail_5" name="feature_detail_5" type="text" value="{{ old('feature_detail_5', $homePage->feature_detail_5 ?? '') }}" placeholder="Feature 5 Detail">
                            </div>
                          </div>
                        </div>

                        <!-- Feature 6 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_icon_6">Feature 6 Icon Class:</label>
                              <input class="form-control" id="feature_icon_6" name="feature_icon_6" type="text" value="{{ old('feature_icon_6', $homePage->feature_icon_6 ?? '') }}" placeholder="Enter icon class like: flaticon-taxi-2">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_title_6">Feature 6 Title:</label>
                              <input class="form-control" id="feature_title_6" name="feature_title_6" type="text" value="{{ old('feature_title_6', $homePage->feature_title_6 ?? '') }}" placeholder="Feature 6 Title">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="mb-3">
                              <label for="feature_detail_6">Feature 6 Detail:</label>
                              <input class="form-control" id="feature_detail_6" name="feature_detail_6" type="text" value="{{ old('feature_detail_6', $homePage->feature_detail_6 ?? '') }}" placeholder="Feature 6 Detail">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- App Links Section -->
                      <div class="col-sm-12">
                        <h3>App Links Section</h3>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="play_store_app_link">Play Store App Link:</label>
                              <input class="form-control" id="play_store_app_link" name="play_store_app_link" type="text" value="{{ old('play_store_app_link', $homePage->play_store_app_link ?? '') }}" placeholder="https://play.google.com/store/apps/...">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label for="app_store_app_link">App Store App Link:</label>
                              <input class="form-control" id="app_store_app_link" name="app_store_app_link" type="text" value="{{ old('app_store_app_link', $homePage->app_store_app_link ?? '') }}" placeholder="https://apps.apple.com/app/...">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Services Section -->
                      <div class="col-sm-12">
                        <h3>Services Section</h3>
                        
                        <div class="mb-3 mt-3">
                          <label for="service_heading">Service Heading:</label>
                          <input class="form-control" id="service_heading" name="service_heading" type="text" value="{{ old('service_heading', $homePage->service_heading ?? '') }}" placeholder="Service Section Heading">
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="service_description">Service Description:</label>
                          <textarea class="form-control" id="service_description" name="service_description" rows="4" placeholder="Service Section Description">{{ old('service_description', $homePage->service_description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3 mt-3">
                          <label for="service_image">Service Image:</label>
                          <input class="form-control" id="service_image" name="service_image" type="file" accept="image/*">
                          @if (!empty($homePage->service_image))
                            <div class="mt-2"><img src="{{ asset($homePage->service_image) }}" alt="Current Service Image" style="max-width: 200px;"></div>
                          @endif
                        </div>
                      </div>

                      <div class="common-flex justify-content-end mt-3">
                        <button class="btn btn-primary" type="submit">Update Home Page Sections</button>
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

