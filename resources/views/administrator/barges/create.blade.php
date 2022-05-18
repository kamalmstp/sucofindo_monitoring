@extends('layouts.backend')

@section('content')


    <!-- Page Content -->
    <div class="content content-full">
        <h2 class="content-heading">
            Data Barges
        </h2>
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('barges.store') }}" method="POST">
                @csrf
                <!-- User Profile -->
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-users text-muted mr-1"></i> Form Barges
                    </h2>
                    <div class="row push">
                        <div class="col-lg-6 col-xl-6">

                            <x-input-horizontal type="text" field="vessel" placeholder="Vessel" label="Vessel" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="date" field="date" placeholder="Date" label="Date" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="place" placeholder="Place" label="Place" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="customer" placeholder="Customer" label="Customer" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="quantity" placeholder="Quantity" label="Quantity" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="increment_numb" placeholder="Increment Numb" label="Increment Numb" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="type_of_coal" placeholder="Type Of Coal" label="Type Of Coal" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="sampling_method" placeholder="Sampling Method" label="Sampling Method" is-required="true"></x-input-horizontal>
                            <x-input-horizontal type="text" field="reference" placeholder="Reference" label="Reference"></x-input-horizontal>
                            <x-input-horizontal type="text" field="foreman" placeholder="Foreman" label="Foreman"></x-input-horizontal>
                            
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
