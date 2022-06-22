@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
        Briefing Prosedur Dan K3
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('briefing.store') }}" method="POST">
                @csrf
                <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Briefing
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                        <x-input-horizontal type="date" field="tanggal" placeholder="Tanggal" label="Tanggal" is-required="true"></x-input-horizontal>
                        <x-input-horizontal type="time" field="jam" placeholder="Jam" label="Jam" is-required="true"></x-input-horizontal>
                        <x-input-horizontal type="text" field="lokasi_briefing" placeholder="Lokasi Briefing" label="Lokasi Briefing" is-required="true"></x-input-horizontal>
                        <x-input-horizontal type="text" field="lokasi_kerja" placeholder="Lokasi Pekerjaan" label="Lokasi Pekerjaan" is-required="true"></x-input-horizontal>

                            <div class="form-group row">
                                <label for="karyawan" class="col-sm-4">
                                    Pemberi Briefing
                                </label>
                                <div class="col-sm-7">
                                    <select class="custom-select" name="pemberi_briefing" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach($karyawan as $row)
                                            <option value="{{ $row->id }}">
                                                {{ $row->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                    <x-button-link extend-class="float-right" type="secondary"
                                                   link="{{ route('briefing.index') }}" icon="chevron-left"
                                                   text="Kembali"></x-button-link>
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
