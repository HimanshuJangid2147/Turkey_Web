@extends('admin.layouts.app')
@section('title', 'Admin Profile')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                {{-- Profile Header Card --}}
                <div class="card border-0 shadow-lg mb-4">
                    <div class="card-body text-center bg-dark text-white rounded">
                        <h4 class="card-title mb-1">Admin User</h4>
                        <p class="text-light mb-0">admin@example.com</p>
                        <span class="badge bg-secondary mt-2">Administrator</span>
                    </div>
                </div>

                {{-- Profile Information Card --}}
                <div class="card border-0 shadow mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="bi bi-person-circle me-2"></i>{{ __('Profile Information') }}</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-fill text-dark me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Full Name</small>
                                        <strong class="text-dark">Admin User</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope-fill text-dark me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Email</small>
                                        <strong class="text-dark">admin@example.com</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-at text-dark me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Username</small>
                                        <strong class="text-dark">adminuser</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill text-success me-3"></i>
                                    <div>
                                        <small class="text-muted d-block">Email Verified</small>
                                        <strong class="text-dark">Verified</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil-square me-1"></i>Edit Profile
                        </button>
                    </div>
                </div>

                {{-- Change Password Card --}}
                <div class="card border-0 shadow">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0"><i class="bi bi-shield-lock me-2"></i>{{ __('Change Password') }}</h5>
                    </div>
                    <div class="card-body bg-light">
                        <form method="POST" action="#" id="changePasswordForm">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="current_password" class="form-label text-dark">
                                        <i class="bi bi-key-fill text-warning me-1"></i>{{ __('Current Password') }}
                                    </label>
                                    <input id="current_password" type="password" class="form-control border-dark" name="current_password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="new_password" class="form-label text-dark">
                                        <i class="bi bi-lock-fill text-success me-1"></i>{{ __('New Password') }}
                                    </label>
                                    <input id="new_password" type="password" class="form-control border-dark" name="new_password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="new_password_confirmation" class="form-label text-dark">
                                        <i class="bi bi-lock-fill text-success me-1"></i>{{ __('Confirm New Password') }}
                                    </label>
                                    <input id="new_password_confirmation" type="password" class="form-control border-dark" name="new_password_confirmation" required>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-dark">
                                    <i class="bi bi-check-circle me-2"></i>{{ __('Change Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Profile Modal --}}
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label text-dark">Name</label>
                            <input type="text" class="form-control border-dark" id="name" name="name" value="Admin User">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <input type="email" class="form-control border-dark" id="email" name="email" value="admin@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label text-dark">Username</label>
                            <input type="text" class="form-control border-dark" id="username" name="username" value="adminuser">
                        </div>
                        <button type="submit" class="btn btn-dark">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
