@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Pengiriman
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('pengiriman.update', $pengiriman->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Pengiriman
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <div class="form-group row">
                                <label for="driver" class="col-sm-4">
                                    Driver
                                </label>
                                <div class="col-sm-7">
                                    <select class="custom-select" name="driver" required>
                                        <option value="{{$pengiriman->driver}}">{{$pengiriman->driver}}</option>
                                        <option value="">-- Pilih Driver --</option>
                                        @foreach($driver as $row)
                                            <option value="{{ $row->full_name }}">
                                                {{ $row->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <x-input-horizontal type="date" field="complete" value="{{ $pengiriman->complete_sampel }}" label="Complete Sampel"></x-input-horizontal>
                            <x-input-horizontal type="time" field="jam_complete" value="{{ $pengiriman->jam_complete }}" label="Jam Complete"></x-input-horizontal>
                            <x-input-horizontal type="date" field="kirim" value="{{ $pengiriman->kirim }}" label="Kirim Sampel"></x-input-horizontal>
                            <x-input-horizontal type="time" field="jam_kirim" value="{{ $pengiriman->jam_kirim }}" label="Jam Kirim"></x-input-horizontal>
                            <x-input-horizontal type="text" field="nama_barge" value="{{ $pengiriman->nama_barge }}" placeholder="Masukkan nama barge"
                                                label="Nama Barge" is-required="true"></x-input-horizontal>

                            <x-input-horizontal type="text" field="keterangan" value="{{ $pengiriman->keterangan }}" placeholder="keterangan"
                                                label="Keterangan"></x-input-horizontal>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>
                                    <span>Simpan</span>
                                </button>
                                <x-button-link extend-class="float-right" type="secondary" link="{{ route('pengiriman.index') }}" icon="chevron-left" text="Kembali"></x-button-link>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- END User Profile -->
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
