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
                     Contacts List</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">CMS</li>
                    <li class="breadcrumb-item active">Contacts List</li>
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
                    <form method="GET" action="{{ route('admin.contactlist') }}" class="row g-3 align-items-end" data-live-filter-form>
                      <div class="col-xl-4 col-md-6"><label class="form-label" for="contact-search">Search</label><input class="form-control" id="contact-search" type="search" name="search" value="{{ request('search') }}" placeholder="Name, email, phone, subject, country..."></div>
                      <div class="col-xl-2 col-md-3"><label class="form-label" for="contact-from">From</label><input class="form-control" id="contact-from" type="date" name="date_from" value="{{ request('date_from') }}"></div>
                      <div class="col-xl-2 col-md-3"><label class="form-label" for="contact-to">To</label><input class="form-control" id="contact-to" type="date" name="date_to" value="{{ request('date_to') }}"></div>
                      <div class="col-xl-2 col-md-4"><label class="form-label" for="contact-sort">Sort</label><select class="form-select" id="contact-sort" name="sort"><option value="newest" @selected(request('sort', 'newest') === 'newest')>Newest first</option><option value="oldest" @selected(request('sort') === 'oldest')>Oldest first</option></select></div>
                      <div class="col-xl-2 col-md-8 d-flex gap-2"><button class="btn btn-primary flex-fill" type="submit"><i class="fa fa-search me-1"></i>Filter</button><a class="btn btn-light" href="{{ route('admin.contactlist') }}" title="Clear filters"><i class="fa fa-times"></i></a></div>
                    </form>
                    <p class="text-muted mb-0 mt-3"><span>{{ number_format($contacts->total()) }} {{ \Illuminate\Support\Str::plural('submission', $contacts->total()) }} found</span><span class="ms-2" data-live-status aria-live="polite"></span></p>
                  </div>
                  <div class="card-body px-0 pt-0">
                    <div class="list-product">
                      <div class="recent-table table-responsive custom-scrollbar product-list-table">
                        <table class="table" >
                          <thead>
                            <tr>
                              <th></th>
                              <th>No.</th>
                              <th> <span class="c-o-light f-w-600">Full Name</span></th>
                              <th> <span class="c-o-light f-w-600">Email</span></th>
                              <th> <span class="c-o-light f-w-600">Phone</span></th>
                              <th> <span class="c-o-light f-w-600">Actions</span></th>

                            </tr>
                          </thead>
                        <tbody>
  @forelse ($contacts as $contact)
    <tr class="product-removes">
      <td></td>
      <td>{{ $contacts->firstItem() + $loop->index }}</td>
      <td><p class="c-o-light">{{ $contact->fullname }}</p></td>
      <td><p class="c-o-light">{{ $contact->email }}</p></td>
      <td><p class="c-o-light">{{ $contact->phone }}</p></td>
      <td>
        <div class="product-action">
          <!-- View Button -->
          <button class="square-white" data-bs-toggle="modal" data-bs-target="#contactModal{{ $contact->id }}">
            <svg><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#eye') }}"></use></svg>
          </button>

          <!-- Delete Form -->
          <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="square-white trash-3" style="border:none; background:none; padding:0;">
              <svg><use href="{{ asset('AdminAssets/svg/icon-sprite.svg#trash1') }}"></use></svg>
            </button>
          </form>
        </div>
      </td>
    </tr>

    <!-- Modal for Contact Details -->
    <div class="modal fade" id="contactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="contactModalLabel{{ $contact->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="contactModalLabel{{ $contact->id }}">Contact Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
        
            <p><strong>Name:</strong> {{ $contact->fullname }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>  
            <p><strong>Country:</strong> {{ $contact->country ?: 'Unknown' }}</p>
            <p><strong>IP Address:</strong> {{ $contact->ip_address ?: 'Unavailable' }}</p>
            
<br>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <br>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
            <p><strong>Submitted At:</strong> {{ $contact->created_at->format('d M Y, h:i A') }}</p>
          </div>
          <div class="modal-footer">
            <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  @empty
    <tr><td colspan="6" class="text-center py-5"><h6 class="mb-1">No contact submissions found</h6><p class="text-muted mb-0">Try changing or clearing the filters.</p></td></tr>
  @endforelse
</tbody>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

                        </table>
                      </div>
                      <div class="px-4 pt-3">{{ $contacts->links() }}</div>
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
