@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>
                            {{ $event->name }}
                        </h1>
                    </div>

                    <div class="card-body">
                        <img src="{{ $event>getFirstMediaUrl('images') }}" class="img-fluid mb-3"
                            alt="{{ $event->name }}">
                        <div>
                            {!! $event->description !!}
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3>Details</h3>
                                <ul class="list-unstyled">
                                    <li>Name : {{ $event->title }}</li>
                                    <li>Start Date: {{ $event->start_date }}</li>
                                    <li>End Date: {{ $event->end_date }}</li>
                                    <li>Price Per Person : LKR {{ number_format($event->price_per_person, 2) }}</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <form action="{{ route('reservation.reserve', $package->id) }}" method="POST">
                                    @csrf

                                    <h3>Register Now</h3>

                                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                    <div class="form-group mt-3">
                                        <label for="number_of_people">No of Tickets: </label>
                                        <input type="number" name="number_of_people" id="number_of_people" class="form-control" required min="0" max="20">
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-4">Buy Tickets</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
