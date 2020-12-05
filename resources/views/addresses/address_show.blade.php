@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $comp['name']." s ".$address['id']." Address" }}</div>

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
                                <td>Id</td>:
                                <td class="person_table_td">: {{ $address['id'] }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>:
                                <td class="person_table_td">: {{ $address['latitude'] }}</td>
                            </tr>

                            <tr>
                                <td>Last Name</td>:
                                <td class="person_table_td">: {{ $address['longitude'] }}</td>
                            </tr>

                            <tr>
                                <td>Company</td>:
                                <td class="person_table_td">:
                                    <a href="{{ route('comshow',$address['company_id'])}}">
                                        {{ $comp['name'] }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection