<a href="{{ route('company.features.create') }}">Add Item</a>

@foreach($features as $feature)
    {{ $feature->title }}
    <a href="{{ route('company.features.edit', $feature) }}">Edit</a>
@endforeach
