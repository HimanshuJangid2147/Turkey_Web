@extends('admin.layouts.app')

@section('title', $slider ? 'Edit Hero Slider' : 'Create Hero Slider')

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Hero Slider /</span> {{ $slider ? 'Edit' : 'Create' }}
</h4>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            {{-- existing image preview --}}
            @if($slider && $slider->image)
            <div class="card-body">
                <img src="{{ asset($slider->image ? 'storage/' . $slider->image : 'images/Untitled.png') }}" alt="Hero Slider Image" class="img-fluid rounded" style="max-height: 50vh;">
            </div>
            @endif
            <h5 class="card-header">{{ $slider ? 'Edit' : 'Create' }} Hero Slider</h5>
            <div class="card-body">
                <form id="formHeroSlider" method="POST" action="{{ $slider ? route('admin.heroslider.update', $slider->id) : route('admin.heroslider.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if($slider)
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="heading" class="form-label">Heading</label>
                            <input class="form-control @error('heading') is-invalid @enderror" type="text" id="heading" name="heading" value="{{ old('heading', $slider ? $slider->title : '') }}" autofocus />
                            @error('heading')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="link" class="form-label">Link</label>
                            <input class="form-control @error('link') is-invalid @enderror" type="text" id="link" name="link" value="{{ old('link', $slider ? $slider->link : '') }}" />
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="pagename" class="form-label">Page Name</label>
                            <input class="form-control @error('pagename') is-invalid @enderror" type="text" id="pagename" name="pagename" value="{{ old('pagename', $slider ? $slider->pagename : '') }}" />
                            @error('pagename')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="active" {{ (old('status', $slider ? $slider->status : '') == 'active') ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ (old('status', $slider ? $slider->status : '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $slider ? $slider->description : '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" />
                            <p class="text-muted mb-0">Allowed JPG, PNG, GIF. Max size of 2MB</p>
                            {{-- current image preview --}}
                            @if($slider && $slider->image)
                            <img src="{{ asset($slider->image ? 'storage/' . $slider->image : 'images/Untitled.png') }}" alt="Hero Slider Image" class="img-fluid rounded" style="max-height: 20vh;">
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
