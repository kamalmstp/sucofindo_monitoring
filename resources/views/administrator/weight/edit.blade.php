@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Weight
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('weight.update', $weight->id) }}" method="POST">
                @csrf
                 @method('PUT')
                <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Weight
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <!-- <input type="hidden" name="id" value="{{ $weight->id }}"> -->
                            <x-input-horizontal type="text" field="vess" placeholder="Vessel" label="Vessel" value="{{ $weight->vess }}" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="comm" placeholder="Commodity" value="{{ $weight->comm }}" label="Commodity" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="quan" placeholder="Quantity" value="{{ $weight->quan }}" label="Quantity" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="ship" placeholder="Shipper" value="{{ $weight->ship }}" label="Shipper/Clients" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="buyer" placeholder="Buyer" value="{{ $weight->buyer }}" label="Buyer/Consigne" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="place" placeholder="Place" value="{{ $weight->place }}" label="Place Of Wieghing" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="date" field="date" placeholder="Date" value="{{ $weight->date }}" label="Date" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="time" field="time" placeholder="Time" value="{{ $weight->time }}" label="Time" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="time" field="until" placeholder="Until Time" value="{{ $weight->until }}" label="Until Time" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="shore" placeholder="Shore" value="{{ $weight->shore }}" label="Shore" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="rep" placeholder="Inspector" value="{{ $weight->rep }}" label="Inspector/Surveyor"></x-input-horizontal>
                            <x-input-horizontal type="text" field="insp" placeholder="Representative" value="{{ $weight->insp }}" label="Representative"></x-input-horizontal>

                            <div class="form-group row">
                                <div class="col-sm-7 offset-sm-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save mr-1"></i>
                                        <span>Update</span>
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
