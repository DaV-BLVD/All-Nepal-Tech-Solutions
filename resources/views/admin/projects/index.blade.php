@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-project-diagram mr-2 text-indigo-600"></i> Project Portfolio
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage your professional works, case studies, and technical implementations.</p>
            </div>

            {{-- Add New Button --}}
            <a href="{{ route('projects.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <i class="fas fa-plus text-xs"></i>
                <span>Add New Project</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Icon</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Project Title</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Category</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Description</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($projects as $project)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Icon Preview --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-12 w-12 flex items-center justify-center rounded-xl {{ $project->icon_bg_color ?? 'bg-indigo-50' }} border border-indigo-100 shadow-sm text-indigo-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            {!! $project->icon_svg !!}
                                        </svg>
                                    </div>
                                </td>

                                {{-- Title --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900 tracking-tight">{{ $project->title }}</div>
                                </td>

                                {{-- Category Badge --}}
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-slate-100 text-slate-600 uppercase">
                                        {{ $project->category }}
                                    </span>
                                </td>

                                {{-- Description Summary --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-500 max-w-xs line-clamp-1">
                                        {{ $project->description }}
                                    </p>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('projects.edit', $project) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Project">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this project?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Project">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-folder-open text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No projects found in the portfolio.</p>
                                        <a href="{{ route('projects.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm">Create your first project</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection