@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>My Subscriptions</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->event->name }}</td>
                                <td>LKR {{ number_format($subscription->total_price, 2) }}</td>
                                <td>{{ $subscription->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
