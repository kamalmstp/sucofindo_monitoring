@extends('layouts.backend')

@section('css_before')
    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">

    <link rel="stylesheet" href="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">

@endsection

@section('js_after')
    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>
@endsection

@section('content')

<div class="content">
    <h2 class="content-heading">Briefing Prosedur Dan K3</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">Detail</h3>
                    <div class="block-options">
                        <a href="/administrator/master/briefing/cetak/{{$id_brief}}" target="_blank" class="btn btn-sm btn-info">
                            <i class="fa fa-print"> </i>
                            <span> Cetak</span>
                        </a>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-borderless">
                        <tr>
                            <td width="30%">Pemberi Briefing</td>
                            <td width="3%">:</td>
                            <td><strong>{{$brief->nama}}</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Tanggal</td>
                            <td width="3%">:</td>
                            <td><strong>{{$brief->tanggal}}</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Jam</td>
                            <td width="3%">:</td>
                            <td><strong>{{$brief->jam}}</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Lokasi Briefing</td>
                            <td width="3%">:</td>
                            <td><strong>{{$brief->lokasi_briefing}}</strong></td>
                        </tr>
                        <tr>
                            <td width="30%">Lokasi Pekerjaan</td>
                            <td width="3%">:</td>
                            <td><strong>{{$brief->lokasi_kerja}}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">List Pegawai</h3>
                    <div class="block-options">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addPegawai">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="9%">#</th>
                                <th>Nama Pegawai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $det)
                            <tr>
                                <td></td>
                                <td>{{$det->nama}}</td>
                                <td>
                                    <button type='button' class='btn btn-danger btn-sm'
                                    onclick="confirmDelete('administrator/master/briefing/detail', '{{ $det->detail }}')">
                                        <i class='fa fa-fw fa-trash'></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addPegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{ route('briefing.store_pegawai') }}" method="POST">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
            <label for="karyawan" class="col-sm-4">
                Karyawan
            </label>
            <div class="col-sm-7">
                <input type="hidden" name="id_briefing" value="{{$id_brief}}" id="">
                <select class="custom-select" name="id_karyawan" required>
                    <option value="">-- Pilih --</option>
                    @foreach($karyawan as $row)
                        <option value="{{ $row->id }}">
                            {{ $row->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
