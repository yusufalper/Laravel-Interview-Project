@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Company: ') }}{{ $comp['name'] }}</div>
                <div class="my_card_parent" style="width: 100%">
                    <div class="col-md-4">
                        <div class="card" id="accordionOne">
                            <button class="btn btn-info" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <div id="headingOne" class="card-header my_card">
                                    <div>▲</div>
                                    <h5 class="mb-0">

                                        {{ __(' Infos') }}

                                    </h5>
                                    <div>▼</div>
                                </div>
                            </button>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionOne" style="margin-top: 10px">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Company Name</td>
                                            <td class="person_table_td">: {{ $comp['name'] }}</td>
                                        </tr>

                                        <tr>
                                            <td>Internet Address</td>
                                            <td class="person_table_td">: {{ $comp['internet_address'] }}</td>
                                        </tr>

                                        <tr>
                                            <td>Created at</td>
                                            <td class="person_table_td">: {{ $comp['created_at'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4" id="accordionTwo">
                        <div class="card">
                            <button class="btn btn-secondary" data-toggle="collapse" data-target="#collapseTwo"
                                aria-expanded="true" aria-controls="collapseTwo">
                                <div id="headingTwo" class="card-header my_card">
                                    <div>▲</div>
                                    <h5 class="mb-0">
                                        {{ __(' Addresses') }}
                                    </h5>
                                    <div>▼</div>
                                </div>
                            </button>
                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                                data-parent="#accordionTwo" style="margin-top: 10px">
                                @foreach ($addresses as $address)
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><strong>Address {{ $address['id'] }}</strong> <br>
                                                ({{ $address['latitude'] }} , {{ $address['longitude'] }})</td>
                                        </tr>

                                        <tr style="background-color: #F2F2F2">
                                            <td>
                                                <a href="{{ route('adrshow', $address['id'])}}">Address Details</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('ibbnearby', $address['id'])}}">
                                                    IBB Nearby Scan
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4" id="accordionThree">
                        <div class="card">
                            <button class="btn btn-dark" data-toggle="collapse" data-target="#collapseThree"
                                aria-expanded="true" aria-controls="collapseThree">

                                <div id="headingThree" class="card-header my_card">
                                    <div>▲</div>
                                    <h5 class="mb-0">
                                        {{ __(' People') }}
                                    </h5>
                                    <div>▼</div>
                                </div>

                            </button>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                data-parent="#accordionThree" style="margin-top: 10px">

                                @foreach ($people as $person)
                                <table class="table table-striped">
                                    <tbody>
                                        <th>
                                            {{ $person['name']." ".$person['lastname'] }}
                                        </th>
                                        <tr>
                                            <td colspan="2">email: {{ $person['email'] }} </td>
                                        </tr>

                                        <tr style="background-color: #F2F2F2">
                                            <td colspan="2">
                                                <a href="{{ route('pshow', $person['id'])}}">Person Details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection