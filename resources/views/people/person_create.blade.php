@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Person') }}</div>

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

                <div class="card-body">
                    <div>
                        <form action="{{ Route('padd') }}" class="border border-light p-5" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                placeholder="Person Name">
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control mb-4"
                                placeholder="Person Lastame">

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control mb-4"
                                placeholder="Person Email">

                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control mb-4"
                                placeholder="Phone Number">

                            <label for="company_id">Company</label>
                            <select class="form-control" name="company_id" id="company_id" style="margin-bottom: 10px;">
                                @foreach ($companies as $company)
                                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                                @endforeach
                            </select>

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