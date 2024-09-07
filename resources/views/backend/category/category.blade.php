@extends('backend.layouts.index')
@section('content')
    <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Categories and Subcategories </h1>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add_category">Add Category</a>
            </div>
        </div>
    </div>
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <input type="text" data-kt-ecommerce-order-filter="search"
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
            </div>
        </div>
        <div class="modal fade" id="kt_modal_add_category" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content rounded">
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div>
                        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                            <form action="{{ route('admin.categories.store') }}" method="POST">
                                @csrf
                                <div class="mb-13 text-center">
                                    <h1 class="mb-3">Add New Category</h1>
                                </div>
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Category Name</span>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter Category Name" name="name" value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span>Description</span>
                                    </label>
                                    <textarea class="form-control form-control-solid" rows="3" name="description"
                                        placeholder="Enter Category Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Status</span>
                                    </label>
                                    <select class="form-control form-control-solid" name="is_active">
                                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="reset" data-bs-dismiss="modal" id="kt_modal_new_target_cancel"
                                        class="btn btn-light me-3">Cancel</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">

                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 text-center"
                    id="kt_ecommerce_sales_table">
                    <thead>
                        <tr class="fw-bolder text-muted">
                            <th class="min-w-50px">S/N</th>
                            <th class="min-w-100px text-center">Name</th>
                            <th class="min-w-100px">Description</th>
                            <th class="min-w-150px">Status</th>
                            <th class="min-w-150px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $i => $category)
                            <tr>
                                <td>
                                    <span class="text-dark fw-bolder  d-block fs-6">{{ $i + 1 }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <span class="text-dark fw-bolder d-block fs-6">{{ $category->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-dark fw-bolder d-block fs-6">
                                        @if (strlen($category->description) > 50)
                                            {{ substr($category->description, 0, 50) }}...
                                        @else
                                            {{ $category->description }}
                                        @endif
                                    </span>
                                </td>
                                <td class="text-end">
                                    <div class="d-flex flex-center w-100 me-2">
                                        <span
                                            class="text-dark fw-bolder  d-block fs-6 px-3 py-2 rounded {{ $category->is_active ? 'alert-success' : 'alert-danger' }}">
                                            {{ $category->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_edit_category_{{ $category->id }}" title="Edit">
                                        <i class="bi bi-pencil-fill text-primary"></i>
                                    </a>
                                    <a href="#"
                                        class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1"
                                        data-kt-ecommerce-order-filter="delete_row" title="Delete">
                                        <i class="bi bi-trash-fill text-danger"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm"
                                        data-kt-ecommerce-order-filter="add_subcategory" title="Add Subcategory">
                                        <i class="bi bi-plus-circle-fill text-success"></i>
                                    </a>
                                </td>

                                <div class="modal fade" id="kt_modal_edit_category_{{ $category->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content rounded">
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <div class="btn btn-sm btn-icon btn-active-color-primary"
                                                    data-bs-dismiss="modal">
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                height="2" rx="1"
                                                                transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16" height="2"
                                                                rx="1" transform="rotate(45 7.41422 6)"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                    <form
                                                        action="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-13 text-center">
                                                            <h1 class="mb-3">Edit Category</h1>
                                                        </div>
                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span class="required">Category Name</span>
                                                            </label>
                                                            <input type="text" class="form-control form-control-solid"
                                                                placeholder="Enter Category Name" name="name"
                                                                value="{{ old('name', $category->name) }}" />
                                                            @error('name')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span>Description</span>
                                                            </label>
                                                            <textarea class="form-control form-control-solid" rows="3" name="description"
                                                                placeholder="Enter Category Description">{{ old('description', $category->description) }}</textarea>
                                                            @error('description')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="d-flex flex-column mb-8 fv-row">
                                                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                                                <span class="required">Status</span>
                                                            </label>
                                                            <select class="form-control form-control-solid"
                                                                name="is_active">
                                                                <option value="1"
                                                                    {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>
                                                                    Active
                                                                </option>
                                                                <option value="0"
                                                                    {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>
                                                                    Inactive</option>
                                                            </select>
                                                            @error('is_active')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="reset" data-bs-dismiss="modal"
                                                                id="kt_modal_new_target_cancel"
                                                                class="btn btn-light me-3">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <span class="indicator-label">Save</span>
                                                                <span class="indicator-progress">Please wait...
                                                                    <span
                                                                        class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @if ($category->subcategories)
                                @foreach ($category->subcategories as $j => $subcategory)
                                    <tr>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder d-block fs-6">{{ $i + 1 }}.{{ $j + 1 }}</span>
                                        </td>
                                        <td data-kt-ecommerce-order-filter="order_id">
                                            <span
                                                class="text-primary fw-bolder d-block fs-6">{{ $subcategory->uuid }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="justify-content-start flex-center">
                                                    <span
                                                        class="text-dark fw-bolder d-block fs-6">{{ $subcategory->name }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span
                                                class="text-dark fw-bolder d-block fs-6">{{ $subcategory->description }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex flex-center w-100 me-2">
                                                <span
                                                    class="text-dark fw-bolder d-block fs-6 px-3 py-2 rounded {{ $subcategory->is_active ? 'alert-success' : 'alert-danger' }}">
                                                    {{ $subcategory->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-order-filter="edit_row">Edit</a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-order-filter="delete_row">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
