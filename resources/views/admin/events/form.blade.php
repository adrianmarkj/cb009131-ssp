@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form action="{{ $model->id ? route('admin.events.update', $model->id) : route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                @if ($model->id)
                    @method('PUT')
                @endif

                @csrf

                <div class="col">
                    <h4>Event Form</h4>
                    <hr>
                </div>

                <div class="row">
                    <div class="col-12">
                        <x-form-select id="category_id" name="category_id" label="Page Category"
                            value="{{ $model->category_id }}" help="Page Category" placeholder="Select Category"
                            :options="$categories->pluck('title', 'id')" />
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-md-8">
                            <x-form-input id="name" name="name" label="Name" type="text"
                                value="{{ $model->name }}" help="Event Name" />
                        </div>
                        <div class="col-md-4">
                            <x-form-input id="url" name="url" label="URL" type="text"
                                value="{{ $model->url }}" help="URL" />
                        </div>
                    </div>
                </div>

                {{-- <div class="col-12">
                    <x-form-input id="avatar" name="avatar" label="Profile Image" type="file" value="{{ $model->image }}"
                        help="Please upload an image with the resolution of 180px X 180px" />
                </div> --}}

                <div class="col-12">
                    <x-form-textarea id="description" name="description" label="Description" type="text"
                        value="{{ $model->description }}" help="Description" ckeditor="true" />
                </div>

                <div class="col-12">
                    <x-form-textarea id="address" name="address" label="Address" type="text"
                        value="{{ $model->address }}" help="Address" />
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input id="start_date" name="start_date" label="Start Date" type="date"
                                value="{{ $model->start_date }}" help="Start Date" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input id="end_date" name="end_date" label="End Date" type="date"
                                value="{{ $model->end_date }}" help="Only if applicable" />
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <x-form-input id="phone" name="phone" label="Phone" type="text"
                                value="{{ $model->phone }}" help="Phone" />
                        </div>
                        <div class="col-md-6">
                            <x-form-input id="email" name="email" label="Email" type="text"
                                value="{{ $model->email }}" help="Email" />
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <x-form-input id="sort_order" name="sort_order" label="Sort Order" type="number"
                                value="{{ $model->sort_order }}" help="Sort order of the pages" />
                        </div>
                        <div class="col-6">
                            <input type="checkbox" class="form-check-input" id="status" name="status"
                                aria-describedby="statusHelp" value="1"
                                {{ old('status', $model->status) ? 'checked' : '' }} />
                            <label for="status" class="form-label ms-2">Status</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
              </form>
        </div>
    </div>
</div>
@endsection
