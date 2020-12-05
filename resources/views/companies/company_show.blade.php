@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $com['name'] }}{{ __(' Company') }}</div>

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

                <div class="card-body">
                    {{ $com['name'] }}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection