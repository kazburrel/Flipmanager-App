@extends('backend.layouts.index')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Event Management - All Events</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="card card-flush">
                    <div class="card-header pt-8">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-15"
                                    placeholder="Search Events" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upload">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"
                                                fill="currentColor" />
                                            <path d="M11 16h2v-6h3l-4-4-4 4h3z" fill="currentColor" />
                                        </svg>
                                        Create Event
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="kt_event_list" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-50px text-center">SN</th>
                                    <th class="min-w-150px">Title</th>
                                    <th class="min-w-100px text-center">Organizer</th>
                                    <th class="min-w-155px text-center">Event Date</th>
                                    <th class="w-125px text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                                @forelse ($events as $event)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center" data-order="{{ $event->title }}">
                                            <a href="{{ route('admin.events.show', $event->id) }}" target="_blank"
                                                class="d-flex align-items-center text-gray-800 text-hover-primary">
                                                <span>{{ $event->title }}</span>
                                            </a>
                                            @if ($event->image)
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{ $event->image }}" alt="Thumbnail of {{ $event->title }}"
                                                        class="img-thumbnail me-4" width="50" height="50">
                                                    <a href="{{ $event->image }}" target="_blank">View
                                                        Full</a>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $event->user->fname }}
                                            {{ $event->user->lname }}</td>
                                        <td class="text-center">
                                            {{ optional($event->date)->format('d M Y') ?? 'N/A' }}
                                        </td>
                                        <td class="text-center">
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_{{ $event->id }}"
                                                title="Edit">
                                                <i class="bi bi-pencil-fill text-primary"></i>
                                            </a>

                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $event->id }}"
                                                title="Delete">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="kt_modal_edit_{{ $event->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered mw-650px">
                                            <div class="modal-content">
                                                <form class="form"
                                                    action="{{ route('admin.events.update', $event->id) }}"
                                                    method="POST" enctype="multipart/form-data"
                                                    id="kt_modal_edit_form_{{ $event->id }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-header">
                                                        <h2 class="fw-bolder">Edit Event</h2>
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                            data-bs-dismiss="modal">
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="currentColor" />
                                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                                        rx="1" transform="rotate(45 7.41422 6)"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body pt-10 pb-15 px-lg-17">
                                                        <div class="form-group mb-5">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text"
                                                                class="form-control form-control-solid @error('title') is-invalid @enderror"
                                                                id="title" name="title"
                                                                value="{{ old('title', $event->title) }}" required />
                                                            @error('title')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label for="summary" class="form-label">Summary</label>
                                                            <textarea class="form-control form-control-solid @error('summary') is-invalid @enderror" id="summary"
                                                                name="summary" required>{{ old('summary', $event->summary) }}</textarea>
                                                            @error('summary')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label for="content" class="form-label">Content</label>
                                                            <textarea class="form-control form-control-solid @error('description') is-invalid @enderror" id="content"
                                                                name="description" required>{{ old('description', $event->description) }}</textarea>
                                                            @error('description')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label for="media" class="form-label">Media</label>
                                                            <input type="file"
                                                                class="form-control form-control-solid @error('media') is-invalid @enderror"
                                                                id="media" name="media" accept="image/*" />
                                                            @error('media')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mb-5">
                                                            <label for="date" class="form-label">Date</label>
                                                            <input type="date"
                                                                class="form-control form-control-solid @error('date') is-invalid @enderror"
                                                                id="date" name="date"
                                                                value="{{ old('date', $event->date->format('Y-m-d')) }}"
                                                                required />
                                                            @error('date')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Event</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteModal_{{ $event->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel_{{ $event->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel_{{ $event->id }}">
                                                        Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this event?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <form method="POST"
                                                        action="{{ route('admin.events.destroy', $event->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No events found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('backend.event.partials.modal')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll(
                '#kt_event_list tbody tr');

            tableRows.forEach(function(row) {
                const rowData = row.textContent
                    .toLowerCase();

                if (rowData.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
