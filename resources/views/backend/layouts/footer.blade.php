<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="text-dark order-2 order-md-1">
            {{-- <span class="text-muted fw-bold me-1">{{ date('Y') }}©</span> copyright --}}
            <a href="https://www.kazcodes.dev" target="_blank" class="text-gray-800 text-hover-primary">Kazcodes</a>
        </div>
        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">About</a>
            </li>
        </ul>
    </div>
</div>

<style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        /* This makes sure the body expands to at least the height of the viewport */
    }

    .footer {
        margin-top: auto;
        /* This pushes the footer to the bottom of the page */
    }
</style>
