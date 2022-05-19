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
    var table = $('#weight').DataTable( {
        
        responsive: true
    } );
} );
    </script>

    <!-- Page JS Code -->
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <!-- <h2 class="content-heading">
            
        </h2> -->
        <!-- Dynamic Table with Export Buttons -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <div class="block-title">
                    <a href="{{route('weight.index')}}" class="btn btn-sm btn-secondary">
                        <i class="fa fa-backward"> </i>
                        <span> Kembali</span>
                    </a>
                </div>
                <div class="block-options">
                    <a href="/administrator/master/weight-cetak/{{ $weight->id }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fa fa-print"> </i>
                        <span> Cetak</span>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <h2 class="text-center">WEIGHT INFO</h2>
                <p>
                <table border="0" width="100%">
					<tbody><tr>
						<td width="20%">VESSEL</td>
						<td> : </td>
						<td>{{ $weight->vess }} </td>
					</tr>
					<tr>
						<td>COMMODITY</td>
						<td>:    </td>
						<td>{{ $weight->comm }} </td>
					</tr>
					<tr>
						<td>QUANTITY</td>
						<td>:    </td>
						<td>{{ $weight->quan }} </td>
					</tr>
					<tr>
						<td>SHIPPERS/CLIENTS</td>
						<td>:    </td>
						<td>{{ $weight->ship }} </td>
					</tr>
					<tr>
						<td>BUYER/CONSIGNEE</td>
						<td>:    </td>
						<td>{{ $weight->buyer }} </td>
					</tr>
					<tr>
						<td>PLACE OF WIEGHING</td>
						<td>:    </td>
						<td>{{ $weight->place }}</td>
					</tr>
					<tr>
						<td>DATE OF WIEGHING</td>
						<td>:    </td>
						<td>{{ $weight->date }}</td>
					</tr>
					<tr>
						<td>TIME</td>
						<td>:    </td>
						<td>{{ $weight->time }} - {{ $weight->until }}</td>
					</tr>
					<tr>
						<td>SHORE TANK NO.</td>
						<td>:    </td>
						<td>{{ $weight->shore }}</td>
					</tr>
					
					</tbody></table>
                </p>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-list"></i>
                    Data Weight List
                </h3>
                <div class="block-options">
                    <button type="button" class="btn btn-sm btn-primary" onclick="addWeight()">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </button>
                </div>
            </div>

            <!-- Tambah Data -->
            <div class="overflow-hidden" style="padding-left: 1.25rem;padding-right: 1.25rem;margin-bottom: 0;padding-top: 1.25rem;">
                <div id="dm-add-server" class="block block-rounded bg-body-dark animated fadeIn @if($errors->has('no_sublot') || $errors->has('incr_no')) @else d-none @endif">
                    <div class="block-header bg-white-25">
                        <h3 class="block-title">Tambah Data</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option">
                                <i class="si si-question"></i>
                            </button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="#" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row gutters-tiny mb-0 items-push">
                                <div class="col-md-2">
                                    <input type="hidden" name="id_weight" value="{{ $weight->id }}">
                                    <input type="text" class="form-control" name="no_reg" value="{{ old('no_reg') }}" placeholder="No. Register" autocomplete="off">

                                    @error('no_reg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="gross" placeholder="Gross" value="{{ old('gross') }}">

                                    @error('gross')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="tare" placeholder="Tare" value="{{ old('tare') }}">

                                    @error('tare')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="net" placeholder="Net" value="{{ old('net') }}">

                                    @error('net')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <table id="weight" class="table table-bordered table-striped responsive display" cellspacing="0" width="100%">
                    <thead class="text-center">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>Truck's Registered No</th>
                        <th>Weight Of Truck Plus Cargo in KG (Gross)</th>
                        <th>Weight Of Empty Truck in KG (Tare)</th>
                        <th>Weight Of Cargo in KG (Net)</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $i=1;
                        @endphp
                        @foreach ($weightlist as $row)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>{{$row->no_reg}}</td>
                            <td>{{$row->gross}}</td>
                            <td>{{$row->tare}}</td>
                            <td>{{$row->net}}</td>
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-danger btn-sm'
                                    onclick="confirmDelete('administrator/master/weight/list_del', '{{ $row->id }}')">
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
