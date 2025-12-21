@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Breadcrumbs --}}
        <div class="mb-6">
            <a href="{{ route('about-header.index') }}"
                class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to View
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            {{-- Form Header --}}
            <div class="bg-primary border-b border-indigo-700 px-8 py-6">
                <h1 class="text-2xl font-bold text-white">Edit About Us Header</h1>
                <p class="text-indigo-100 text-sm mt-1">Refine your brand story and key highlights.</p>
            </div>

            <form action="{{ route('about-header.update', $header->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-8">
                    {{-- Primary Info Group --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-1">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Headline
                                Title</label>
                            <input type="text" name="title" value="{{ old('title', $header->title ?? '') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all outline-none"
                                placeholder="e.g. About Us">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Tagline /
                                Subtitle</label>
                            <input type="text" name="subtitle" value="{{ old('subtitle', $header->subtitle ?? '') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all outline-none"
                                placeholder="e.g. Innovating Since 2010">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">Main
                            Description</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 transition-all outline-none leading-relaxed">{{ old('description', $header->description ?? '') }}</textarea>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Dynamic Features Section --}}
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest">Key Features
                                    & Highlights</label>
                                <p class="text-[10px] text-gray-400 mt-1 uppercase">Icons must be FontAwesome classes</p>
                            </div>
                            <button type="button" id="add-feature"
                                class="inline-flex items-center text-xs bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg font-bold hover:bg-indigo-600 hover:text-white transition-all">
                                <i class="fas fa-plus-circle mr-2"></i> Add Feature
                            </button>
                        </div>

                        <div id="feature-container" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($header->features as $index => $feature)
                                <div
                                    class="feature-row group bg-gray-50 p-4 rounded-2xl border border-gray-200 hover:border-indigo-300 transition-all relative">
                                    <div class="flex flex-col space-y-3">
                                        <div class="flex items-center space-x-2">
                                            <div
                                                class="bg-white p-2 rounded-lg border border-gray-200 text-indigo-600 w-10 h-10 flex items-center justify-center">
                                                <i class="{{ $feature['icon'] }}"></i>
                                            </div>
                                            <input type="text" name="features[{{$index}}][icon]" value="{{ $feature['icon'] }}"
                                                placeholder="fas fa-check"
                                                class="flex-1 px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-xs font-mono">
                                        </div>
                                        <input type="text" name="features[{{$index}}][label]" value="{{ $feature['label'] }}"
                                            placeholder="Label Text"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-semibold">
                                    </div>
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="absolute -top-2 -right-2 bg-white text-gray-400 hover:text-red-500 shadow-sm border rounded-full w-6 h-6 flex items-center justify-center transition-colors">
                                        <i class="fas fa-times text-[10px]"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="mt-12 flex items-center justify-end space-x-4 border-t border-gray-100 pt-8">
                    <a href="{{ route('about-header.index') }}"
                        class="text-gray-500 font-semibold hover:text-gray-700 transition-colors">Cancel</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">
                        <i class="fas fa-save mr-2"></i> Update Header
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-feature').addEventListener('click', function () {
            const container = document.getElementById('feature-container');
            const index = Date.now(); // Use timestamp for unique indexing
            const div = document.createElement('div');
            div.className = 'feature-row group bg-gray-50 p-4 rounded-2xl border border-gray-200 hover:border-indigo-300 transition-all relative';
            div.innerHTML = `
                    <div class="flex flex-col space-y-3">
                        <div class="flex items-center space-x-2">
                            <div class="bg-white p-2 rounded-lg border border-gray-200 text-indigo-600 w-10 h-10 flex items-center justify-center">
                                <i class="fas fa-circle-notch animate-spin text-[10px]"></i>
                            </div>
                            <input type="text" name="features[${index}][icon]" placeholder="fas fa-star" 
                                class="flex-1 px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-xs font-mono">
                        </div>
                        <input type="text" name="features[${index}][label]" placeholder="Feature Label" 
                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm font-semibold">
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" 
                        class="absolute -top-2 -right-2 bg-white text-gray-400 hover:text-red-500 shadow-sm border rounded-full w-6 h-6 flex items-center justify-center transition-colors">
                        <i class="fas fa-times text-[10px]"></i>
                    </button>
                `;
            container.appendChild(div);
        });
    </script>
@endsection