@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $company['name'] }}{{ __(' Company') }}</div>

                <div class="card-body">

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
                    <div>
                        <form action="{{ Route('comupdate', $company['id']) }}" class="border border-light p-5"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <label for="title">Company ID</label>: <label for="title">{{ $company['id'] }}</label><br>

                            <label for="title">Company Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                value="{{ $company['name'] }}">

                            <label for="title">Internet Address</label>
                            <input type="text" id="internet_address" name="internet_address" class="form-control mb-4"
                                value="{{ $company['internet_address'] }}">

                            <div class="company_buttons">
                                <a class="btn btn-secondary detail_button" href="{{ route('comshow',$company['id'])}}"
                                    role="button">See Company Addresses and
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