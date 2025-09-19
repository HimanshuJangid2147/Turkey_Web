@extends('admin.layouts.app')

@section('title', 'View Hero Slider')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Hero Slider /</span> View
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">Hero Slider Details</h5>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <div>
                        <img src="{{ asset($slider->image ? 'storage/' . $slider->image : 'images/Untitled.png') }}" alt="Hero Slider Image" class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <p class="form-control-plaintext">{{ $slider->title }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <p class="form-control-plaintext">{{ $slider->description }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <p class="form-control-plaintext"><span class="badge bg-label-{{ $slider->status == 'active' ? 'primary' : 'secondary' }}">{{ ucfirst($slider->status) }}</span></p>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
