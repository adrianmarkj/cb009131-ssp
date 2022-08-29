@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}" method="POST" enctype="multipart/form-data">
                @if ($user->id)
                    @method('PUT')
                @endif

                @csrf
                <div class="col">
                    <h4>Authentication Details</h4>
                    <hr>
                </div>
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
                    <div class="col-12">
                        <h4>Personal Details</h4>
                        <hr>
                    </div>

                    <div class="col">
                        <x-form-input id="avatar" name="first_name" label="First Name" type="text" value="{{ $user->first_name }}" help="First Name"/>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-md-6">
                                <x-form-input id="first_name" name="avatar" label="Profile Picture" type="file" help="Recommended Resolution is 180px x 180px"/>
                            </div>
                            <div class="col-md-6">
                                <x-form-input id="last_name" name="last_name" label="Last Name" type="text" value="{{ $user->last_name }}" help="Last Name" value=""/>
                            </div>
                        </div>
                    </div>
                </div>

                <x-form-select id="type" name="type" label="Type" value="{{ $user->type }}" help="User Type" placeholder="Select Type" :options="['admin', 'user']"/>

                </select>
                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
</div>
@endsection
