@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready(function() {
    var table = $('#brief').DataTable( {
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    } );
} );
    </script>

    <!-- Page JS Code -->
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">
            Briefing Prosedur Dan K3
        </h2>
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-list"></i>
                    Briefing Prosedur Dan K3
                </h3>
                <div class="block-options">
                    <a href="{{ route('briefing.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table id="brief" class="table table-bordered table-striped responsive display nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Tanggal</th>
                        <th>Pemberi Briefing</th>
                        <th>Lokasi Pekerjaan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php $i=1;
                        @endphp
                        @foreach ($data as $row)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>
                                {{date('d, M Y', strtotime($row->tanggal))}} - Jam {{$row->jam}}
                            </td>
                            <td></td>
                            <td>
                                {{$row->lokasi_kerja}}
                            </td>
                            <td class="text-center">
                                <div class='btn-group'>
                                    <!-- <a href="{{ route('briefing.edit', $row->id) }}" class='btn btn-primary btn-sm'>
                                        <i class='fa fa-pencil-alt'></i>
                                    </a> -->
                                    <a href="{{ route('briefing.show', $row->id) }}" class='btn btn-success btn-sm'>
                                        <i class='fa fa-eye'></i>
                                    </a>
                                    <button type='button' class='btn btn-danger btn-sm'
                                    onclick="confirmDelete('administrator/master/briefing', '{{ $row->id }}')">
                                        <i class='fa fa-fw fa-trash'></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
