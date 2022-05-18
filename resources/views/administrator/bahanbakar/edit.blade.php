@extends('layouts.backend')

@section('content')
    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Bahan Bakar
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('bahanbakar.update', $bahanbakar->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Bahan Bakar
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <div class="form-group row">
                                <label for="driver" class="col-sm-4">
                                    Driver
                                </label>
                                <div class="col-sm-7">
                                    <select class="custom-select" name="driver" required>
                                        <option value="{{$bahanbakar->driver}}">{{$bahanbakar->driver}}</option>
                                        <option value="">-- Pilih Driver --</option>
                                        @foreach($driver as $row)
                                            <option value="{{ $row->full_name }}">
                                                {{ $row->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <x-input-horizontal type="number" value="{{ $bahanbakar->nominal }}" field="nominal" placeholder="Nominal BBM"
                                                label="Nominal" is-required="true"></x-input-horizontal>

                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-4">
                                    Keterangan
                                </label>
                                <div class="col-sm-7">
                                    <textarea name="keterangan" class="custom-file-label" cols="30" rows="5">{{ $bahanbakar->keterangan }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save mr-1"></i>
                                    <span>Simpan</span>
                                </button>
                                <x-button-link extend-class="float-right" type="secondary" link="{{ route('bahanbakar.index') }}" icon="chevron-left" text="Kembali"></x-button-link>
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
