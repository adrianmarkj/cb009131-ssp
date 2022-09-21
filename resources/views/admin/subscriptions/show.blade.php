@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center bg-white p-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $subscription->name }}</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3">
                            <img alt="{{ $user->name }}" src="/storage/{{ $user->avatar }}"
                                class="w-100 img-circle img-responsive">
                        </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Event</td>
                                        <td>{{ $event->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of People</td>
                                        <td>{{ $subscription->number_of_people }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Price</td>
                                        <td>LKR {{ number_format($subscription->total_price, 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('admin.subscriptions.edit', $subscription->id) }}" class="btn btn-primary">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
