@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $com['name'] }}{{ __(' Company') }}</div>

                <div class="card-body">
                    @if (Session::has('msg_success'))
                    <div class="col-sm-12">
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('msg_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <div>
                        <form action="{{ Route('comupdate', $com['id']) }}" class="border border-light p-5"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <label for="title">Company ID</label>: <label for="title">{{ $com['id'] }}</label><br>

                            <label for="title">Company Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                value="{{ $com['name'] }}">

                            <label for="title">Internet Address</label>
                            <input type="text" id="internet_address" name="internet_address" class="form-control mb-4"
                                value="{{ $com['internet_address'] }}">

                            <div class="company_buttons">
                                    <a class="btn btn-secondary detail_button" href="{{ route('comshow',$com['id'])}}" role="button">See Company Addresses and
                                        Details</a>

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