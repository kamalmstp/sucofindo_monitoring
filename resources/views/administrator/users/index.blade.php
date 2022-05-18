@extends('layouts.backend')

@section('css_before')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
@endsection

@section('js_after')
    <!-- Page JS Plugins -->
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page JS Code -->
    
    <!--<script src="https://code.jquery.com/jquery-3.5.1.js"></script>-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
    <script>
        jQuery(function () {

            const usersData = jQuery("#users").DataTable({
                ajax: {
                    url: "{{ route('api.users.data') }}",
                    data: function (d) {
                        d.level = jQuery("#filter-level").val();
                    }
                },
                serverSide: true,
                processing: true,
                iDisplayLength: 5,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
                columns: [
                    {
                        data: 'avatar',
                        name: "Avatar",
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'full_name',
                    },
                    {
                        data: 'username',
                    },
                    {
                        data: 'email',
                    },
                    {
                        data: 'level',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                    },
                ],
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true
            });

            let filterByUserLevel = `<label class="ml-4" for="filter-level">Filter :</label><select id='filter-level' class='ml-2 form-control'><option value='all'>-- Semua Pengguna --</option>`;
            @foreach(userLevel() as $key => $value)
                filterByUserLevel += `<option value='{{ $key }}'>{{ $value }}</option>`;
            @endforeach
                filterByUserLevel += `</select>`;

            jQuery("#users_length").append(filterByUserLevel);

            jQuery("#filter-level").change(function (){
                usersData.draw()
            });
        });
    </script>
@endsection

@section('content')

    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Data Pengguna</h2>
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-user-lock text-muted mr-1"></i>
                    Daftar Akun Pengguna Sistem
                </h3>
                <div class="block-options">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter" id="users">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">
                            <i class="fa fa-user"></i>
                        </th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Hak Akses</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->
@endsection
