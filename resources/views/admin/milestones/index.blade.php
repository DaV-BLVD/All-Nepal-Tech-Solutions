@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-history mr-2 text-indigo-600"></i> Journey Milestones
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the historical events and future goals on your company timeline.</p>
            </div>

            <a href="{{ route('milestones.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-plus text-xs"></i>
                <span>Add Milestone</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">SN</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Year/Label</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Milestone Details</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100 bg-white">
                        @forelse($milestones as $milestone)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- SN --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-sm font-mono text-gray-400">{{ $loop->iteration }}</span>
                                </td>

                                {{-- Year Badge --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold border border-indigo-200">
                                        {{ $milestone->year }}
                                    </span>
                                </td>

                                {{-- Icon & Info --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 flex-shrink-0 bg-gray-50 rounded-lg flex items-center justify-center text-indigo-600 border border-gray-100 shadow-sm">
                                            <i class="{{ $milestone->icon }} text-lg"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $milestone->title }}</div>
                                            <div class="text-xs text-gray-500 line-clamp-1 mt-0.5 max-w-xs">{{ $milestone->description }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-6 py-4 text-center">
                                    @if($milestone->is_active)
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                            <i class="fas fa-check-circle mr-1 mt-0.5"></i> Visible
                                        </span>
                                    @else
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-400 border border-gray-200">
                                            <i class="fas fa-eye-slash mr-1 mt-0.5"></i> Hidden
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('milestones.edit', $milestone) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Milestone">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('milestones.destroy', $milestone) }}" method="POST"
                                            onsubmit="return confirm('Remove this milestone from your journey?');" class="inline-block">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Milestone">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-map-signs text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No journey milestones added yet.</p>
                                        <a href="{{ route('milestones.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm font-semibold">Start your company timeline</a>
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