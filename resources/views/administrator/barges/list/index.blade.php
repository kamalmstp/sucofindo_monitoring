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
    var table = $('#barges').DataTable( {
        
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
                    <a href="{{route('barges.index')}}" class="btn btn-sm btn-secondary">
                        <i class="fa fa-backward"></i>
                        <span> Kembali</span>
                    </a>
                </div>
                <div class="block-options">
                    <a href="/administrator/master/barges-cetak/{{ $barges->id }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fa fa-print"> </i>
                        <span> Cetak</span>
                    </a>
                </div>
            </div>
            <div class="block-content">
                <h2 class="text-center">BARGES INFO</h2>
                <p>
                <table border="0" width="100%">
					<tbody><tr>
						<td width="20%">VESSEL</td>
						<td> : </td>
						<td>{{ $barges->vessel }} </td>
					</tr>
					<tr>
						<td>DATE</td>
						<td>:    </td>
						<td>{{ $barges->date }} </td>
					</tr>
					<tr>
						<td>PLACE</td>
						<td>:    </td>
						<td>{{ $barges->place }} </td>
					</tr>
					<tr>
						<td>CUSTOMER</td>
						<td>:    </td>
						<td>{{ $barges->customer }} </td>
					</tr>
					<tr>
						<td>QUANTITY</td>
						<td>:    </td>
						<td>{{ $barges->quantity }} </td>
					</tr>
					<tr>
						<td>INCREMENT NUMB </td>
						<td>:    </td>
						<td>{{ $barges->increment_numb }}</td>
					</tr>
					<tr>
						<td>TYPE OF COAL</td>
						<td>:    </td>
						<td>{{ $barges->type_of_coal }}</td>
					</tr>
					<tr>
						<td>SAMPLING METHOD</td>
						<td>:    </td>
						<td>{{ $barges->sampling_method }}</td>
					</tr>
					<tr>
						<td>REFERENCE</td>
						<td>:    </td>
						<td>{{ $barges->reference }}</td>
					</tr>
					
					</tbody></table>
                </p>
            </div>
        </div>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <i class="fa fa-fw fa-list"></i>
                    Data Barge List
                </h3>
                <div class="block-options">
                    <!-- <button type="button" class="btn btn-sm btn-primary" onclick="addBarges()">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </button> -->
                    <button type="button" class="btn btn-alt-primary push" data-bs-toggle="modal" data-bs-target="#add_barges_list"><i class="fa fa-plus"></i> Tambah Data</button>
                    
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
                                    <input type="hidden" name="id_barges" value="{{ $barges->id }}">
                                    <input type="text" class="form-control" name="no_sublot" value="{{ old('no_sublot') }}" placeholder="No. Sublot" autocomplete="off">

                                    @error('no_sublot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="incr_no" placeholder="Incr No" value="{{ old('incr_no') }}">

                                    @error('incr_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="date" class="form-control" name="date" placeholder="Date" value="{{ old('date') }}">

                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="time" class="form-control" name="time" placeholder="Time" value="{{ old('time') }}">

                                    @error('time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="trucks_number" placeholder="Trucks Number" value="{{ old('trucks_number') }}">

                                    @error('trucks_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="gatm" placeholder="GA/TM" value="{{ old('gatm') }}">

                                    @error('gatm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="size" placeholder="Size" value="{{ old('size') }}">

                                    @error('size')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="seal_number" placeholder="Seal Number" value="{{ old('seal_number') }}">

                                    @error('seal_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="remark" placeholder="Remark" value="{{ old('remark') }}">

                                    @error('remark')
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
                <table id="barges" class="table table-bordered table-striped responsive display" cellspacing="0" width="100%">
                    <thead class="text-center">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>No Sublot</th>
                        <th>Incr No</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Trucks Number</th>
                        <th>GA/TM</th>
                        <th>Size</th>
                        <th>Seal Number</th>
                        <th>Remark</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $i=1;
                        @endphp
                        @foreach ($bargeslist as $row)
                        <tr>
                            <td>
                                {{ $i++ }}
                            </td>
                            <td>{{$row->no_sublot}}</td>
                            <td>{{$row->incr_no}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->time}}</td>
                            <td>{{$row->trucks_number}}</td>
                            <td>{{$row->gatm}}</td>
                            <td>{{$row->size}}</td>
                            <td>{{$row->seal_number}}</td>
                            <td>{{$row->remark}}</td>
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-danger btn-sm'
                                    onclick="confirmDelete('administrator/master/barges/list_del', '{{ $row->id }}')">
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

    <div class="modal" id="add_barges_list" tabindex="-1" role="dialog" aria-labelledby="add_barges_list" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal Title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-1">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
        </div>
      </div>
    </div>
  </div>
@endsection
