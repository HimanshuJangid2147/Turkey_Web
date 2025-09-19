@extends('admin.layouts.app')

@section('title', 'Account Settings')

@push('scripts')
    <script src="{{ asset('admin_assets/assets/js/pages-account-settings-account.js') }}"></script>
@endpush

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Account Settings /</span> Account
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            {{-- <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="{{ asset('admin_assets/assets/img/avatars/1.png') }}" alt="user-avatar"
                        class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div> --}}
            <hr class="my-0" />
            <div class="card-body">
                <form id="formAccountSettings" method="POST" action="#">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">Full Name</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ $adminUser->name }}"
                                autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ $adminUser->username }}" />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ $adminUser->email }}"
                                placeholder="john.doe@example.com" />
                        </div>
                         <div class="mb-3 col-md-6">
                            <label for="email_verified" class="form-label">Email Status</label>
                             <input type="text" class="form-control" id="email_verified" name="email_verified" value="{{ $adminUser->email_verified_at ? 'Verified' : 'Not Verified' }}" readonly/>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
            </div>

        <div class="card mb-4">
             <h5 class="card-header">Change Password</h5>
             <div class="card-body">
                 <form method="POST" action="#" id="changePasswordForm">
                     @csrf
                     <div class="row">
                         <div class="mb-3 col-12 form-password-toggle">
                             <label class="form-label" for="current_password">Current Password</label>
                             <div class="input-group input-group-merge">
                                 <input type="password" name="current_password" class="form-control" id="current_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                 <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                         </div>
                         <div class="mb-3 col-md-6 form-password-toggle">
                             <label class="form-label" for="new_password">New Password</label>
                             <div class="input-group input-group-merge">
                                <input class="form-control" type="password" id="new_password" name="new_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                             </div>
                         </div>
                         <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                             <div class="input-group input-group-merge">
                                <input class="form-control" type="password" name="new_password_confirmation" id="new_password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"/>
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                         </div>
                     </div>
                     <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Change Password</button>
                     </div>
                 </form>
             </div>
        </div>
    </div>
</div>
@endsection
