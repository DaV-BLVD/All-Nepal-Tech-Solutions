@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-gem mr-2 text-indigo-600"></i> Core Values
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the foundational principles and beliefs that guide your
                    organization.</p>
            </div>

            {{-- Add New Button --}}
            <a href="{{ route('core_values.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <i class="fas fa-plus text-xs"></i>
                <span>Add New Value</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Visual Icon</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Value Title</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Description Summary
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($values as $v)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Icon --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div
                                        class="h-12 w-12 flex items-center justify-center rounded-xl bg-indigo-50 border border-indigo-100 shadow-sm">
                                        <i class="{{ $v->icon }} text-2xl text-indigo-600"></i>
                                    </div>
                                </td>

                                {{-- Title --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900 uppercase tracking-tight">{{ $v->title }}</div>
                                </td>

                                {{-- Description --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-500 max-w-md line-clamp-2">
                                        {{ $v->description }}
                                    </p>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('core_values.edit', $v) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Value">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('core_values.destroy', $v) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this core value?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Value">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-gem text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No core values defined yet.</p>
                                        <a href="{{ route('core_values.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm">Create your first value</a>
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