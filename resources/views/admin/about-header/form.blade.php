@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Breadcrumbs/Back Button --}}
        <div class="mb-6">
            <a href="{{ route('about-header.index') }}"
                class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to View
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            {{-- Form Header --}}
            <div class="bg-gray-50 border-b border-gray-200 px-8 py-6">
                <h1 class="text-2xl font-bold text-gray-900">Edit About Us Header</h1>
                <p class="text-sm text-gray-500 mt-1">Update the main hero content and feature highlights.</p>
            </div>

            <form action="{{ route('about-header.update', $header->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    {{-- Title Field --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Headline
                            Title</label>
                        <input type="text" name="title" value="{{ old('title', $header->title ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                            placeholder="e.g. About Us">
                    </div>

                    {{-- Subtitle Field --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Subtitle /
                            Tagline</label>
                        <input type="text" name="subtitle" value="{{ old('subtitle', $header->subtitle ?? '') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                            placeholder="e.g. Tailored IT Solutions">
                    </div>

                    {{-- Description Field --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider mb-2">Main
                            Description</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">{{ old('description', $header->description ?? '') }}</textarea>
                    </div>

                    <hr class="border-gray-100 my-8">

                    {{-- Features Section --}}
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wider">Features &
                                Icons</label>
                            <button type="button" id="add-feature"
                                class="text-sm bg-indigo-50 text-indigo-600 px-4 py-2 rounded-lg font-bold hover:bg-indigo-100 transition-colors">
                                <i class="fas fa-plus mr-1"></i> Add Feature
                            </button>
                        </div>

                        <div id="feature-container" class="space-y-3">
                            @foreach($header->features as $index => $feature)
                                <div
                                    class="flex gap-3 items-center group bg-gray-50 p-3 rounded-xl border border-transparent hover:border-indigo-200 transition-all">
                                    <div class="w-1/3">
                                        <input type="text" name="features[{{$index}}][icon]" value="{{ $feature['icon'] }}"
                                            placeholder="Icon (e.g. fas fa-microchip)"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                                    </div>
                                    <div class="flex-1">
                                        <input type="text" name="features[{{$index}}][label]" value="{{ $feature['label'] }}"
                                            placeholder="Label (e.g. Cloud Solutions)"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                                    </div>
                                    <button type="button" onclick="this.parentElement.remove()"
                                        class="text-gray-400 hover:text-red-500 transition-colors px-2">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="mt-10 flex items-center justify-end space-x-4">
                    <a href="{{ route('about-header.index') }}"
                        class="text-gray-500 font-semibold hover:text-gray-700">Cancel</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50">
                        <i class="fas fa-save mr-2"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-feature').addEventListener('click', function () {
            const container = document.getElementById('feature-container');
            const index = container.children.length;
            const div = document.createElement('div');
            div.className = 'flex gap-3 items-center group bg-gray-50 p-3 rounded-xl border border-transparent hover:border-indigo-200 transition-all';
            div.innerHTML = `
                <div class="w-1/3">
                    <input type="text" name="features[${index}][icon]" placeholder="fas fa-icon" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                </div>
                <div class="flex-1">
                    <input type="text" name="features[${index}][label]" placeholder="Label" class="w-full px-3 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-gray-400 hover:text-red-500 transition-colors px-2">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(div);
        });
    </script>
@endsection