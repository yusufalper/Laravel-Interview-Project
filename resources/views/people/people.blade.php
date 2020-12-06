@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('People') }}</div>

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

                    <div class="add_com_button search_parent">
                        <div style="color:white">
                            <a class="btn btn-info" href="{{ route('pnew')}}" role="button">Add Person</a>
                        </div>
                        <div>
                            <form class="form-inline mr-auto" action="{{ Route('psearch') }}" method="GET"
                                enctype="multipart/form-data">
                                @csrf
                                <input name="search" class="form-control" type="text" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-dark btn-rounded btn-sm my-0 ml-sm-2"
                                    type="submit">Search</button>
                            </form>
                        </div>
                    </div>

                    <div class="mobile_table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $person)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $people->firstItem() - 1 }}</th>
                                    <td>
                                        <a href="{{ route('pshow',$person['id'])}}">
                                            {{ $person['name']." ".$person['lastname'] }}
                                        </a>
                                    </td>
                                    <td>{{ $person['email'] }}</td>
                                    <td>{{ $person['phone'] }}</td>
                                    <td>
                                        <a href="{{ route('comshow',$person['company_id'])}}">
                                            {{ $companyName[$person['id']] }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="com_div">
                                            <a class="btn btn-info com_item" href="{{ route('pedit', $person['id'])}}"
                                                role="button">Update Info</a>

                                            <form action="{{ Route('pdelete', $person['id'])}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" id="id" name="id" class="form-control mb-4"
                                                    value="{{ $person['id'] }}">
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Do you wanna delete this person permanently?')"
                                                    type="submit" role="button">Delete Person</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $people->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection