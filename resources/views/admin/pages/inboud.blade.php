@extends('admin.layouts.app')
@section('title', 'Inbound Tours')
@section('content')
        <div class="card">
        <h5 class="card-header">Inbound Tours</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>Image</th>
                        <th>Heading</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>1</td>
                        <td>
                            <img src={{ asset('images/Untitled.png') }} alt="Hero Slider Image" height="80" width="160">
                        </td>
                        <td>
                            <i class="icon-base bx bxl-angular icon-md text-danger me-4"></i> <span>Angular Project</span>
                        </td>
                        <td>Albert Cook</td>
                        <td><span class="badge bg-label-primary me-1">Active</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href={{ route('admin.heroslider.edit') }}><i
                                            class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href={{ route('admin.heroslider.view') }}><i
                                            class="icon-base bx bx-detail me-1"></i> View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="icon-base bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
