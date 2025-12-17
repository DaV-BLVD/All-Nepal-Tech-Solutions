@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <i class="fas fa-{{ $setting->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                {{ $setting->exists ? 'Edit CTA Settings' : 'Create New CTA' }}
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-lg border border-gray-200">
            <form
                action="{{ $setting->exists ? route('contact_settings.update', $setting) : route('contact_settings.store') }}"
                method="POST">
                @csrf
                @if($setting->exists) @method('PUT') @endif

                <div class="space-y-6">

                    {{-- Title Field --}}
                    <div>
                        <label for="title"
                            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Title</label>
                        <input type="text" name="title" id="title" placeholder="e.g., Get in touch with our experts"
                            value="{{ old('title', $setting->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                            required />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description Field --}}
                    <div>
                        <label for="description"
                            class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Description</label>
                        <textarea name="description" id="description" rows="3" placeholder="Describe the call to action..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm resize-y"
                            required>{{ old('description', $setting->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Row: Phone & Button Text --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Phone Number --}}
                        <div>
                            <label for="phone"
                                class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Phone
                                Number</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    <i class="fas fa-phone-alt"></i>
                                </span>
                                <input type="text" name="phone" id="phone" placeholder="01-4500062"
                                    value="{{ old('phone', $setting->phone) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                    required />
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Button Text --}}
                        <div>
                            <label for="button_text"
                                class="block text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wider">Button Text</label>
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    <i class="fas fa-mouse-pointer"></i>
                                </span>
                                <input type="text" name="button_text" id="button_text" placeholder="Contact Us"
                                    value="{{ old('button_text', $setting->button_text) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-r-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                            </div>
                            @error('button_text')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center space-x-3 pt-6 border-t border-gray-100">
                        <button type="submit"
                            class="px-10 py-2.5 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg">
                            <i class="fas fa-save mr-2"></i> Save CTA Settings
                        </button>

                        <a href="{{ route('contact_settings.index') }}"
                            class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-lg font-semibold hover:bg-gray-200 transition duration-150">
                            Cancel
                        </a>
                    </div>

                </div>
            </form>
        </div>

        {{-- Info Alert --}}
        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100 flex items-start">
            <i class="fas fa-info-circle mt-1 text-blue-500 mr-3"></i>
            <p class="text-xs text-blue-700 leading-relaxed">
                <strong>Note:</strong> These changes will update the contact banner across the website. Ensure the phone number is in a clickable format for mobile users.
            </p>
        </div>
    </div>
@endsection