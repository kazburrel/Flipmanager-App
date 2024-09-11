<div class="modal fade" id="kt_modal_upload" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="{{ route('admin.files.upload') }}" method="POST" enctype="multipart/form-data"
                id="kt_modal_upload_form">
                @csrf
                <div class="modal-header">
                    <h2 class="fw-bolder">Upload Files</h2>
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
                        <label for="folder_id" class="form-label">Select Folder</label>
                        <select class="form-control form-control-solid" id="folder_id" name="folder_id" required>
                            <option value="">Select folder</option>
                            @foreach ($folders as $folder)
                                <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-5">
                        <label for="filepond" class="form-label fw-bold">Upload Files</label>
                        <input type="file" class="filepond form-control" name="file[]" multiple
                            data-max-file-size="1MB" data-max-files="5" required />
                        <div class="form-text text-muted mt-2">
                            <i class="bi bi-info-circle"></i> Max file size is 1MB per file. You can upload up to 5
                            files.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
