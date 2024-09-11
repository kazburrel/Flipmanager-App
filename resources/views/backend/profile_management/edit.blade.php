@extends('backend.layouts.index')
@section('content')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Profile Details</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details" class="collapse show">
            <form id="kt_account_profile_details_form" class="form" action="{{ route('user.profile.edit') }}"
                enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-6 fv-row">
                                    <input type="text" name="fname"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="First name" value=" {{ old('fname', $user->fname) }}" />
                                    @error('fname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 fv-row">
                                    <input type="text" name="lname"
                                        class="form-control form-control-lg form-control-solid" placeholder="Last name"
                                        value="{{ old('lname', $user->lname) }}" />
                                    @error('lname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Username</label>
                        <div class="col-lg-8 fv-row">
                            <input type="text" name="username" class="form-control form-control-lg form-control-solid"
                                placeholder="Username" value="{{ old('username', $user->username) }}" disabled />
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                placeholder="Email" value="{{ old('email', $user->email) }}" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
            data-bs-target="#kt_account_password_details" aria-expanded="true" aria-controls="kt_account_password_details">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">Change Password</h3>
            </div>
        </div>
        <div id="kt_account_password_details" class="collapse show">
            <form method="POST" action="{{ route('user.profile.updatePassword') }}" class="form">
                @csrf
                @method('PUT')
                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Current Password</label>
                        <div class="col-lg-8 fv-row">
                            <input type="password" name="current_password"
                                class="form-control form-control-lg form-control-solid" placeholder="Current Password" />
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">New Password</label>
                        <div class="col-lg-8 fv-row">
                            <input type="password" name="new_password"
                                class="form-control form-control-lg form-control-solid" placeholder="New Password" />
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Confirm New Password</label>
                        <div class="col-lg-8 fv-row">
                            <input type="password" name="new_password_confirmation"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Confirm New Password" />
                            @error('new_password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary" id="kt_account_password_details_submit">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
