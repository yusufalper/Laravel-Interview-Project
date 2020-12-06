@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $company['name']." s ".$address['id']." Address" }}</div>

                <div class="card-body show_person">
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

                    <table>
                        <tbody>
                            <tr>
                                <td>Id</td>
                                <td class="person_table_td">: {{ $address['id'] }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>
                                <td class="person_table_td">: {{ $address['latitude'] }}</td>
                            </tr>

                            <tr>
                                <td>Last Name</td>
                                <td class="person_table_td">: {{ $address['longitude'] }}</td>
                            </tr>

                            <tr>
                                <td>Company</td>
                                <td class="person_table_td">:
                                    <a href="{{ route('comshow',$address['company_id'])}}">
                                        {{ $company['name'] }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="com_div" style="margin-top: 10px;">
                                        <a class="btn btn-info com_item" href="{{ route('adredit', $address['id'])}}"
                                            role="button">Update</a>

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
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a style="width: 250px; margin-left:10px; margin-bottom:10px;" type="button" class="btn btn-success"
                    href="{{ route('nearby', $address['id'])}}">
                    IBB Nearby Scan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection