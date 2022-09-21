@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form action="{{ $administrator->id ? route('admin.administrators.update', $administrator->id) : route('admin.administrators.store') }}" method="POST" enctype="multipart/form-data">
                @if ($administrator->id)
                    @method('PUT')
                @endif

                @csrf
                <div class="col">
                    <h4>Authentication Details</h4>
                    <hr>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-form-input id="name" name="name" label="Name" type="text" value="{{ $administrator->name }}" help="Your Name" required/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="email" name="email" label="Email" type="email" value="{{ $administrator->email }}" help="Your Primary Email"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-form-input id="password" name="password" label="Password" type="password" help="Min 8"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="password_confirmation" name="password_confirmation" label="Confirm Password" type="password"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
</div>
@endsection
