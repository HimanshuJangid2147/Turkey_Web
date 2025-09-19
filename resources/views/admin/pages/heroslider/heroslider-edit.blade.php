@extends('admin.layouts.app')

@section('title', isset($slider) ? 'Edit Hero Slider' : 'Create Hero Slider')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Hero Slider /</span> {{ isset($slider) ? 'Edit' : 'Create' }}
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            {{-- existing image preview --}}
            @if(isset($slider) && $slider->image)
            <div class="card-body">
                <img src="{{ asset('images/' . $slider->image) }}" alt="Hero Slider Image" class="img-fluid rounded" style="max-height: 50vh;">
            </div>
            @endif
            <h5 class="card-header">{{ isset($slider) ? 'Edit' : 'Create' }} Hero Slider</h5>
            <div class="card-body">
                <form id="formHeroSlider" method="POST" action="{{ isset($slider) ? route('admin.heroslider.update', $slider->id) : route('admin.heroslider.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($slider))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="heading" class="form-label">Heading</label>
                    <input class="form-control" type="text" id="heading" name="heading" value="{{ old('heading', $slider->title ?? '') }}" autofocus />
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ (old('status', $slider->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ (old('status', $slider->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $slider->description ?? '') }}</textarea>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" />
                            <p class="text-muted mb-0">Allowed JPG, PNG, GIF. Max size of 2MB</p>
                            {{-- current image preview --}}
                            <img src="{{ asset('images/' . ($slider->image ?? 'Untitled.png')) }}" alt="Hero Slider Image" class="img-fluid rounded" style="max-height: 20vh;">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
