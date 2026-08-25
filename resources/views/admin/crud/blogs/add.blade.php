@extends('layouts.app.master')

@section('title', 'Dashboard')

@section('css')
<style>
  .blog-tags-input { min-height: 42px; height: auto; align-items: center; }
  .blog-tags-input > input { min-width: 140px; outline: 0; }
  .blog-tags-input .badge { display: inline-flex; align-items: center; padding: .45rem .55rem; }
  .blog-category-select + .select2-container { flex: 1 1 auto; width: 1% !important; }
  .select2-container--open { z-index: 1060; }
  .blog-category-select + .select2-container { flex: 0 0 calc(100% - 52px); width: calc(100% - 52px) !important; }
  .blog-category-select + .select2-container .select2-selection--single { height: 46px; border: 1px solid #dee2e6; border-radius: .375rem 0 0 .375rem; display: flex; align-items: center; }
  .blog-category-select + .select2-container .select2-selection__rendered { line-height: 44px; padding-left: 14px; color: #212529; }
  .blog-category-select + .select2-container .select2-selection__arrow { height: 44px; }
  .blog-category-select + .select2-container .select2-selection__clear { margin-right: 8px; color: #dc3545; }
  .blog-category-select ~ .btn { height: 46px; width: 52px; min-width: 52px; padding: 0; border-radius: 0 .375rem .375rem 0; font-size: 20px; }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Add Blog</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Add Blog</li>
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
                    <h5>Blog Form</h5>
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
                                <h6>Add Blog Details</h6>
                                <p>Add Blog name & details</p>
                              </div></a></li>

                        </ul>
                      </div>
                      <div class="col-xxl-9 col-xl-8 box-col-8 position-relative">
                        <div class="tab-content custom-input" id="add-product-pills-tabContent">
                          <div class="tab-pane fade show active" id="detail-product" role="tabpanel" aria-labelledby="detail-product-tab">
                            <div class="sidebar-body">
                              <form class="row g-3 common-form" method="POST" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                  <label class="form-label" for="validationProductTitle">Blog Title</label>
                                  <input class="form-control" name="title" id="validationProductTitle" type="text" placeholder="Title" value="{{ old('title') }}">
                                </div>
                                <div class="col-md-12">
                                  <label class="form-label">Slug <small class="text-muted">(optional; generated from title)</small></label>
                                  <input class="form-control" name="slug" type="text" placeholder="blog-slug" value="{{ old('slug') }}">
                                </div>

                           

                                <div class="col-md-12">
                                  <label class="form-label">Blog Content</label>
                                  <textarea id="blog_content" name="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                                </div>

                                <div class="col-md-6">
                                  <label class="form-label">Blog Image</label>
                                  <input class="form-control" name="image" type="file" accept="image/jpeg,image/png,image/gif,image/webp">
                                </div>

                                <div class="col-md-6">
                                  <label class="form-label">Category</label>
                                  <div class="input-group"><select class="form-select blog-category-select" name="category" id="blog-category-select"><option value=""></option>@foreach(($categories ?? []) as $category)<option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>@endforeach</select><button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#categoryModal"><i class="fa fa-plus"></i></button></div>
                                </div>

                                <div class="col-md-6">
                                  <label class="form-label">Tags</label>
                                  <input type="hidden" name="tags" id="blog-tags-value" value="{{ old('tags') }}">
                                  <div class="blog-tags-input form-control d-flex flex-wrap gap-2" data-tags-input>
                                    <div class="blog-tag-chips d-flex flex-wrap gap-2" data-tags-list></div>
                                    <input class="border-0 flex-grow-1" type="text" data-tag-entry placeholder="Type a tag and press Enter">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label class="form-label">Min Read Time</label>
                                  <input class="form-control" name="min_read" type="text" placeholder="e.g., 5 min read" value="{{ old('min_read') }}">
                                </div>

                                <div class="col-md-12"><hr><h6>SEO</h6></div>

                                <div class="col-md-12">
                                  <label class="form-label">Meta Title <small class="text-muted">(optional; falls back to blog title)</small></label>
                                  <input class="form-control" name="meta_title" type="text" maxlength="255" placeholder="Meta title for search engines" value="{{ old('meta_title') }}">
                                </div>

                                <div class="col-md-12">
                                  <label class="form-label">Meta Description <small class="text-muted">(optional; falls back to auto-generated summary, ~155 chars recommended)</small></label>
                                  <textarea class="form-control" name="meta_description" maxlength="320" rows="2" placeholder="Short summary shown in search results">{{ old('meta_description') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                  <label class="form-label">Meta Keywords <small class="text-muted">(optional, comma separated)</small></label>
                                  <input class="form-control" name="meta_keywords" type="text" maxlength="255" placeholder="e.g. software development, mobile apps" value="{{ old('meta_keywords') }}">
                                </div>

                                <div class="col-md-6">
                                  <button class="btn btn-primary f-w-500" type="submit">Submit</button>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <div class="modal fade" id="categoryModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Add Blog Category</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><form data-category-form action="{{ route('admin.blog.categories.store') }}">@csrf<div class="modal-body"><input class="form-control" name="name" required placeholder="Category name"><div class="text-danger small mt-2" data-category-error></div></div><div class="modal-footer"><button class="btn btn-primary" type="submit">Save Category</button></div></form></div></div></div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js" integrity="sha512-OF6VwfoBrM/wE3gt0I/lTh1ElROdq3etwAquhEm2YI45Um4ird+0ZFX1IwuBDBRufdXBuYoBb0mqXrmUA2VnOA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      CKEDITOR.replace('blog_content', {
        toolbar: [
          { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
          { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
          { name: 'styles', items: ['Format', 'FontSize'] },
          { name: 'links', items: ['Link', 'Unlink'] }
        ],
        removePlugins: 'elementspath',
        resize_enabled: false
      });
      document.querySelector('[data-category-form]')?.addEventListener('submit', async function (e) { e.preventDefault(); const form=e.target, error=form.querySelector('[data-category-error]'); error.textContent=''; const response=await fetch(form.action,{method:'POST',headers:{'X-CSRF-TOKEN':form.querySelector('input[name="_token"]').value,'Accept':'application/json'},body:new FormData(form)}); const data=await response.json(); if(!response.ok){error.textContent=data.message||'Unable to save category.';return;} $('.blog-category-select').append(new Option(data.name,data.name,true,true)).trigger('change'); bootstrap.Modal.getOrCreateInstance(document.getElementById('categoryModal')).hide(); form.reset(); });

      $('.blog-category-select').select2({ width: '100%', placeholder: 'Search or choose a category', allowClear: true });
      document.querySelectorAll('[data-tags-input]').forEach(function (wrapper) {
        const hidden = wrapper.closest('form').querySelector('#blog-tags-value');
        const entry = wrapper.querySelector('[data-tag-entry]');
        const list = wrapper.querySelector('[data-tags-list]');
        let tags = (hidden.value || '').split(',').map(t => t.trim()).filter(Boolean);
        function render() {
          list.innerHTML = tags.map((tag, i) => `<span class="badge bg-primary">${tag}<button type="button" class="btn-close btn-close-white ms-1" data-remove="${i}" aria-label="Remove"></button></span>`).join('');
          hidden.value = tags.join(', ');
        }
        entry.addEventListener('keydown', function (event) {
          if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            const tag = entry.value.trim().replace(/,$/, '');
            if (tag && !tags.includes(tag)) tags.push(tag);
            entry.value = ''; render();
          }
        });
        list.addEventListener('click', e => { if (e.target.dataset.remove !== undefined) { tags.splice(Number(e.target.dataset.remove), 1); render(); } });
        render();
      });
    });
  </script>
@endsection 
