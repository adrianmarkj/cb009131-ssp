@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4">
            <form action="{{ $model->id ? route('admin.events.update', $model->id) : route('admin.events.store') }}" method="POST" enctype="multipart/form-data" x-data="eventForm">
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
                        <x-form-select id="category_id" name="category_id" label="Primary Event Category"
                            value="{{ $model->category_id }}" help="Page Category" placeholder="Select Primary Category"
                            :options="$categories->pluck('title', 'id')" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories</label>
                            <select class="form-control @error('categories') is-invalid @enderror"
                                    id="categories"
                                    x-ref="categories"
                                    name="categories[]" aria-describedby="categoriesHelp" multiple>
                                @foreach ($categories->pluck('title', 'id') as $option_key => $option_value)
                                    <option value="{{ $option_key }}" {{ in_array($option_key, $model->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $option_value }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="categoriesHelp" class="form-text">
                                Select any secondary event categories
                            </div>
                            @error('categories')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
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
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('eventForm', () => ({
                init() {
                    console.log('hotelForm component initialized');

                    // get the select box element using the x-ref and initialize select2
                    $(this.$refs.categories).select2({
                        placeholder: "Select Categories",
                        allowClear: true
                    });
                },
            }))
        })
    </script>
@endpush
