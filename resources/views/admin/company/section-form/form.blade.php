@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <i class="fas fa-edit mr-2 text-indigo-600"></i>
                Edit Company Section
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">

            {{-- Form Starts --}}
            <form method="POST" action="{{ route('section.update', $section) }}">

                @csrf
                @method('PUT')

                {{-- Group 1: Titles (2-column layout) --}}
                <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Section Titles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    {{-- Small Title --}}
                    <div>
                        <label for="small_title" class="block text-sm font-semibold text-gray-700 mb-2">Small Title</label>
                        <input type="text" name="small_title" id="small_title" placeholder="e.g., Welcome to Our Company"
                            value="{{ old('small_title', $section->small_title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('small_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Main Title --}}
                    <div>
                        <label for="main_title" class="block text-sm font-semibold text-gray-700 mb-2">Main Title</label>
                        <input type="text" name="main_title" id="main_title"
                            placeholder="e.g., We Build Digital Experiences"
                            value="{{ old('main_title', $section->main_title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('main_title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Highlight Title (Full width) --}}
                <div class="mb-6">
                    <label for="highlight_title" class="block text-sm font-semibold text-gray-700 mb-2">Highlight Title
                        (Optional)</label>
                    <input type="text" name="highlight_title" id="highlight_title"
                        placeholder="e.g., Trusted by 100+ Clients"
                        value="{{ old('highlight_title', $section->highlight_title) }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                    <p class="text-xs text-gray-500 mt-1">This text is often styled differently in the main title.</p>
                    @error('highlight_title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Description (Textarea) --}}
                <div class="mb-6">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="5"
                        placeholder="Enter the main description for the company section..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm resize-y">{{ old('description', $section->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Group 2: Button (2-column layout) --}}
                <h2 class="text-xl font-semibold text-gray-700 mb-4 border-b pt-2 pb-2">Call-to-Action Button</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    {{-- Button Text --}}
                    <div>
                        <label for="button_text" class="block text-sm font-semibold text-gray-700 mb-2">Button Text</label>
                        <input type="text" name="button_text" id="button_text" placeholder="e.g., Learn More"
                            value="{{ old('button_text', $section->button_text) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('button_text')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Button Link --}}
                    <div>
                        <label for="button_link" class="block text-sm font-semibold text-gray-700 mb-2">Button Link
                            (URL)</label>
                        <input type="text" name="button_link" id="button_link" placeholder="e.g., /about-us"
                            value="{{ old('button_link', $section->button_link) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        <p class="text-xs text-gray-500 mt-1">Use a full URL or a relative path (e.g., `/contact`).</p>
                        @error('button_link')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Submit and Cancel Buttons --}}
                <div class="flex space-x-3 pt-4 border-t">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2 text-lg bg-indigo-600 text-white font-bold rounded-lg transition-colors duration-200 hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 shadow-lg">
                        <i class="fas fa-save mr-2"></i>
                        Update Section
                    </button>
                    {{-- Assuming you have a route to view the index/details of this section --}}
                    <a href="{{ route('section.index') }}"
                        class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg font-semibold hover:bg-gray-300 transition duration-150 flex items-center space-x-2">
                        <i class="fas fa-times-circle"></i> <span>Cancel</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection