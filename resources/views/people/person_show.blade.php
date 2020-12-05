@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $person['name']." ".$person['lastname'] }}</div>

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
                                <td class="person_table_td">: {{ $person['id'] }}</td>
                            </tr>

                            <tr>
                                <td>Name</td>:
                                <td class="person_table_td">: {{ $person['name'] }}</td>
                            </tr>

                            <tr>
                                <td>Last Name</td>:
                                <td class="person_table_td">: {{ $person['lastname'] }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>:
                                <td class="person_table_td">: {{ $person['email'] }}</td>
                            </tr>

                            <tr>
                                <td>Phone</td>:
                                <td class="person_table_td">: {{ $person['phone'] }}</td>
                            </tr>

                            <tr>
                                <td>Company</td>:
                                <td class="person_table_td">:
                                    <a href="{{ route('comshow',$person['company_id'])}}">
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