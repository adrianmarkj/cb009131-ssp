@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4">
                <div class="card rounded shadow-sm">
                    <div class="card-header m-0 p-0">
                        <img src="{{ $event->getFirstMediaUrl('images', 'thumb') }}" alt="{{ $event->name }}" class="w-100">
                    </div>
                    <div class="card-body">
                        <h2>{{ $event->name }}</h2>
                        <small>{{ $event->category->title }}</small>
                        <p>{{ Str::limit($event->description, 100, '...') }}</p>
                        <a href="{{ route('events.show', $event->url) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
