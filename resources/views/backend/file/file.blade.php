@extends('backend.layouts.index')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">File System - All Files</h1>
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
                                    placeholder="Search Files &amp; Folders" />
                            </div>
                        </div>

                        @can('manage files')
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_create_folder">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 12H13V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V12H8C7.4 12 7 12.4 7 13C7 13.6 7.4 14 8 14H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z"
                                                    fill="currentColor" />
                                            </svg>
                                            Create Folder
                                        </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_upload">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM16 11.6L12.7 8.29999C12.3 7.89999 11.7 7.89999 11.3 8.29999L8 11.6H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H16Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M11 11.6V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V11.6H11Z"
                                                    fill="currentColor" />
                                            </svg>
                                            Upload Files
                                        </span>
                                    </button>
                                </div>
                            </div>
                        @endcan
                    </div>
                    <div class="card-body">
                        <table id="kt_manager_list" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                                    <th class="min-w-50px text-center">SN</th>
                                    <th class="min-w-150px">Name</th>
                                    <th class="min-w-100px text-center">Size</th>
                                    <th class="min-w-155px text-center">Folder it belongs to</th>
                                    @can('manage files')
                                        <th class="w-125px text-center">Actions</th>
                                    @endcan

                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                                @forelse ($files as $file)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center" data-order="{{ $file->name }}">
                                            <a href="{{ $file->getUrl() }}" target="_blank"
                                                class="d-flex align-items-center text-gray-800 text-hover-primary">
                                                @if (in_array($file->mime_type, [
                                                        'application/pdf',
                                                        'application/msword',
                                                        'application/vnd.ms-excel',
                                                        'application/vnd.ms-powerpoint',
                                                        'text/plain',
                                                    ]))
                                                    <img src="{{ asset('images/file-icon.png') }}" alt="File Icon"
                                                        class="img-thumbnail me-4" width="50" height="50">
                                                @else
                                                    <img src="{{ $file->getUrl('preview') }}"
                                                        alt="Thumbnail of {{ $file->name }}" class="img-thumbnail me-4"
                                                        width="50" height="50">
                                                @endif
                                                <span>{{ $file->name }}</span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            @php
                                                $size = $file->size ?? null;
                                                if ($size === null) {
                                                    echo 'N/A';
                                                } else {
                                                    if ($size >= 1073741824) {
                                                        echo number_format($size / 1073741824, 2) . ' GB';
                                                    } elseif ($size >= 1048576) {
                                                        echo number_format($size / 1048576, 2) . ' MB';
                                                    } elseif ($size >= 1024) {
                                                        echo number_format($size / 1024, 2) . ' KB';
                                                    } else {
                                                        echo $size . ' bytes';
                                                    }
                                                }
                                            @endphp
                                        </td>
                                        <td class="text-center">
                                            {{ $file->folder->name }}
                                        </td>
                                        @can('manage files')
                                            <td class="text-center">
                                                <a href="#"
                                                    class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal_{{ $file->id }}"
                                                    title="Delete">
                                                    <i class="bi bi-trash-fill text-danger"></i>
                                                </a>
                                            </td>
                                        @endcan
                                    </tr>
                                    @can('manage files')
                                        <div class="modal fade" id="deleteModal_{{ $file->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel_{{ $file->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel_{{ $file->id }}">
                                                            Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this file?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <form method="POST"
                                                            action="{{ route('admin.files.destroy', $file->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endcan
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No files found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_create_folder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="{{ route('admin.folder.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h2 class="fw-bolder">Create Folder</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body pt-10 pb-15 px-lg-17">
                        <div class="form-group">
                            <label for="folder_name" class="form-label">Folder Name</label>
                            <input type="text" class="form-control form-control-solid" id="title" name="name"
                                placeholder="Enter folder name" />
                            @error('folder_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-5">
                            <label for="course" class="form-label">Course</label>
                            <select class="form-control form-control-solid" id="course" name="category_id">
                                <option value="">Select course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Folder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.file.partials.upload_modal')
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll(
                '#kt_manager_list tbody tr');

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
