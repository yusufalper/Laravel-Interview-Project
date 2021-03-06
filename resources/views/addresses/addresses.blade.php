@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Addresses') }}</div>

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
                    <div class="add_com_button">
                        <a class="btn btn-info" href="{{ route('adrnew')}}" role="button">Add Address</a>
                    </div>
                    <div class="mobile_table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Latitude</th>
                                    <th scope="col">Longitude</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $address)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $addresses->firstItem() - 1 }}</th>
                                    <td>
                                        <a href="{{ route('adrshow',$address['company_id'])}}">
                                            {{ $companyName[$address['id']] }}
                                        </a>
                                    </td>
                                    <td>{{ $address['latitude'] }}</td>
                                    <td>{{ $address['longitude'] }}</td>
                                    <td>
                                        <div class="com_div">
                                            <a class="btn btn-info com_item com_item1"
                                                href="{{ route('adredit', $address['id'])}}" role="button">Update</a>

                                            <form action="{{ Route('adrdelete', $address['id'])}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" id="id" name="id" class="form-control mb-4"
                                                    value="{{ $address['id'] }}">
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Do you wanna delete this address permanently?')"
                                                    type="submit" role="button">Delete Address</button>
                                            </form>

                                            <a ype="button" class="btn btn-success com_item"
                                                href="{{ route('nearby', $address['id'])}}">
                                                Nearby Scan
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $addresses->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection