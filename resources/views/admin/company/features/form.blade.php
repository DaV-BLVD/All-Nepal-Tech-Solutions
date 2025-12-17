@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <i class="fas fa-{{ $feature->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                {{ $feature->exists ? 'Edit Feature Item' : 'Create New Feature Item' }}
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">

            {{-- Form Starts --}}
            <form method="POST"
                action="{{ $feature->exists
                    ? route('features.update', $feature)
                    : route('features.store') }}">

                @csrf
                @if($feature->exists) @method('PUT') @endif

                {{-- Input Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Feature Title</label>
                        <input type="text" name="title" id="title" placeholder="e.g., Fast Delivery"
                            value="{{ old('title', $feature->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Icon (Optional: Add this field if your model supports icons) --}}
                    {{-- <div>
                        <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-magic mr-1"></i> Icon Class (e.g., fas fa-shipping-fast)
                        </label>
                        <input type="text" name="icon" id="icon" placeholder="e.g., fas fa-star"
                            value="{{ old('icon', $feature->icon ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        <p class="text-xs text-gray-500 mt-1">Use a Font Awesome 5 Free class.</p>
                        @error('icon')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div> --}}
                </div>

                {{-- Subtitle (Short Description - Full Width) --}}
                <div class="mb-8">
                    <label for="subtitle" class="block text-sm font-semibold text-gray-700 mb-2">Subtitle / Short Description</label>
                    <textarea name="subtitle" id="subtitle" rows="3" placeholder="e.g., We ship products within 24 hours globally."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm resize-y">{{ old('subtitle', $feature->subtitle) }}</textarea>
                    @error('subtitle')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit and Cancel Buttons --}}
                <div class="flex space-x-3 pt-4 border-t">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2 text-lg bg-indigo-600 text-white font-bold rounded-lg transition-colors duration-200 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        {{ $feature->exists ? 'Update Feature' : 'Create Feature' }}
                    </button>
                    <a href="{{ route('features.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                        <i class="fas fa-times-circle"></i> <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection