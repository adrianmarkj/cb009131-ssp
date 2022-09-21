@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form action="{{ $model->id ? route('admin.subscriptions.update', $model->id) : route('admin.subscriptions.store') }}" method="POST" enctype="multipart/form-data">
                @if ($model->id)
                    @method('PUT')
                @endif

                @csrf

                <div class="col">
                    <h4>Subscriptions Form</h4>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-12">
                        <x-form-select id="event_id" name="event_id" label="Event"
                            value="{{ $model->event_id }}" placeholder="Select Event"
                            :options="$events->pluck('name', 'id')" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <x-form-select id="user_id" name="user_id" label="User"
                            value="{{ $model->user_id }}" placeholder="Select User"
                            :options="$users->pluck('name', 'id')" />
                    </div>
                </div>

                <div class="col-12">
                    <x-form-input id="number_of_people" name="number_of_people" label="Number of People" type="number"
                        value="{{ $model->number_of_people }}" help="" required min="0" max="20"/>
                </div>

                <div class="col-12">
                    <input type="checkbox" class="form-check-input" id="status" name="status"
                        aria-describedby="statusHelp" value="1"
                        {{ old('status', $model->status) ? 'checked' : '' }} />
                    <label for="status" class="form-label ms-2">Status</label>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
</div>
@endsection
