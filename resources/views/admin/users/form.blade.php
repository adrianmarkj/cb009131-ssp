@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form>
                {{-- 'name',
                'email',
                'password',
                'first_name',
                'last_name',
                'type' --}}
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-form-input id="name" name="name" label="Name" type="text" value="{{ $user->name }}" help="Your Name"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="email" name="email" label="Email" type="email" value="{{ $user->email }}" help="Your Primary Email"/>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <x-form-input id="password" name="password" label="Password" type="password" value="" help="Min 8"/>
                    </div>
                    <div class="col-md-6">
                        <x-form-input id="password_confirmation" name="password_confirmation" label="Confirm Password" type="password" value=""/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <x-form-input id="first_name" name="first_name" label="First Name" type="text" value="{{ $user->first_name }}" help="First Name"/>
                    </div>
                    <div class="col-md-12">
                        <x-form-input id="last_name" name="last_name" label="Last Name" type="text" value="{{ $user->last_name }}" help="Last Name"/>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection
