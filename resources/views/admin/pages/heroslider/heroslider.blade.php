@extends('admin.layouts.app')
@section('title', 'Hero Slider')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Hero Slider</h5>
            <a href="{{ route('admin.heroslider.create') }}" class="btn btn-primary" style="margin-left: 10px;">Add New</a>
        </div>
        <div class="table-responsive m-5" style="overflow-x:auto;">
            <table class="table table-striped table-bordered" id="heroslider-table" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Sr No</th>
                    <th>Image</th>
                    <th>Heading</th>
                    <th>Description</th>
                    <th>Link</th>
                    <th>Page Name</th>
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
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" />

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $('#heroslider-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.heroslider.data') }}",
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    // error: function(xhr, error, thrown) {
                    //     console.error('Datatable AJAX error:', error);
                    //     console.error('Response text:', xhr.responseText);
                    // }
                },
                columns: [
                    // The 'data' key must match the JSON response from the controller
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var baseUrl = '{{ url('/') }}';
                            var imageUrl = data ? baseUrl + '/storage/' + data : baseUrl + '/images/Untitled.png';
                            return '<img src="' + imageUrl + '" alt="Hero Slider Image" height="80" width="160">';
                        }
                    },
                    {
                        data: 'title',
                        name: 'title',
                        render: function(data, type, row) {
                            return '<span>' + data + '</span>';
                        }
                    },
                    {
                        data: 'description',
                        name: 'description',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<span title="' + row.description + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'link',
                        name: 'link',
                        render: function(data, type, row) {
                            return data ? data : '';
                        }
                    },
                    {
                        data: 'pagename',
                        name: 'pagename',
                        render: function(data, type, row) {
                            return data ? data : '';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var route = '{{ route('admin.heroslider.toggle-status', ':id') }}'.replace(':id', row.id);
                            var csrf = '{{ csrf_token() }}';
                            var method = '{{ method_field('PATCH') }}';
                            var className = data == 'active' ? 'primary' : 'secondary';
                            var text = data.charAt(0).toUpperCase() + data.slice(1);
                            return '<form action="' + route + '" method="POST" style="display: inline;">' +
                                '<input type="hidden" name="_token" value="' + csrf + '">' +
                                '<input type="hidden" name="_method" value="PATCH">' +
                                '<button type="submit" class="badge bg-label-' + className + ' me-1 border-0" style="background: none; cursor: pointer;">' + text + '</button>' +
                                '</form>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            var editUrl = '{{ route('admin.heroslider.edit', ':id') }}'.replace(':id', data);
                            var viewUrl = '{{ route('admin.heroslider.view', ':id') }}'.replace(':id', data);
                            var deleteUrl = '{{ route('admin.heroslider.destroy', ':id') }}'.replace(':id', data);
                            var csrf = '{{ csrf_token() }}';
                            var method = '{{ method_field('DELETE') }}';
                            return '<a href="' + editUrl + '" class="d-inline-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;" title="Edit"><i class="icon-base bx bx-edit-alt"></i></a>' +
                                '<a href="' + viewUrl + '" class="d-inline-flex align-items-center justify-content-center me-2" style="width: 24px; height: 24px;" title="View"><i class="icon-base bx bx-detail"></i></a>' +
                                '<form action="' + deleteUrl + '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this slider?\');" style="display: inline;">' +
                                '<input type="hidden" name="_token" value="' + csrf + '">' +
                                '<input type="hidden" name="_method" value="DELETE">' +
                                '<button type="submit" class="btn btn-link p-0 m-0 align-baseline d-inline-flex align-items-center justify-content-center" title="Delete" style="border:none; background:none; padding:0; cursor:pointer; width: 24px; height: 24px;">' +
                                '<i class="icon-base bx bx-trash"></i>' +
                                '</button>' +
                                '</form>';
                        }
                    }
                ]
            });
        });
    </script>
@endpush
