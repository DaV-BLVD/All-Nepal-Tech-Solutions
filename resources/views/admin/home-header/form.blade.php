@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-desktop mr-2 text-indigo-600"></i>
                    Refine Hero Experience
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the primary headline, call-to-action, and responsive background visuals for the homepage.</p>
            </div>
            <a href="{{ route('home-header.index') }}" 
               class="px-6 py-2.5 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-sm">
                Back to List
            </a>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form action="{{ route('home-header.update', $header->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('PUT')

                <div class="space-y-8">
                    {{-- Section 1: Content --}}
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Upper Badge</label>
                                <input type="text" name="badge" value="{{ old('badge', $header->badge) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                    placeholder="e.g. IT DESIGN & CONSULTING">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Headline (Main)</label>
                                <input type="text" name="title" value="{{ old('title', $header->title) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                    placeholder="e.g. Facilitate All Local">
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Headline (Highlight)</label>
                                <input type="text" name="title_highlight" value="{{ old('title_highlight', $header->title_highlight) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-150 shadow-sm text-red-600 font-bold"
                                    placeholder="e.g. Strategy">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                            <textarea name="description" rows="3"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                placeholder="Write a short sub-headline for the hero section...">{{ old('description', $header->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Button Text</label>
                                <input type="text" name="button_text" value="{{ old('button_text', $header->button_text) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                    placeholder="e.g. Get Details">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Button Link</label>
                                <input type="text" name="button_link" value="{{ old('button_link', $header->button_link) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm"
                                    placeholder="e.g. /contact-us">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Section 2: Visuals --}}
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <i class="fas fa-images mr-2 text-indigo-500"></i> Responsive Hero Images
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @foreach([
                                'image_laptop' => ['label' => 'Laptop View', 'dim' => '1920x1080'],
                                'image_tablet' => ['label' => 'Tablet View', 'dim' => '1024x1024'],
                                'image_mobile' => ['label' => 'Mobile View', 'dim' => '600x800']
                            ] as $key => $info)
                                <div class="group relative p-5 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200 hover:border-indigo-400 transition-colors">
                                    <label class="block text-xs font-black text-indigo-600 uppercase mb-3 tracking-widest text-center">
                                        {{ $info['label'] }} <span class="block text-[9px] text-gray-400 font-normal mt-0.5">({{ $info['dim'] }})</span>
                                    </label>
                                    
                                    @if($header->$key)
                                        <div class="relative mb-4 overflow-hidden rounded-lg shadow-sm border border-gray-200">
                                            <img src="{{ asset('storage/' . $header->$key) }}" class="h-32 w-full object-cover group-hover:scale-105 transition-transform duration-300">
                                        </div>
                                    @endif

                                    <input type="file" name="{{ $key }}" 
                                        class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit"
                            class="flex-1 md:flex-none px-12 py-4 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-sync-alt mr-2"></i>
                            Update Hero Content
                        </button>
                        
                        <a href="{{ route('home-header.index') }}"
                            class="px-8 py-4 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection