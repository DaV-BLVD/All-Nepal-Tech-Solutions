@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <i class="fas fa-{{ $excellence->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                {{ $excellence->exists ? 'Edit Excellence Record' : 'Add New Excellence' }}
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">

            {{-- Form Starts --}}
            <form method="POST"
                action="{{ $excellence->exists ? route('excellence.update', $excellence) : route('excellence.store') }}">

                @csrf
                @if($excellence->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Title Field --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="title" placeholder="e.g., Award for Innovation"
                            value="{{ old('title', $excellence->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Image URL Field --}}
                    <div>
                        <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Image URL</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                <i class="fas fa-image"></i>
                            </span>
                            <input type="text" name="image" id="image" placeholder="https://example.com/image.jpg"
                                value="{{ old('image', $excellence->image) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Provide a direct link to the image/icon.</p>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description Field --}}
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="4" placeholder="Describe this achievement..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm resize-y">{{ old('description', $excellence->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Status Checkbox --}}
                    <div class="pt-4 border-t">
                        <label for="is_active" class="inline-flex items-center group cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" name="is_active" id="is_active" value="1"
                                    {{ old('is_active', $excellence->is_active) ? 'checked' : '' }}
                                    class="w-5 h-5 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 transition duration-150">
                            </div>
                            <span class="ml-3 text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition duration-150">
                                Set as Active (Visible on website)
                            </span>
                        </label>
                        @error('is_active')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center space-x-3 pt-6 border-t">
                        <button type="submit"
                            class="px-8 py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg">
                            <i class="fas fa-save mr-2"></i> Save Excellence
                        </button>
                        
                        <a href="{{ route('excellence.index') }}"
                            class="px-6 py-2 bg-gray-100 text-gray-600 rounded-lg font-semibold hover:bg-gray-200 transition duration-150">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection