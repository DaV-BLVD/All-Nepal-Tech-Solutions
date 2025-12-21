@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-{{ $project->exists ? 'edit' : 'plus-circle' }} mr-2 text-indigo-600"></i>
                    {{ $project->exists ? 'Edit Project' : 'Add New Project' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Showcase your technical expertise by adding or updating a project in your portfolio.</p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form action="{{ $project->exists ? route('projects.update', $project) : route('projects.store') }}"
                method="POST">
                @csrf
                @if($project->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Row 1: Title & Category --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Project Title</label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400" 
                                placeholder="e.g. Cloud Migration" required>
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Category</label>
                            <select name="category" 
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm bg-white" required>
                                <option value="" disabled {{ !$project->exists ? 'selected' : '' }}>Select Category</option>
                                <option value="development" {{ old('category', $project->category) == 'development' ? 'selected' : '' }}>Development</option>
                                <option value="infrastructure" {{ old('category', $project->category) == 'infrastructure' ? 'selected' : '' }}>Cloud & Infra</option>
                                <option value="security" {{ old('category', $project->category) == 'security' ? 'selected' : '' }}>Security</option>
                                <option value="data" {{ old('category', $project->category) == 'data' ? 'selected' : '' }}>Data & Analytics</option>
                            </select>
                            @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 2: Description --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Description</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                            placeholder="Briefly describe the project goals and results..." required>{{ old('description', $project->description) }}</textarea>
                        @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Row 3: Icon SVG Code --}}
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-bold text-gray-700 uppercase tracking-wide">SVG Path Code</label>
                            <span class="text-[10px] text-indigo-500 font-bold bg-indigo-50 px-2 py-1 rounded">ONLY &lt;path&gt; TAGS</span>
                        </div>
                        <textarea name="icon_svg" rows="4" 
                            class="w-full px-4 py-2.5 font-mono text-sm border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm bg-gray-50 placeholder-gray-400"
                            placeholder='<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>' required>{{ old('icon_svg', $project->icon_svg) }}</textarea>
                        <p class="text-xs text-gray-400 mt-2 italic">Tip: Copy the code inside the &lt;svg&gt; tag from Lucide or Heroicons.</p>
                        @error('icon_svg') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Row 4: Additional Settings --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Icon Background Color</label>
                            <input type="text" name="icon_bg_color" value="{{ old('icon_bg_color', $project->icon_bg_color ?? 'bg-blue-50') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" 
                                placeholder="e.g. bg-blue-50">
                        </div>
                        {{-- <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Case Study Link</label>
                            <input type="text" name="link" value="{{ old('link', $project->link ?? '#') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" 
                                placeholder="e.g. /projects/cloud-migration">
                        </div> --}}
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit" 
                            class="flex-1 md:flex-none px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-save mr-2"></i>
                            {{ $project->exists ? 'Update Project' : 'Save Project' }}
                        </button>

                        <a href="{{ route('projects.index') }}"
                            class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection