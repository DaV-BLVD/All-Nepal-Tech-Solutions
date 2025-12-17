@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-{{ $value->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                    {{ $value->exists ? 'Edit Core Value' : 'Add New Value' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Define a fundamental principle that guides your organization's culture and decision-making.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form action="{{ $value->exists ? route('core_values.update', $value) : route('core_values.store') }}"
                method="POST">
                @csrf
                @if($value->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Row 1: Title & Icon --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Value Title</label>
                            <input type="text" name="title" value="{{ old('title', $value->title) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                                placeholder="e.g. Integrity First" required>
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Icon Class (FontAwesome)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="{{ old('icon', $value->icon ?? 'fas fa-gem') }} text-indigo-500"></i>
                                </span>
                                <input type="text" name="icon" value="{{ old('icon', $value->icon) }}"
                                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                                    placeholder="fas fa-heart" required>
                            </div>
                            @error('icon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 2: Full Description --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                        <textarea name="description" rows="5" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                            placeholder="Explain what this value means and how it is practiced..." required>{{ old('description', $value->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit" 
                            class="flex-1 md:flex-none px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-save mr-2"></i>
                            {{ $value->exists ? 'Update Value' : 'Save Value' }}
                        </button>

                        <a href="{{ route('core_values.index') }}"
                            class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection