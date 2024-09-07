<tr>
    <td>
        <span class="text-dark fw-bolder d-block fs-6">{{ $index + 1 }}</span>
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
                class="text-dark fw-bolder d-block fs-6 px-3 py-2 rounded {{ $category->is_active ? 'alert-success' : 'alert-danger' }}">
                {{ $category->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
    </td>
    <td class="text-center">
        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" data-bs-toggle="modal"
            data-bs-target="#kt_modal_edit_category_{{ $category->id }}" title="Edit">
            <i class="bi bi-pencil-fill text-primary"></i>
        </a>
        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" data-bs-toggle="modal"
            data-bs-target="#deleteModal" title="Delete"
            onclick="document.querySelector('#deleteModal .modal-body p').textContent = 'Are you sure you want to delete the category {{ $category->name }}?'; 
                     document.querySelector('#deleteModal form').action = '{{ route('admin.categories.destroy', $category->id) }}';">
            <i class="bi bi-trash-fill text-danger"></i>
        </a>
        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm" data-bs-toggle="modal"
            data-bs-target="#kt_modal_add_subcategory_{{ $category->id }}" title="Add Subcategory">
            <i class="bi bi-plus-circle-fill text-success"></i>
        </a>
        <button class="btn btn-icon btn-bg-light btn-active-color-info btn-sm toggle-btn"
            data-category-id="{{ $category->id }}" title="View Subcategories">
            <i class="bi bi-eye-fill text-info"></i>
        </button>
    </td>
</tr>
{{-- @include('backend.category.partials.modals', ['category' => $category]) --}}

<!-- Subcategory Rows -->
@if ($category->subcategories)
    @foreach ($category->subcategories as $j => $subcategory)
        <tr class="subcategory-row subcategory-row-{{ $category->id }} d-none">
            <td>
                <span class="text-muted fw-normal d-block fs-6">{{ $index + 1 }}.{{ $j + 1 }}</span>
            </td>
            <td>
                <div class="d-flex justify-content-center">
                    <span class="text-muted fw-normal d-block fs-6">{{ $subcategory->name }}</span>
                </div>
            </td>
            <td>
                <span class="text-muted fw-normal d-block fs-6">
                    @if (strlen($subcategory->description) > 50)
                        {{ substr($subcategory->description, 0, 50) }}...
                    @else
                        {{ $subcategory->description }}
                    @endif
                </span>
            </td>
            <td class="text-end">
                <div class="d-flex flex-center w-100 me-2">
                    <span
                        class="text-dark fw-bolder d-block fs-6 px-3 py-2 rounded {{ $category->is_active ? 'alert-success' : 'alert-danger' }}">
                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            </td>
            <td class="text-center">
                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_edit_subcategory_{{ $subcategory->id }}"
                    title="Edit">
                    <i class="bi bi-pencil-fill text-primary"></i>
                </a>
                <a href="#" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" title="Delete"
                    data-bs-toggle="modal" data-bs-target="#deleteModal"
                    onclick="document.querySelector('#deleteModal .modal-body p').textContent = 'Are you sure you want to delete the subcategory: {{ $subcategory->name }}?'; document.querySelector('#deleteModal form').action = '{{ route('admin.subcategories.destroy', $subcategory->id) }}';">
                    <i class="bi bi-trash-fill text-danger"></i>
                </a>
            </td>
        </tr>
        @include('backend.category.partials.modals', [
            'category' => $category,
            'subcategory' => $subcategory,
        ])
    @endforeach
@endif
