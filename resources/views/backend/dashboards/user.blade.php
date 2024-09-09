@extends('backend.layouts.index')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            {{-- <div class="row g-5 g-xl-10 mb-10 justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                    <div class="card card-flush h-100 border rounded-3 shadow-sm" style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column align-items-center">
                                <span class="fs-2hx fw-bolder text-primary me-2 lh-1 ls-n2">5</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6 text-center">Total Uploads</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="post d-flex flex-column-fluid mb-4" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card">
                        <div class="card-header border-0 pt-6">
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
                                    <input type="text" data-kt-user-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <h3 class="card-label">Your Latest File Uploads</h3>

                                </div>
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-user-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                        data-kt-user-table-select="delete_selected">
                                        Delete Selected
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2"> S/N</th>
                                        <th class="min-w-125px">First Name</th>
                                        <th class="min-w-125px">Last Name</th>
                                        <th class="min-w-125px">Username</th>
                                        <th class="min-w-125px">Role</th>
                                        <th class="min-w-125px">Joined Date</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                        <th class="text-end min-w-100px">Permissions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold">
                                    <tr>
                                        <td> 1</td>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="text-gray-800 mb-1">John</p>
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Doe</td>
                                        <td class="text-gray-800">johndoe</td>
                                        <td>
                                            <div class="badge badge-light-primary fw-bolder">
                                                admin
                                            </div>
                                        </td>
                                        <td>01 Jan 2023, 10:00 am</td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user_1"
                                                title="Edit">
                                                <i class="bi bi-pencil-fill text-primary"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_1" title="Delete">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-underline">
                                                Permissions
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 2</td>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="text-gray-800 mb-1">Jane</p>
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Smith</td>
                                        <td class="text-gray-800">janesmith</td>
                                        <td>
                                            <div class="badge badge-light-warning fw-bolder">
                                                editor
                                            </div>
                                        </td>
                                        <td>15 Feb 2023, 02:30 pm</td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user_2"
                                                title="Edit">
                                                <i class="bi bi-pencil-fill text-primary"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_2" title="Delete">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-underline">
                                                Permissions
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 3</td>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            </div>
                                            <div class="d-flex flex-column">
                                                <p class="text-gray-800 mb-1">Alice</p>
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Johnson</td>
                                        <td class="text-gray-800">alicejohnson</td>
                                        <td>
                                            <div class="badge badge-light-success fw-bolder">
                                                user
                                            </div>
                                        </td>
                                        <td>20 Mar 2023, 11:45 am</td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user_3"
                                                title="Edit">
                                                <i class="bi bi-pencil-fill text-primary"></i>
                                            </a>
                                            <a href="#"
                                                class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal_3" title="Delete">
                                                <i class="bi bi-trash-fill text-danger"></i>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a href="#" class="text-primary text-decoration-underline">
                                                Permissions
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
