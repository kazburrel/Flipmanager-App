@extends('backend.layouts.index')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
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
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">Add User</a>
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-user-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                                Delete Selected
                            </button>
                        </div>
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <div class="modal-content rounded">
                                    <div class="modal-header pb-0 border-0 justify-content-end">
                                        <button type="button" class="btn btn-sm btn-icon btn-active-color-primary"
                                            data-bs-dismiss="modal">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                            <form action="{{ route('admin.users.store') }}" method="POST">
                                                @csrf
                                                <div class="mb-13 text-center">
                                                    <h1 class="mb-3">Add User</h1>
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">First Name</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="Enter First Name" name="fname"
                                                        value="{{ old('fname') }}" />
                                                    @error('fname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Last Name</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="Enter Last Name" name="lname"
                                                        value="{{ old('lname') }}" />
                                                    @error('lname')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Username</span>
                                                    </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="Enter Username" name="username"
                                                        value="{{ old('username') }}" />
                                                    @error('username')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Email</span>
                                                    </label>
                                                    <input type="email" class="form-control form-control-solid"
                                                        placeholder="Enter Email" name="email"
                                                        value="{{ old('email') }}" />
                                                    @error('email')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Password</span>
                                                    </label>
                                                    <input type="password" class="form-control form-control-solid"
                                                        placeholder="Enter Password" name="password" />
                                                    @error('password')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Confirm Password</span>
                                                    </label>
                                                    <input type="password" class="form-control form-control-solid"
                                                        placeholder="Confirm Password" name="password_confirmation" />
                                                    @error('password_confirmation')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="d-flex flex-column mb-8 fv-row">
                                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                        <span class="required">Role</span>
                                                    </label>
                                                    <select class="form-control form-control-solid" name="role">
                                                        @foreach (App\Enums\RoleEnum::cases() as $role)
                                                            <option value="{{ $role->value }}"
                                                                {{ old('role') == $role->value ? 'selected' : '' }}>
                                                                {{ $role->label() }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('role')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">
                                                        <span class="indicator-label">Submit</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            @forelse ($users as $i => $user)
                                <tr>
                                    <td> {{ $i + 1 }}</td>
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="text-gray-800 mb-1">{{ $user->fname }}</p>
                                        </div>
                                    </td>
                                    <td class="text-gray-800">{{ $user->lname }}</td>
                                    <td class="text-gray-800">{{ $user->username }}</td>
                                    <td>
                                        <div class="badge badge-success fw-bolder">
                                            {{ $user->getRoleNames()->first() }}
                                        </div>
                                    </td>
                                    <td>{{ $user->created_at->format('d M Y, h:i a') }}</td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_edit_user" title="Edit">
                                            <i class="bi bi-pencil-fill text-primary"></i>
                                        </a>
                                        <a href="#"
                                            class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete"
                                            onclick="document.querySelector('#deleteModal .modal-body p').textContent = 'Are you sure you want to delete this user?'; 
                                                 document.querySelector('#deleteModal form').action = '{{ route('admin.users.destroy', $user->id) }}';">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                        </a>
                                    </td>

                                    <td class="text-end">
                                        <a href="{{ route('admin.users.permissions', $user->id) }}"
                                            class="text-primary text-decoration-underline">
                                            Permissions
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
