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
                    url: $('#heroslider-table').data('url'),
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
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
