@extends('backend.layouts.index')
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3>System Permissions</h3>
                    </div>
                    <a href="{{ route('admin.users') }}">
                        <i class="bi bi-arrow-left"></i> Back to Manage Users
                    </a>
                </div>
                <div class="card-body py-4">
                    <form action="{{ route('admin.users.updatePermission', ['user' => $user->id]) }}" method="POST"
                        id="permissionsForm">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success mb-4 d-none" id="saveButton">
                                <i class="bi bi-save"></i> Save
                            </button>
                        </div>
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_permissions">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Permission</th>
                                    <th class="min-w-125px">Access Level</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-bold">
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <select class="form-control form-control-solid"
                                                name="permissions[{{ $permission->uuid }}]" onchange="showSaveButton()">
                                                <!-- The 'True' option is selected if the user's permissions include the current permission -->
                                                <option value="true"
                                                    {{ in_array($permission->name, $userPermissions->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                    True
                                                </option>
                                                <!-- The 'False' option is selected if the user's permissions do not include the current permission -->
                                                <option value="false"
                                                    {{ !in_array($permission->name, $userPermissions->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                    False
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showSaveButton() {
            const saveButton = document.getElementById('saveButton');
            saveButton.classList.remove('d-none');
        }
    </script>
@endsection
<style>
    .post {
        margin-bottom: 20px;
        /* Adjust the value as needed */
    }
</style>
