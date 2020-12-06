@extends('layouts.app')

@section('content')
<div class="card nearby_card">
    <div class="card-header">
        {{ __("Company: ".$company['name'].' - ('.$address['latitude'].', '.$address['longitude'].')  ') }} |
        <a class="btn btn-primary" href="{{ route('comshow',$company['id'])}}" role="button">
            Go to Company Details</a> | 
        <a class="btn btn-secondary" href="{{ route('adrshow',$address['id'])}}" role="button">
            Go to Adress Details</a>
    </div>
</div>
<div class="nearby_general">
    <div id="harita">
        <iframe id="mapFrame" class="nearby_frame" src="http://sehirharitasi.ibb.gov.tr/">
            <p>Browser is not supported !</p>
        </iframe>
    </div>

    <script src="{{ asset('js/nearby.js') }}" myApiKey="{{ config('services.apis.key') }}"
        myLatitude="{{ $address['latitude'] }}" myLongitude="{{ $address['longitude'] }}"></script>
</div>
@endsection