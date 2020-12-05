@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Companies') }}</div>

                <div class="card-body">
                    <div class="add_com_button">
                        <a class="btn btn-info" href="{{ route('comnew')}}" role="button">Add Company</a>
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
                                @foreach ($comps as $com)
                                <tr>
                                    <th scope="row">{{ $loop->iteration + $comps->firstItem() - 1 }}</th>
                                    <td>{{ $com['name'] }}</td>
                                    <td>{{ $com['internet_address'] }}</td>
                                    <td>
                                        <a class="btn btn-secondary" href="{{ route('comshow',$com['id'])}}" role="button">See
                                            Addresses and Details</a>
                                    </td>
                                    <td>
                                        <div class="com_div">
                                            <a class="btn btn-info com_item" href="{{ route('comedit', $com['id'])}}"
                                                role="button">Update Info</a>

                                            <form action="{{ Route('comdelete', $com['id'])}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <input type="hidden" id="id" name="id" class="form-control mb-4"
                                                    value="{{ $com['id'] }}">
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

                    {{ $comps->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection