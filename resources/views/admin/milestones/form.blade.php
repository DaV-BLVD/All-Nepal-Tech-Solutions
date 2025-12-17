@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-{{ $milestone->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                    {{ $milestone->exists ? 'Edit Milestone' : 'Add Journey Milestone' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Define a historical event or future objective for your company timeline.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form action="{{ $milestone->exists ? route('milestones.update', $milestone) : route('milestones.store') }}"
                method="POST">
                @csrf
                @if($milestone->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Row 1: Year & Icon --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Year / Label</label>
                            <input type="text" name="year" value="{{ old('year', $milestone->year) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                                placeholder="e.g. 2024 or Dec 2023" required>
                            @error('year') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Icon Class (FontAwesome)</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="{{ old('icon', $milestone->icon ?? 'fas fa-rocket') }} text-indigo-500"></i>
                                </span>
                                <input type="text" name="icon" value="{{ old('icon', $milestone->icon ?? 'fas fa-rocket') }}"
                                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                                    placeholder="fas fa-star">
                            </div>
                            @error('icon') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 2: Title --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Milestone Title</label>
                        <input type="text" name="title" value="{{ old('title', $milestone->title) }}"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                            placeholder="e.g. Company Founded" required>
                        @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Row 3: Description --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Short Description</label>
                        <textarea name="description" rows="4" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                            placeholder="Provide a brief summary of this achievement..." required>{{ old('description', $milestone->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Row 4: Status Toggle --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Visibility Status</label>
                        <select name="is_active"
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm bg-white cursor-pointer">
                            <option value="1" {{ (old('is_active', $milestone->is_active ?? 1) == 1) ? 'selected' : '' }}>🟢 Visible (Show on Timeline)</option>
                            <option value="0" {{ (old('is_active', $milestone->is_active ?? 1) == 0) ? 'selected' : '' }}>🔴 Hidden (Save as Draft)</option>
                        </select>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit" 
                            class="flex-1 md:flex-none px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-save mr-2"></i>
                            {{ $milestone->exists ? 'Save Changes' : 'Create Milestone' }}
                        </button>

                        <a href="{{ route('milestones.index') }}"
                            class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection