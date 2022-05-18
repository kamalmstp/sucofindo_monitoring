@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Pengiriman
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('driver.pengiriman.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Pengiriman
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <x-input-horizontal type="text" field="driver" readonly label="driver" value="{{ auth()->user()->full_name }}" is-read-only="true"></x-input>
                            <input type="hidden" name="id_user" label="id_user" value="{{ auth()->user()->id }}"></input>

                            <x-input-horizontal type="date" field="complete" label="Complete Sampel"></x-input-horizontal>
                            <x-input-horizontal type="time" field="jam_complete" label="Jam Complete"></x-input-horizontal>
                            <x-input-horizontal type="date" field="kirim" label="Kirim Sampel"></x-input-horizontal>
                            <x-input-horizontal type="time" field="jam_kirim" label="Jam Kirim"></x-input-horizontal>
                            <x-input-horizontal type="text" field="nama_barge" placeholder="Masukkan nama barge"
                                                label="Nama Barge" is-required="true"></x-input-horizontal>

                            <div class="form-group row">
                                <label for="foto_barge" class="col-sm-4">
                                    Foto Barge
                                </label>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled"
                                               data-toggle="custom-file-input" id="dm-profile-edit-avatar"
                                               name="foto_barge" accept="image/*">
                                        <label class="custom-file-label" for="dm-profile-edit-avatar">Pilih
                                            gambar</label>
                                    </div>

                                </div>
                            </div>

                            <x-input-horizontal type="text" field="keterangan" placeholder="keterangan"
                                                label="Keterangan"></x-input-horizontal>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                    <x-button-link extend-class="float-right" type="secondary"
                                                   link="{{ route('driver.pengiriman.index') }}" icon="chevron-left"
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
