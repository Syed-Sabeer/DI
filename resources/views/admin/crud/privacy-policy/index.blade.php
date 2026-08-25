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
                  <h3>
                     Privacy Policy List</h3>
                  </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Privacy Policy List</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-product-view product-wrapper">
            <div class="row">

              <div class="col-12">
                <div class="card">
                  <div class="card-header card-no-border text-end">
                    <div class="card-header-right-icon"><a class="btn btn-primary f-w-500" href="{{route('admin.privacy-policy.add')}}"><i class="fa fa-plus pe-2"></i>Add Privacy Policy</a></div>
                  </div>
                  <div class="card-body px-0 pt-0">
                    <div class="list-product">
                      <div class="recent-table table-responsive custom-scrollbar product-list-table">
                        <table class="table" >
                          <thead>
                            <tr>
                              <th></th>
                              <th>No.</th>
                              <th> <span class="c-o-light f-w-600">Title</span></th>
                              <th> <span class="c-o-light f-w-600">Description</span></th>
                              <th> <span class="c-o-light f-w-600">Visibility</span></th>
                              <th> <span class="c-o-light f-w-600">Actions</span></th>

                            </tr>
                          </thead>
                          <tbody>


                            @foreach ($privacypolicys as $privacypolicy)




                            <tr class="product-removes">
                                <td></td>
                              <td>{{ $loop->iteration }}</td>
                                <td>
                                <p class="c-o-light">{{$privacypolicy->title}}</p>
                              </td>
                              <td>
                                <p class="c-o-light">{{ \Illuminate\Support\Str::limit(strip_tags($privacypolicy->description), 20, '...') }}
</p>
                              </td>
                              <td>
                                <div class="d-flex align-items-center">
                                 
                                  <form method="POST" action="{{ route('admin.privacy-policy.toggleVisibility', $privacypolicy->id) }}" style="display:inline;" class="toggle-visibility-form">
                                      @csrf
                                      <div class="form-check form-switch form-check-inline">
                                          <input class="form-check-input switch-primary check-size" type="checkbox" role="switch" {{ $privacypolicy->visibility ? 'checked' : '' }} onchange="this.form.submit()">
                                      </div>
                                  </form>
                                </div>
                              </td>

                              <td>
                          <div class="product-action">

  <a class="square-white" href="{{ route('admin.privacy-policy.edit', $privacypolicy->id) }}">
    <svg>
      <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#edit-content') }}"></use>
    </svg>
  </a>


  <form action="{{ route('admin.privacy-policy.destroy', $privacypolicy->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Privacy Policy?');" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="square-white trash-3" style="border:none; background:none; padding:0;">
      <svg>
        <use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use>
      </svg>
    </button>
  </form>
</div>

                              </td>
                            </tr>

@endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>






        @endsection

@section('script')
@endsection
