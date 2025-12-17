@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">✨ Features Management</h1>

            {{-- Add Feature Button --}}
            <a href="{{ route('features.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-indigo-700 shadow-lg focus:ring-2 focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Feature</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                {{-- Table Header --}}
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider w-1/4">Title</th>
                        <th class="px-4 py-3 text-left font-semibold text-sm uppercase tracking-wider w-1/2">Subtitle / Description</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-20">Status</th>
                        <th class="px-4 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-200">
                    @forelse($features as $feature)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- Title --}}
                            <td class="px-4 py-3 text-gray-900 font-medium">
                                {{ $feature->title }}
                            </td>

                            {{-- Subtitle / Description --}}
                            <td class="px-4 py-3 text-gray-600 text-sm">
                                {{ $feature->subtitle ?? 'No subtitle provided.' }}
                            </td>

                            {{-- Status (Assuming a boolean `is_active` field exists) --}}
                            <td class="px-4 py-3 text-center">
                                @if(isset($feature->is_active) && $feature->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('features.edit', $feature) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-indigo-600 transition-colors duration-200 shadow focus:ring-2 focus:ring-opacity-50"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('features.destroy', $feature) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete the feature: {{ $feature->title }}?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                                            title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        {{-- Empty State --}}
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500 bg-gray-50">
                                <i class="fas fa-info-circle mr-2"></i> No features found. Click
                                <strong>Add New Feature</strong> above to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection