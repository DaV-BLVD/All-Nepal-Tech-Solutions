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

            @if($header)
                {{-- Edit Button --}}
                <a href="{{ route('about-header.edit', $header->id) }}"
                    class="flex items-center space-x-2 bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500">
                    <i class="fas fa-edit text-xs"></i>
                    <span>Edit Header</span>
                </a>
            @endif
        </div>

        @if($header)
            {{-- Content Card --}}
            <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                        {{-- Main Info --}}
                        <div class="md:col-span-2 space-y-6">
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-1">Headline
                                    Title</label>
                                <h2 class="text-2xl font-bold text-gray-900">{{ $header->title }}</h2>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-1">Sub-Heading</label>
                                <p class="text-lg text-gray-700 font-medium">{{ $header->subtitle }}</p>
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-1">Description
                                    Paragraph</label>
                                <p class="text-gray-500 leading-relaxed">{{ $header->description }}</p>
                            </div>
                        </div>

                        {{-- Features Side Panel --}}
                        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                            <label
                                class="block text-xs font-bold uppercase tracking-widest text-indigo-600 mb-4 text-center">Active
                                Features</label>

                            <div class="space-y-4">
                                @forelse($header->features as $f)
                                    <div class="flex items-center p-3 bg-white rounded-xl shadow-sm border border-gray-200">
                                        <div class="h-10 w-10 flex items-center justify-center rounded-lg bg-indigo-50 mr-3">
                                            <i class="{{ $f['icon'] }} text-indigo-600"></i>
                                        </div>
                                        <span class="text-sm font-semibold text-gray-700">{{ $f['label'] }}</span>
                                    </div>
                                @empty
                                    <p class="text-center text-gray-400 text-sm italic">No features added.</p>
                                @endforelse
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Footer Info --}}
                <div
                    class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center text-xs text-gray-400">
                    <span>Last Updated: {{ $header->updated_at->format('M d, Y • h:i A') }}</span>
                    <span class="flex items-center">
                        <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                        Live on Website
                    </span>
                </div>
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white border-2 border-dashed border-gray-200 rounded-2xl p-16 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                    <i class="fas fa-exclamation-triangle text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-gray-900">No Header Found</h3>
                <p class="text-gray-500 max-w-xs mx-auto mb-6">You haven't initialized the about us header data yet.</p>
                <form action="#" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg">
                        Initialize Default Data
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection