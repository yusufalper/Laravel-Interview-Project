@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $address['id']." Adress" }}</div>

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
                        <form action="{{ Route('adrupdate', $address['id']) }}" class="border border-light p-5"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}

                            <label for="title">Address ID</label>: <label for="title">{{ $address['id'] }}</label><br>

                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="form-control mb-4"
                                value="{{ $address['latitude'] }}">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="form-control mb-4"
                                value="{{ $address['longitude'] }}">

                            <label for="company_id">Company</label>
                            <select class="form-control" name="company_id" id="company_id" style="margin-bottom: 10px;">
                                @foreach ($comps as $com)
                                @if ($address['company_id']==$com['id'])
                                <option selected value="{{ $com['id'] }}">{{ $com['name'] }}</option>
                                @else
                                <option value="{{ $com['id'] }}">{{ $com['name'] }}</option>
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