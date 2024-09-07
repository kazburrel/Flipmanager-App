@extends('backend.layouts.index')
@section('content')
    @include('backend.category.partials.toolbar')

    <div style="margin-top: 20px;"></div>

    @include('backend.category.partials.category_table')
@endsection

@section('scripts')
    <script>
        function toggleSubcategories(categoryId) {
            const subcategoryRows = document.querySelectorAll('.subcategory-row-' + categoryId);
            subcategoryRows.forEach(function(row) {
                row.classList.toggle('d-none');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-btn');
            toggleButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const categoryId = button.getAttribute('data-category-id');
                    toggleSubcategories(categoryId);
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[data-kt-ecommerce-category-filter="search"]');
            const tableRows = document.querySelectorAll('#kt_ecommerce_sales_table tbody tr');

            searchInput.addEventListener('input', function(event) {
                event.preventDefault();
                const searchTerm = searchInput.value.toLowerCase();

                tableRows.forEach(function(row) {
                    const categoryName = row.querySelector('td:nth-child(2) span').textContent
                        .toLowerCase();
                    const categoryDescription = row.querySelector('td:nth-child(3) span')
                        .textContent.toLowerCase();

                    if (categoryName.includes(searchTerm) || categoryDescription.includes(
                            searchTerm)) {
                        row.classList.remove('d-none');
                    } else {
                        row.classList.add('d-none');
                    }
                });

                if (searchTerm === '') {
                    tableRows.forEach(function(row) {
                        if (row.classList.contains('subcategory-row')) {
                            row.classList.add('d-none');
                        }
                    });
                }
            });
        });
    </script>
@endsection
