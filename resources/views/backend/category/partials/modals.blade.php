<!-- Add Subcategory Modal -->
<div class="modal fade" id="kt_modal_add_subcategory_{{ $category->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="{{ route('admin.subcategories.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Add Subcategory</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Subcategory Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter Subcategory Name" name="name" value="{{ old('name') }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Description</span>
                            </label>
                            <textarea class="form-control form-control-solid" rows="3" name="description"
                                placeholder="Enter Subcategory Description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Category</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" value="{{ $category->name }}"
                                readonly />
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

<!-- Edit Subcategory Modal -->
<div class="modal fade" id="kt_modal_edit_subcategory_{{ $subcategory->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="{{ route('admin.subcategories.update', ['subcategory' => $subcategory->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Edit Subcategory</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Subcategory Name</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Enter Subcategory Name" name="name"
                                value="{{ old('name', $subcategory->name) }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Description</span>
                            </label>
                            <textarea class="form-control form-control-solid" rows="3" name="description"
                                placeholder="Enter Subcategory Description">{{ old('description', $subcategory->description) }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>Category</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" value="{{ $category->name }}"
                                readonly />
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


<!-- Edit Category Modal -->
<div class="modal fade" id="kt_modal_edit_category_{{ $category->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form action="{{ route('admin.categories.edit', ['category' => $category->id]) }}"
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
                            <select class="form-control form-control-solid" name="is_active">
                                <option value="1"
                                    {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0"
                                    {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>Inactive
                                </option>
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


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ $message ?? 'Are you sure you want to delete this item?' }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ $route ?? '' }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
