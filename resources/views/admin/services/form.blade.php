@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                {{-- Use a dynamic icon based on action --}}
                <i class="fas fa-{{ $service->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                {{ $service->exists ? 'Edit Service' : 'Create New Service' }}
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">

            {{-- Form Starts --}}
            <form method="POST"
                action="{{ $service->exists ? route('services.update', $service) : route('services.store') }}">

                @csrf
                @if($service->exists)
                    @method('PUT')
                @endif

                {{-- Input Fields --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Title --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="title" placeholder="e.g., Software Design"
                            value="{{ old('title', $service->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Icon (FontAwesome class) --}}
                    <div>
                        <label for="icon" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-magic mr-1"></i> Icon Class
                        </label>
                        <input type="text" name="icon" id="icon" placeholder="e.g., fas fa-laptop-code"
                            value="{{ old('icon', $service->icon) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        <p class="text-xs text-gray-500 mt-1">Use a Font Awesome 5 Free class (e.g., `fas fa-server`).</p>
                        @error('icon')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Description (Textarea) --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" placeholder="Enter a brief description of the service..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm resize-y">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status Checkbox --}}
                <div class="mb-8 border-t pt-6">
                    <label for="is_active" class="flex items-center text-sm font-semibold text-gray-700">
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            {{ old('is_active', $service->is_active) ? 'checked' : '' }}
                            class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                        <span class="ml-2">Service is Active (Show on frontend)</span>
                    </label>
                    @error('is_active')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit and Cancel Buttons --}}
                <div class="flex space-x-3 pt-4">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2 text-lg bg-indigo-600 text-white font-bold rounded-lg transition-colors duration-200 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        {{ $service->exists ? 'Update Service' : 'Create Service' }}
                    </button>
                    <a href="{{ route('services.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                        <i class="fas fa-times-circle"></i> <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection