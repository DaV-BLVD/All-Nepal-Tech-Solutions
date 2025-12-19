@extends('admin.layouts.app')
@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-900">
            <i class="fas fa-{{ $feature->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
            {{ $feature->exists ? 'Edit Feature' : 'Add New Feature/Stat' }}
        </h1>
    </div>

    <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
        <form action="{{ $feature->exists ? route('why_choose_us_services.update', $feature) : route('why_choose_us_services.store') }}" method="POST">
            @csrf @if($feature->exists) @method('PUT') @endif

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Feature Type</label>
                    <select name="type" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500">
                        <option value="checkpoint" {{ old('type', $feature->type) == 'checkpoint' ? 'selected' : '' }}>Checkpoint (Checkmark List)</option>
                        <option value="stat" {{ old('type', $feature->type) == 'stat' ? 'selected' : '' }}>Statistic Card (e.g. 500+)</option>
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Main Text / Value</label>
                        <input type="text" name="title" value="{{ old('title', $feature->title) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500" placeholder="e.g. 24/7 Support or 100+" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Sub-label (For Stats only)</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $feature->subtitle) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Happy Clients">
                    </div>
                </div>

                <div class="pt-6 border-t flex space-x-4">
                    <button type="submit" class="px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 shadow-lg">
                        <i class="fas fa-save mr-2"></i> Save Changes
                    </button>
                    <a href="{{ route('why_choose_us_services.index') }}" class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection