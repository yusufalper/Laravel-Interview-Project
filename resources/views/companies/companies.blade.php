@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

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
                    <div class="add_com_button search_parent">
                        <div style="color:white">
                            <a class="btn btn-info" href="{{ route('comnew')}}" role="button">Add Company</a>
                        </div>
                        <div>
                            <form class="form-inline mr-auto" action="{{ Route('comsearch') }}" method="GET"
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
                                    <th scope="col">Internet Address</th>
                                    <th scope="col">Addresses</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $companies->firstItem() - 1 }}</th>
                                    <td>
                                        <a href="{{ route('comshow',$company['id'])}}">
                                            {{ $company['name'] }}
                                        </a>
                                    </td>
                                    <td>{{ $company['internet_address'] }}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ route('comshow',$company['id'])}}"
                                            role="button">See
                                            Addresses and Details</a>
                                    </td>
                                    <td>
                                        <div class="com_div">
                                            <a class="btn btn-info com_item" href="{{ route('comedit', $company['id'])}}"
                                                role="button">Update Info</a>

                                            <form action="{{ Route('comdelete', $company['id'])}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" id="id" name="id" class="form-control mb-4"
                                                    value="{{ $company['id'] }}">
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Do you wanna delete this company (with all addresses and people) permanently?')"
                                                    type="submit" role="button">Delete Company</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $companies->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection