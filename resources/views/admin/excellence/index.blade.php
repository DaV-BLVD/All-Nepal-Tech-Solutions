@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">🏆 Excellence Management</h1>

            {{-- Add New Button --}}
            <a href="{{ route('excellence.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-indigo-700 shadow-lg focus:ring-2 focus:ring-opacity-50">
                <i class="fas fa-plus"></i>
                <span>Add New Excellence</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-x-auto shadow-xl rounded-lg border border-gray-200">
            <table class="min-w-full bg-white divide-y divide-gray-200">
                {{-- Table Header --}}
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-sm uppercase tracking-wider w-1/2">Title</th>
                        <th class="px-6 py-3 text-center font-semibold text-sm uppercase tracking-wider w-32">Status</th>
                        <th class="px-6 py-3 text-center font-semibold text-sm uppercase tracking-wider w-40">Actions</th>
                    </tr>
                </thead>

                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-200">
                    @forelse($excellences as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            {{-- Title --}}
                            <td class="px-6 py-4 text-gray-900 font-medium whitespace-nowrap">
                                {{ $item->title }}
                            </td>

                            {{-- Status Badge --}}
                            <td class="px-6 py-4 text-center">
                                @if($item->is_active)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                        <i class="fas fa-check-circle mr-1 mt-0.5"></i> Active
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                        <i class="fas fa-times-circle mr-1 mt-0.5"></i> Inactive
                                    </span>
                                @endif
                            </td>

                            {{-- Actions --}}
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('excellence.edit', $item) }}"
                                        class="px-3 py-1 text-sm bg-primary text-white rounded-md hover:bg-indigo-600 transition-colors duration-200 shadow-sm focus:ring-2 focus:ring-opacity-50"
                                        title="Edit Item">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Delete Button --}}
                                    <form action="{{ route('excellence.destroy', $item) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors duration-200 shadow-sm focus:ring-2 focus:ring-red-500 focus:ring-opacity-50"
                                            title="Delete Item">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        {{-- Empty State --}}
                        <tr>
                            <td colspan="3" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                                    <p>No records found. Click <strong>Add New Excellence</strong> to begin.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection