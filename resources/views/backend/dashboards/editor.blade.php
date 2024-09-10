@extends('backend.layouts.index')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-10 mb-10 justify-content-center">
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
            </div>
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
                                    <input type="text" id="searchInput"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search uploads"
                                        onkeyup="searchTable()" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <h3 class="card-label">Your Latest 5 File Uploads</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body py-4">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_uploads">
                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2"> S/N</th>
                                        <th class="min-w-125px">File Name</th>
                                        <th class="min-w-125px">Upload Date</th>
                                        <th class="min-w-125px">File Type</th>
                                        <th class="min-w-125px">File Size</th>
                                        <th class="min-w-125px">Views</th>
                                        <th class="min-w-125px">Downloads</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-bold" id="fileTableBody">
                                    <tr>
                                        <td> 1</td>
                                        <td class="text-gray-800">Document1</td>
                                        <td>01 Jan 2023, 10:00 am</td>
                                        <td>
                                            <div class="badge badge-light-primary fw-bolder">
                                                fliphtml5
                                            </div>
                                        </td>
                                        <td class="text-gray-800">2 MB</td>
                                        <td class="text-gray-800">150</td>
                                        <td class="text-gray-800">30</td>
                                    </tr>
                                    <tr>
                                        <td> 2</td>
                                        <td class="text-gray-800">Presentation1</td>
                                        <td>15 Feb 2023, 02:30 pm</td>
                                        <td>
                                            <div class="badge badge-light-warning fw-bolder">
                                                fliphtml5
                                            </div>
                                        </td>
                                        <td class="text-gray-800">5 MB</td>
                                        <td class="text-gray-800">200</td>
                                        <td class="text-gray-800">50</td>
                                    </tr>
                                    <tr>
                                        <td> 3</td>
                                        <td class="text-gray-800">Image1</td>
                                        <td>20 Mar 2023, 11:45 am</td>
                                        <td>
                                            <div class="badge badge-light-success fw-bolder">
                                                jpeg
                                            </div>
                                        </td>
                                        <td class="text-gray-800">1 MB</td>
                                        <td class="text-gray-800">300</td>
                                        <td class="text-gray-800">100</td>
                                    </tr>
                                    <tr>
                                        <td> 4</td>
                                        <td class="text-gray-800">Video1</td>
                                        <td>25 Mar 2023, 09:15 am</td>
                                        <td>
                                            <div class="badge badge-light-danger fw-bolder">
                                                mp4
                                            </div>
                                        </td>
                                        <td class="text-gray-800">50 MB</td>
                                        <td class="text-gray-800">500</td>
                                        <td class="text-gray-800">200</td>
                                    </tr>
                                    <tr>
                                        <td> 5</td>
                                        <td class="text-gray-800">Audio1</td>
                                        <td>30 Mar 2023, 08:00 am</td>
                                        <td>
                                            <div class="badge badge-light-info fw-bolder">
                                                mp3
                                            </div>
                                        </td>
                                        <td class="text-gray-800">5 MB</td>
                                        <td class="text-gray-800">400</td>
                                        <td class="text-gray-800">150</td>
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
            table = document.getElementById("kt_table_uploads");
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
