@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bg-white p-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $administrator->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $administrator->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ $administrator->email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('admin.administrators.edit', $administrator->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
