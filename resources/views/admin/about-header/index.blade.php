@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-address-card mr-2 text-indigo-600"></i> About Us Header
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Manage the hero section content for your company's "About Us" page.
                </p>
            </div>

            @if($header->id)
                <a href="{{ route('about-header.edit', $header->id) }}"
                    class="flex items-center space-x-2 bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500">
                    <i class="fas fa-edit text-xs"></i>
                    <span>Edit Header</span>
                </a>
            @endif
        </div>

        @if($header->id)
            {{-- Content Card --}}
            <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
                <div class="p-8">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

                        {{-- Main Info --}}
                        <div class="lg:col-span-2 space-y-8">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-2">Main
                                    Headline</label>
                                <h2 class="text-3xl font-bold text-gray-900 leading-tight">{{ $header->title }}</h2>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-2">Sub-Heading</label>
                                <p
                                    class="text-xl text-gray-700 font-medium italic border-l-4 border-indigo-500 pl-4 bg-indigo-50/30 py-2 rounded-r-lg">
                                    "{{ $header->subtitle }}"
                                </p>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-2">Description
                                    Paragraph</label>
                                <p class="text-gray-500 leading-relaxed text-lg">{{ $header->description }}</p>
                            </div>
                        </div>

                        {{-- Features Side Panel --}}
                        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 h-fit">
                            <div class="flex items-center justify-between mb-6">
                                <label class="block text-xs font-bold uppercase tracking-widest text-indigo-600">Active
                                    Features</label>
                                <span class="bg-indigo-100 text-indigo-700 text-[10px] px-2 py-0.5 rounded-full font-bold">JSON
                                    DATA</span>
                            </div>

                            <div class="space-y-3">
                                @forelse($header->features as $f)
                                    <div
                                        class="flex items-center p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:border-indigo-300 transition-colors group">
                                        <div
                                            class="h-10 w-10 flex items-center justify-center rounded-lg bg-indigo-50 group-hover:bg-indigo-600 transition-colors mr-3">
                                            <i class="{{ $f['icon'] }} text-indigo-600 group-hover:text-white"></i>
                                        </div>
                                        <span
                                            class="text-sm font-bold text-gray-700 uppercase tracking-tight">{{ $f['label'] }}</span>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <i class="fas fa-list text-gray-300 text-3xl mb-2"></i>
                                        <p class="text-gray-400 text-sm italic">No features defined.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Footer Info --}}
                <div
                    class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                    <div class="flex items-center space-x-4">
                        <span><i class="far fa-clock mr-1"></i> Last Updated:
                            {{ $header->updated_at->format('M d, Y • h:i A') }}</span>
                    </div>
                    <span class="flex items-center font-bold text-green-600 uppercase tracking-widest text-[10px]">
                        <span class="h-2 w-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        Live on Website
                    </span>
                </div>
            </div>
        @else
            {{-- Empty State (Styled consistently with Projects) --}}
            <div class="bg-white border-2 border-dashed border-gray-200 rounded-2xl p-20 text-center">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-50 mb-6">
                    <i class="fas fa-address-card text-gray-300 text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Header Not Initialized</h3>
                <p class="text-gray-500 max-w-sm mx-auto mb-8">The database table is empty. Please run your seeders or create
                    the first record.</p>
                <a href="#"
                    class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-100">
                    <i class="fas fa-plus mr-2 text-xs"></i>Create Initial Header
                </a>
            </div>
        @endif
    </div>
@endsection