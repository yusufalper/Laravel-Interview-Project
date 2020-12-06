@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $person['name'] }}</div>

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
                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('msg_success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endif
                    <div>
                        <form action="{{ Route('pupdate', $person['id']) }}" class="border border-light p-5"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <label for="title">Person ID</label>: <label for="title">{{ $person['id'] }}</label><br>

                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control mb-4"
                                value="{{ $person['name'] }}">
                            <label for="lastname">Lastname</label>
                            <input type="text" id="lastname" name="lastname" class="form-control mb-4"
                                value="{{ $person['lastname'] }}">

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control mb-4"
                                value="{{ $person['email'] }}">

                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control mb-4"
                                value="{{ $person['phone'] }}">

                            <label for="company_id">Company</label>
                            <select class="form-control" name="company_id" id="company_id" style="margin-bottom: 10px;">
                                @foreach ($companies as $company)
                                @if ($person['company_id']==$company['id'])
                                <option selected value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                                @else
                                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                                @endif
                                @endforeach
                            </select>

                            <button class="btn btn-success btn-block sub_button" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection