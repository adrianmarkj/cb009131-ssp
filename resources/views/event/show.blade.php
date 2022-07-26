@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ $event->name }}</h1>
                        @if ($count==null)
                            <h5>Number of Views: 0</h5>
                        @else
                            <h5>Number of Views: {{ $count }}</h5>
                        @endif
                        @if ($subscriptions==null)
                            <h5>Number of Subscriptions: 0</h5>
                        @else
                            <h5>Number of Subscriptions: {{ $subscriptions }}</h5>
                        @endif
                    </div>
                    <div class="card-body">
                        <img src="{{ $event->getFirstMediaUrl('images') }}" class="img-fluid mb-3 w-100" alt="{{ $event->name }}">
                        <br>
                        {!! $event->description !!}
                        <ul class="list-group list-group-flush mt-3">
                            @if($event->end_date!=$event->start_date)
                                <li class="list-group-item">Start Date : {{ $event->start_date }}</li>
                                <li class="list-group-item">End Date : {{ $event->end_date }}</li>
                            @else
                                <li class="list-group-item">Date : {{ $event->start_date }}</li>
                            @endif
                            <li class="list-group-item">Price Per Person : LKR {{ number_format($event->price_per_person, 2) }}</li>
                            <li class="list-group-item">Address : {{ $event->address }}</li>
                            <li class="list-group-item">Telephone : {{ $event->phone }}</li>
                            <li class="list-group-item">Email : {{ $event->email }}</li>
                        </ul>
                        <a href="{{ route('reservation.show', $event->id) }}" class="btn btn-success">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
