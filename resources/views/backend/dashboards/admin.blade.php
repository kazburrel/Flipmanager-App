@extends('backend.layouts.index')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-10 mb-10 justify-content-center">
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <div class="card card-flush h-md-50 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-primary me-2 lh-1 ls-n2">{{ $totalCategories }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush h-md-50 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-success me-2 lh-1 ls-n2">{{ $totalSubCategories }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Subcategories</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-info me-2 lh-1 ls-n2">{{ $totalUsers }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Users</span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-warning me-2 lh-1 ls-n2">{{ $adminCount }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Users with Role: Admin</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-danger me-2 lh-1 ls-n2">{{ $editorCount }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Users with Role: Editor</span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-secondary me-2 lh-1 ls-n2">{{ $userCount }}</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Users with Role: User</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-primary me-2 lh-1 ls-n2">5</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Files</span>
                            </div>
                        </div>
                    </div>
                    <div class="card card-flush h-md-50 mb-5 mb-xl-10 border rounded-3 shadow-sm"
                        style="background-color: #f8f9fa;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bolder text-success me-2 lh-1 ls-n2">3</span>
                                <span class="text-gray-600 pt-1 fw-bold fs-6">Total Folders</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mb-4" id="kt_post">
                <div>
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
                                    <input type="text" id="searchInput"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search file"
                                        onkeyup="searchTable()" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <h3 class="card-label">Latest File Activity</h3>
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
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_files">
                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2"> S/N</th>
                                        <th class="min-w-80px">File Name</th>
                                        <th class="min-w-80px">Uploader</th>
                                        <th class="min-w-80px">Upload Date</th>
                                        <th class="min-w-80px">File Type</th>
                                        <th class="min-w-80px">File Size</th>
                                        <th class="min-w-80px">Views</th>
                                        <th class="min-w-80px">Downloads</th>
                                        <th class="min-w-80px">Visibility</th>
                                        <th class="min-w-80px">Category</th>
                                        <th class="min-w-80px">Subcategory</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold" id="fileTableBody">
                                    <tr>
                                        <td> 1</td>
                                        <td class="text-gray-800">Document1</td>
                                        <td class="text-gray-800">John Doe</td>
                                        <td>01 Jan 2023, 10:00 am</td>
                                        <td>
                                            <div class="badge badge-light-primary fw-bolder">
                                                fliphtml5
                                            </div>
                                        </td>
                                        <td class="text-gray-800">2 MB</td>
                                        <td class="text-gray-800">150</td>
                                        <td class="text-gray-800">30</td>
                                        <td>
                                            <div class="badge badge-light-success fw-bolder">
                                                Public
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Category1</td>
                                        <td class="text-gray-800">Subcategory1</td>
                                    </tr>
                                    <tr>
                                        <td> 2</td>
                                        <td class="text-gray-800">Presentation1</td>
                                        <td class="text-gray-800">Jane Smith</td>
                                        <td>15 Feb 2023, 02:30 pm</td>
                                        <td>
                                            <div class="badge badge-light-warning fw-bolder">
                                                fliphtml5
                                            </div>
                                        </td>
                                        <td class="text-gray-800">5 MB</td>
                                        <td class="text-gray-800">200</td>
                                        <td class="text-gray-800">50</td>
                                        <td>
                                            <div class="badge badge-light-danger fw-bolder">
                                                Private
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Category2</td>
                                        <td class="text-gray-800">Subcategory2</td>
                                    </tr>
                                    <tr>
                                        <td> 3</td>
                                        <td class="text-gray-800">Report1</td>
                                        <td class="text-gray-800">Alice Johnson</td>
                                        <td>20 Mar 2023, 11:45 am</td>
                                        <td>
                                            <div class="badge badge-light-success fw-bolder">
                                                fliphtml5
                                            </div>
                                        </td>
                                        <td class="text-gray-800">3 MB</td>
                                        <td class="text-gray-800">100</td>
                                        <td class="text-gray-800">20</td>
                                        <td>
                                            <div class="badge badge-light-warning fw-bolder">
                                                Restricted
                                            </div>
                                        </td>
                                        <td class="text-gray-800">Category3</td>
                                        <td class="text-gray-800">Subcategory3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("kt_table_files");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        }
                    }
                }
            }
        }
    </script>
@endsection
