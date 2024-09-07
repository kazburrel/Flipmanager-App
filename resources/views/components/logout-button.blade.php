<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-custom btn-danger w-100" data-bs-toggle="tooltip" data-bs-trigger="hover"
        title="Logout" style="text-align: left;">
        <span class="btn-label">Logout</span>
    </button>
</form>
