<x-form-select id="event_id" name="event_id" label="Event" value="{{ $event_id }}"
    help="" placeholder="Select Event"
    :options="$categories->pluck('name', 'id')" required />
