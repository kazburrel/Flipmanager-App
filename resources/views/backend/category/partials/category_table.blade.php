<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0 pt-5">
        <div class="d-flex align-items-center position-relative my-1">
            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                <!-- SVG Icon -->
            </span>
            <input type="text" data-kt-ecommerce-category-filter="search"
                class="form-control form-control-solid w-250px ps-14" placeholder="Search" />
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
                        @include('backend.category.partials.category_row', [
                            'category' => $category,
                            'index' => $i,
                        ])
                    @empty
                        <tr>
                            <td colspan="5">No categories found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
