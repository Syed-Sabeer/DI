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
                     Newsletters List</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Newsletters List</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-product-view product-wrapper">
            <div class="row">

              <div class="col-12">
                <div class="card" data-live-submissions>
                  <div class="card-header card-no-border pb-3">
                    <form method="GET" action="{{ route('admin.newsletterlist') }}" class="row g-3 align-items-end" data-live-filter-form>
                      <div class="col-xl-4 col-md-6"><label class="form-label" for="newsletter-search">Search email</label><input class="form-control" id="newsletter-search" type="search" name="search" value="{{ request('search') }}" placeholder="Search subscriber email..."></div>
                      <div class="col-xl-2 col-md-3"><label class="form-label" for="newsletter-from">From</label><input class="form-control" id="newsletter-from" type="date" name="date_from" value="{{ request('date_from') }}"></div>
                      <div class="col-xl-2 col-md-3"><label class="form-label" for="newsletter-to">To</label><input class="form-control" id="newsletter-to" type="date" name="date_to" value="{{ request('date_to') }}"></div>
                      <div class="col-xl-2 col-md-4"><label class="form-label" for="newsletter-sort">Sort</label><select class="form-select" id="newsletter-sort" name="sort"><option value="newest" @selected(request('sort', 'newest') === 'newest')>Newest first</option><option value="oldest" @selected(request('sort') === 'oldest')>Oldest first</option></select></div>
                      <div class="col-xl-2 col-md-8 d-flex gap-2"><button class="btn btn-primary flex-fill" type="submit"><i class="fa fa-search me-1"></i>Filter</button><a class="btn btn-light" href="{{ route('admin.newsletterlist') }}" title="Clear filters"><i class="fa fa-times"></i></a></div>
                    </form>
                    <p class="text-muted mb-0 mt-3"><span>{{ number_format($newsletters->total()) }} {{ \Illuminate\Support\Str::plural('subscriber', $newsletters->total()) }} found</span><span class="ms-2" data-live-status aria-live="polite"></span></p>
                  </div>
                  <div class="card-body px-0 pt-0">
                    <div class="list-product">
                      <div class="recent-table table-responsive custom-scrollbar product-list-table">
                        <table class="table" >
                          <thead>
                            <tr>
                              <th></th>
                              <th>No.</th>
                            
                              <th> <span class="c-o-light f-w-600">Email</span></th>
                              <th> <span class="c-o-light f-w-600">Subscribed At</span></th>
                             
                              <th> <span class="c-o-light f-w-600">Actions</span></th>

                            </tr>
                          </thead>
                        <tbody>
  @forelse ($newsletters as $newsletter)
    <tr class="product-removes">
      <td></td>
      <td>{{ $newsletters->firstItem() + $loop->index }}</td>
    
      <td><p class="c-o-light">{{ $newsletter->email }}</p></td>
      <td><p class="c-o-light">{{ optional($newsletter->created_at)->format('d M Y, h:i A') }}</p></td>
      <td>
        <div class="product-action">

          <!-- Delete Form -->
          <form action="{{ route('admin.newsletterlist.destroy', $newsletter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this newsletter?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="square-white trash-3" style="border:none; background:none; padding:0;">
              <svg><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use></svg>
            </button>
          </form>
        </div>
      </td>
    </tr>


  @empty
    <tr><td colspan="5" class="text-center py-4">No newsletter subscriptions yet.</td></tr>
  @endforelse
</tbody>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

                        </table>
                      </div>
                      <div class="px-4 pt-3">{{ $newsletters->links() }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>






        @endsection

@section('script')
@include('admin.submissions.partials.live-filter-script')
@endsection
