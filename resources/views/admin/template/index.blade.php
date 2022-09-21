@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mb-3 text-end">
            @if (class_basename($model) != 'Subscription')
                <a href="{{ route('admin.' . $name . '.create') }}" class="btn btn-primary">
                    Add {{ class_basename($model) }}
                </a>
            @endif
        </div>
        <div class="col-md-12">
            <x-model-list :columns="$fields"
            :models="$data" />
        </div>
    </div>
</div>
@endsection
