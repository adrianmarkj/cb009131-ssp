@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ $event->name }}</h1></div>

                    <div class="card-body text-center">
                        <img src="{{ $event->getFirstMediaUrl('images') }}" class="img-fluid mb-3" alt="{{ $event->name }}">
                        {!! $event->description !!}
                        <ul class="mt-3">
                            <li>{{ $event->date }}</li>
                            <li>{{ $event->address }}</li>
                            <li>{{ $event->phone }}</li>
                            <li>{{ $event->email }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
