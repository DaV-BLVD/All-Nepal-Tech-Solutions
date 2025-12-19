@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('map_locations.index') }}"
                        class="text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </a>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        {{ $location->exists ? 'Edit Location' : 'Add New Location' }}
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-1 ml-8">
                    {{ $location->exists ? 'Update the geographic details for this marker.' : 'Define a new map location for your contact page.' }}
                </p>
            </div>
        </div>

        <form action="{{ $location->exists ? route('map_locations.update', $location) : route('map_locations.store') }}"
            method="POST">
            @csrf
            @if($location->exists) @method('PUT') @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Column: Meta & Instructions --}}
                <div class="lg:col-span-1 space-y-6">
                    {{-- Title & Order --}}
                    <div class="bg-white p-6 shadow-xl rounded-2xl border border-gray-200">
                        <h3
                            class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6 border-b border-gray-50 pb-2">
                            Location Meta</h3>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2 tracking-wide">Location
                                    Name</label>
                                <input type="text" name="title" value="{{ old('title', $location->title) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all"
                                    placeholder="e.g., Main Headquarters" required>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase mb-2 tracking-wide">Display
                                    Order</label>
                                <input type="number" name="order" value="{{ old('order', $location->order ?? 0) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all font-mono"
                                    placeholder="0">
                            </div>
                        </div>
                    </div>

                    {{-- Help Card --}}
                    <div class="bg-indigo-900 p-6 shadow-xl rounded-2xl text-white">
                        <h3 class="text-indigo-300 text-xs font-bold uppercase tracking-widest mb-4 flex items-center">
                            <i class="fas fa-question-circle mr-2"></i> How to get URL
                        </h3>
                        <ol class="text-xs space-y-3 text-indigo-100 list-decimal list-inside opacity-90">
                            <li>Search your place on <b>Google Maps</b>.</li>
                            <li>Click <b>Share</b> <i class="fas fa-arrow-right mx-1 text-[10px]"></i> <b>Embed a map</b>.
                            </li>
                            <li>Copy the URL inside the <b>src=""</b> attribute only.</li>
                        </ol>
                    </div>
                </div>

                {{-- Right Column: Map URL Content --}}
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 h-full flex flex-col">
                        <div
                            class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 rounded-t-2xl flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-800 tracking-tight">Map Integration</h3>
                            <i class="fas fa-map-marked text-gray-200 text-2xl"></i>
                        </div>

                        <div class="p-8 space-y-6 flex-grow">
                            <div class="relative">
                                <label class="block text-xs font-bold text-indigo-600 uppercase tracking-widest mb-3">Google
                                    Maps iFrame URL</label>
                                <div class="relative">
                                    <textarea name="iframe_url" rows="5"
                                        class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all font-mono text-sm leading-relaxed"
                                        placeholder="Paste the https://www.google.com/maps/embed... URL here"
                                        required>{{ old('iframe_url', $location->iframe_url) }}</textarea>
                                </div>
                                <p class="mt-3 text-[11px] text-gray-400 italic">
                                    <i class="fas fa-exclamation-triangle mr-1"></i> Ensure the URL starts with
                                    <b>https://www.google.com/maps/embed</b>
                                </p>
                            </div>

                            @if($location->iframe_url)
                                <div class="mt-4">
                                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Live
                                        Preview</label>
                                    <div class="rounded-xl overflow-hidden border border-gray-200 shadow-inner bg-gray-100"
                                        style="height: 200px;">
                                        <iframe src="{{ $location->iframe_url }}" width="100%" height="100%" style="border:0;"
                                            allowfullscreen="" loading="lazy"></iframe>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Action Footer --}}
                        <div
                            class="px-8 py-6 bg-gray-50 border-t border-gray-100 rounded-b-2xl flex items-center justify-end space-x-4">
                            <a href="{{ route('map_locations.index') }}"
                                class="text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                                Discard Changes
                            </a>
                            <button type="submit"
                                class="px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                                <i class="fas fa-save mr-2"></i>
                                {{ $location->exists ? 'Update Location' : 'Save Location' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection