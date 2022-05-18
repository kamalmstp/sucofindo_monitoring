@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Weight
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('weight.store') }}" method="POST">
                @csrf
                <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Weight
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <x-input-horizontal type="text" field="vess" placeholder="Vessel" label="Vessel" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="comm" placeholder="Commodity" label="Commodity" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="quan" placeholder="Quantity" label="Quantity" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="ship" placeholder="Shipper" label="Shipper/Clients" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="buyer" placeholder="Buyer" label="Buyer/Consigne" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="place" placeholder="Place" label="Place Of Wieghing" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="date" field="date" placeholder="Date" label="Date" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="time" field="time" placeholder="Time" label="Time" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="time" field="until" placeholder="Until Time" label="Until Time" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="shore" placeholder="Shore" label="Shore" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="rep" placeholder="Inspector" label="Inspector/Surveyor" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="inso" placeholder="Representative" label="Representative" is-required="true"></x-input-horizontal>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Simpan</span>
                                    </button>
                                    <x-button-link extend-class="float-right" type="secondary"
                                                   link="{{ route('weight.index') }}" icon="chevron-left"
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
