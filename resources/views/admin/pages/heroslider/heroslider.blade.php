@extends('admin.layouts.app')
@section('title', 'Hero Slider')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Hero Slider</h5>
            <a href="{{ route('admin.heroslider.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table" id="heroslider-table">
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
                    {{-- @forelse($sliders as $index => $slider)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <img src="{{ asset($slider->image ? 'storage/' . $slider->image : 'images/Untitled.png') }}" alt="Hero Slider Image" height="80" width="160">
                        </td>
                        <td>
                            <span>{{ Str::words($slider->title, 2, '...') }}</span>
                        </td>
                        <td title="{{ $slider->description }}">{{ Str::words($slider->description, 2, '...') }}</td>
                        <td>
                            <form action="{{ route('admin.heroslider.toggle-status', $slider->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="badge bg-label-{{ $slider->status == 'active' ? 'primary' : 'secondary' }} me-1 border-0" style="background: none; cursor: pointer;">{{ ucfirst($slider->status) }}</button>
                            </form>
                        </td>
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
                    @endforelse --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{-- Add jQuery and DataTables JS to your layout's scripts stack --}}
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            $('#heroslider-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.heroslider.data') }}" , // Route to the 'data' method
                columns: [
                    // The 'data' key must match the JSON response from the controller
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'image', name: 'image', orderable: false, searchable: false },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description', orderable: false, searchable: false },
                    { data: 'status', name: 'status', orderable: false, searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush
