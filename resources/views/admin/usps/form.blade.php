@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-{{ $usp->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                    {{ $usp->exists ? 'Edit Selling Point' : 'Add New USP' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Define a unique selling proposition that highlights your business strengths and competitive advantages.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form action="{{ $usp->exists ? route('why_choose_us.update', $usp) : route('why_choose_us.store') }}"
                method="POST">
                @csrf
                @if($usp->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Row 1: Title & Icon --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">USP Title</label>
                            <input type="text" name="title" value="{{ old('title', $usp->title) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                placeholder="e.g. 24/7 Support Capability" required>
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Icon Class
                                (FontAwesome)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="{{ old('icon', $usp->icon ?? 'fas fa-check') }} text-indigo-500"></i>
                                </span>
                                <input type="text" name="icon" value="{{ old('icon', $usp->icon ?? 'fas fa-check') }}"
                                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                    placeholder="fas fa-rocket" required>
                            </div>
                            @error('icon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 2: Description --}}
                    <div>
                        <label
                            class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                        <textarea name="description" rows="4"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                            placeholder="Briefly describe why this benefit matters to your customers..."
                            required>{{ old('description', $usp->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit"
                            class="flex-1 md:flex-none px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-save mr-2"></i>
                            {{ $usp->exists ? 'Update USP' : 'Save USP' }}
                        </button>

                        <a href="{{ route('why_choose_us.index') }}"
                            class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection