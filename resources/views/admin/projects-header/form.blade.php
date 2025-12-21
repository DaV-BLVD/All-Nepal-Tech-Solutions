@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Navigation --}}
        <div class="mb-6">
            <a href="{{ route('projects-header.index') }}"
                class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Back to View
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
            {{-- Header --}}
            <div class="bg-primary text-white border-b border-indigo-700 px-8 py-6">
                <h1 class="text-2xl font-bold">Edit Projects Header</h1>
                <p class="text-indigo-100 text-sm mt-1">Update the introductory content for your work showcase.</p>
            </div>

            <form action="{{ route('projects-header.update', $header->id) }}" method="POST" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {{-- Badge Input --}}
                    <div class="md:col-span-1">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">
                            Small Badge Text
                        </label>
                        <input type="text" name="badge" value="{{ old('badge', $header->badge) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none font-semibold text-indigo-600"
                            placeholder="e.g. INNOVATION">
                    </div>

                    {{-- Title Input --}}
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">
                            Main Headline Title
                        </label>
                        <input type="text" name="title" value="{{ old('title', $header->title) }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                            placeholder="e.g. Our Masterpieces">
                    </div>
                </div>

                {{-- Description Input --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-widest mb-2">
                        Hero Description Summary
                    </label>
                    <textarea name="description" rows="5"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none leading-relaxed"
                        placeholder="Write a brief overview of your projects...">{{ old('description', $header->description) }}</textarea>
                </div>

                {{-- Form Actions --}}
                <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                    <a href="{{ route('projects-header.index') }}"
                        class="text-gray-500 font-semibold hover:text-gray-700 transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100 active:scale-95 focus:ring-4 focus:ring-indigo-500/20">
                        <i class="fas fa-save mr-2 text-xs"></i> Update Header
                    </button>
                </div>
            </form>
        </div>

        {{-- Help Card --}}
        <div class="mt-8 bg-indigo-50 rounded-2xl p-6 border border-indigo-100 flex items-start space-x-4">
            <div class="h-10 w-10 bg-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-lightbulb text-white"></i>
            </div>
            <div>
                <h4 class="text-indigo-900 font-bold">Pro-Tip</h4>
                <p class="text-indigo-700/80 text-sm leading-relaxed">
                    Keep your <strong>Main Headline</strong> short and punchy (3-5 words). For the
                    <strong>Description</strong>, aim for 2-3 sentences to maintain the visual balance of the hero section
                    on the public website.
                </p>
            </div>
        </div>
    </div>
@endsection