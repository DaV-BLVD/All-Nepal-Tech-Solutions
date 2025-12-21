@extends('admin.layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">
    {{-- Back Link --}}
    <div class="mb-6">
        <a href="{{ route('service-header.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center transition-colors">
            <i class="fas fa-arrow-left mr-2"></i> Back to View
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
        {{-- Form Header --}}
        <div class="bg-primary border-b border-gray-200 px-8 py-6 text-white">
            <h1 class="text-2xl font-bold">Edit Service Header</h1>
            <p class="text-sm mt-1">Modify the hero section content and call-to-action buttons.</p>
        </div>

        <form action="{{ route('service-header.update', $header->id) }}" method="POST" class="p-8">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Typography Section --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Main Title Prefix</label>
                        <input type="text" name="title" value="{{ old('title', $header->title) }}" 
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                            placeholder="e.g. World-Class">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Highlighted Text (Red)</label>
                        <input type="text" name="highlighted_text" value="{{ old('highlighted_text', $header->highlighted_text) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none text-red-600 font-semibold"
                            placeholder="e.g. Tech Solutions">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Hero Description</label>
                    <textarea name="description" rows="4" 
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none leading-relaxed">{{ old('description', $header->description) }}</textarea>
                </div>

                <hr class="border-gray-100">

                {{-- CTA Buttons Section --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-widest mb-4 flex items-center">
                        <i class="fas fa-mouse-pointer mr-2 text-indigo-500"></i> Button Configuration
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-gray-50 rounded-2xl border border-gray-100">
                        {{-- Primary Button --}}
                        <div class="space-y-3">
                            <label class="block text-xs font-bold text-indigo-600 uppercase">Primary Button (Solid)</label>
                            <input type="text" name="btn_primary_text" value="{{ old('btn_primary_text', $header->btn_primary_text) }}"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm" placeholder="Label">
                            <input type="text" name="btn_primary_link" value="{{ old('btn_primary_link', $header->btn_primary_link) }}"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-xs font-mono" placeholder="Link (#services-grid)">
                        </div>

                        {{-- Secondary Button --}}
                        <div class="space-y-3">
                            <label class="block text-xs font-bold text-gray-600 uppercase">Secondary Button (Outline)</label>
                            <input type="text" name="btn_secondary_text" value="{{ old('btn_secondary_text', $header->btn_secondary_text) }}"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm" placeholder="Label">
                            <input type="text" name="btn_secondary_link" value="{{ old('btn_secondary_link', $header->btn_secondary_link) }}"
                                class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-xs font-mono" placeholder="Link (#contact)">
                        </div>
                    </div>
                </div>

                {{-- Visual Elements --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Background Watermark Icon</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-icons"></i>
                        </span>
                        <input type="text" name="bg_icon" value="{{ old('bg_icon', $header->bg_icon) }}" 
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                            placeholder="fas fa-cogs">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2 ml-1">Use FontAwesome class names (e.g., fas fa-microchip)</p>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-10 pt-6 border-t border-gray-100 flex items-center justify-end space-x-4">
                <a href="{{ route('service-header.index') }}" class="text-gray-500 font-semibold hover:text-gray-700 transition-colors">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-save mr-2"></i> Update Header
                </button>
            </div>
        </form>
    </div>
</div>
@endsection