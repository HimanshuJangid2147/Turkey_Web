@extends('admin.layouts.app')
@section('title', 'Hero Slider')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Hero Slider</h5>
            <a href="{{ route('admin.heroslider.create') }}" class="btn btn-primary">Add New</a>
        </div>
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
                    @forelse($sliders as $index => $slider)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset('images/' . ($slider->image ?? 'Untitled.png')) }}" alt="Hero Slider Image" height="80" width="160">
                        </td>
                        <td>
                            <span>{{ $slider->title }}</span>
                        </td>
                        <td title="{{ $slider->description }}">{{ \Illuminate\Support\Str::words($slider->description, 8, '...') }}</td>
                        <td><span class="badge bg-label-{{ $slider->status == 'active' ? 'primary' : 'secondary' }} me-1">{{ ucfirst($slider->status) }}</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="icon-base bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('admin.heroslider.edit', $slider->id) }}"><i
                                            class="icon-base bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('admin.heroslider.view', $slider->id) }}"><i
                                            class="icon-base bx bx-detail me-1"></i> View</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                            class="icon-base bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hero sliders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
