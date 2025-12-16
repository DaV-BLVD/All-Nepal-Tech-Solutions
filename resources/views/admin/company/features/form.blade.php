<form method="POST" action="{{ $feature->exists
    ? route('company.features.update', $feature)
    : route('company.features.store') }}">

    @csrf
    @if($feature->exists) @method('PUT') @endif

    <input name="title" value="{{ old('title', $feature->title) }}">
    <input name="subtitle" value="{{ old('subtitle', $feature->subtitle) }}">

    <button type="submit">
        {{ $feature->exists ? 'Update' : 'Create' }}
    </button>
</form>