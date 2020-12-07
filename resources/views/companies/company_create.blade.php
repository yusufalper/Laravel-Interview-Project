@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Company') }}</div>

                @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endforeach
                @endif

                @if (Session::has('msg_success'))
                <div class="col-sm-12">
                    <div class="alert  alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('msg_success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <div>
                        <form action="{{ Route('comadd') }}" class="border border-light p-5" method="POST"
                            enctype="multipart/form-data">
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