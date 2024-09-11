<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data"
                id="kt_modal_upload_form">
                @csrf
                <div class="modal-header">
                    <h2 class="fw-bolder">Create Blog</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
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
                <div class="modal-body pt-10 pb-15 px-lg-17">
                    <div class="form-group mb-5">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control form-control-solid" id="title" name="title"
                            required />
                    </div>
                    <div class="form-group mb-5">
                        <label for="summary" class="form-label">Summary</label>
                        <textarea class="form-control form-control-solid" id="summary" name="summary" required></textarea>
                    </div>
                    <div class="form-group mb-5">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control form-control-solid" id="content" name="content" required></textarea>
                    </div>
                    <div class="form-group mb-5">
                        <label for="media" class="form-label">Media</label>
                        <input type="file" class="form-control form-control-solid" id="media" name="media"
                            accept="image/*" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Blog</button>
                </div>
            </form>
        </div>
    </div>
</div>
