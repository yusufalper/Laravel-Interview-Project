@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Company') }}</div>

                <div class="card-body">
                    <div>
                        <form action="{{ Route('comadd') }}" class="border border-light p-5"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="name">Company Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                placeholder="Company Name">

                            <label for="internet_address">Internet Address</label>
                            <input type="text" id="internet_address" name="internet_address" class="form-control mb-4"
                                placeholder="Company Internet Address">

                                <button class="btn btn-success btn-block sub_button" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection