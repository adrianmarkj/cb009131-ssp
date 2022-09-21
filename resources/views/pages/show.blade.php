@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $page->title }}</h2>
                    </div>

                    <div class="card-body text-center">
                        <img src="{{ $page->getFirstMediaUrl('images') }}" class="img-fluid mb-3" alt="{{ $page->title }}">
                        <p class="mb-3">
                            {{ $page->summary }}
                        </p>
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
