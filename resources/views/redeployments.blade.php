@extends('layouts.app', ['title' => 'Redeployments'])

@section('content')
<div class="my-content-wrapper">
        <div class="content-container">
            <div class="sectionWrap">
                {{-- SALES HEADING --}}
                <h6 class="center sectionHeading">PERSONNEL REDEPLOYMENT - All RECORDS</h6>

                {{-- SALES TABLE --}}
                <div class="sectionTableWrap z-depth-1">
                    <table class="table centered table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Fullname</th>
                                <th>Service No</th>
                                <th>File No</th>
                                <th>Rank</th>
                                <th>From (Formation)</th>
                                <th>To (Formation)</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer z-depth-1">
            <p>&copy; NSCDC ICT & Cybersecurity Department</p>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
        $(function() {
            $('#users-table').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                processing: true,
                serverSide: true,
                ajax:  `{!! route('redeployment_get_all') !!}`,
                columns: [
                    {
                        "data": "id",
                        "title": "SN",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }, "orderable": false, "searchable": false
                    },
                    { data: 'fullname', name: 'fullname' },
                    { data: 'service_number', name: 'service_number'},
                    { data: 'file_number', name: 'file_number'},
                    { data: 'rank', name: 'rank'},
                    { data: 'from', name: 'from'},
                    { data: 'to', name: 'to'},
                    { data: 'view', name: 'view', "orderable": false, "searchable": false}
                ]
            });
            $('.dataTables_length > label > select').addClass('browser-default');
        });
    </script>

@endpush