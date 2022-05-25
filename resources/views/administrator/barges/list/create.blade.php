@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Barges List
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('barges.list_save') }}" method="POST">
                @csrf

                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Barges List
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <input type="hidden" name="id_barges" value="{{ $barges->id }}">
                            <x-input-horizontal type="text" field="no_sublot" class="form-control" name="no_sublot" label="No. Sublo" placeholder="No. Sublot">
                            <x-input-horizontal type="text" field="incr_no" class="form-control" name="incr_no" label="Incr No" placeholder="Incr No" >
                            <x-input-horizontal type="date" field="date" class="form-control" name="date" label="Date" placeholder="Date" >
                            <x-input-horizontal type="time" field="time" class="form-control" name="time" label="Time" placeholder="Time" >
                            <x-input-horizontal type="text" field="trucks_number" class="form-control" name="trucks_number" label="Trucks Number" placeholder="Trucks Number" >
                            <x-input-horizontal type="text" field="gatm" class="form-control" name="gatm" label="GA/TM" placeholder="GA/TM" >
                            <x-input-horizontal type="text" field="size" class="form-control" name="size" label="Size" placeholder="Size" >
                            <x-input-horizontal type="text" field="seal_number" class="form-control" name="seal_number" label="Seal Number" placeholder="Seal Number" >
                            <x-input-horizontal type="text" field="remark" class="form-control" name="remark" label="Remark" placeholder="Remark" >

                            
                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                    <x-button-link extend-class="float-right" type="secondary"
                                                   link="{{ route('barges.index') }}" icon="chevron-left"
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
