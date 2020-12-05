@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('New Address') }}</div>

                <div class="card-body">
                    <div>
                        <form action="{{ Route('adradd') }}" class="border border-light p-5" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="form-control mb-4"
                                placeholder="Latitude Value">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="form-control mb-4"
                                placeholder="Longitude Value">

                            <label for="company_id">Company</label>
                            <select class="form-control" name="company_id" id="company_id" style="margin-bottom: 10px;">
                                @foreach ($comps as $com)
                                <option value="{{ $com['id'] }}">{{ $com['name'] }}</option>
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