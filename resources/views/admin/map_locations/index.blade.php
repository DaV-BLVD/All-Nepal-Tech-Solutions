@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-map-marked-alt mr-2 text-indigo-600"></i> Map Locations
                </h1>
                <p class="text-sm text-gray-500 mt-1">Configure the geographic coordinates and embed codes for your office
                    or project locations.</p>
            </div>

            <div class="flex items-center space-x-4">
                @if(session('success'))
                    <div
                        class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded-xl text-sm flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('map_locations.create') }}"
                    class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Add New Location</span>
                </a>
            </div>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Location Title</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">ID Reference</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($locations as $location)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Title with Marker --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="h-8 w-8 flex items-center justify-center rounded-full bg-red-50 text-red-600">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="text-sm font-bold text-gray-900 uppercase tracking-tight">
                                            {{ $location->title }}
                                        </div>
                                    </div>
                                </td>

                                {{-- ID --}}
                                <td class="px-6 py-4">
                                    <span
                                        class="text-xs font-mono text-gray-400 bg-gray-50 px-2 py-1 rounded border border-gray-100">
                                        UID_{{ str_pad($location->id, 4, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('map_locations.edit', $location) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Location">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('map_locations.destroy', $location) }}" method="POST"
                                            onsubmit="return confirm('Permanently remove this location from the map?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Location">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-20 w-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-globe-americas text-4xl text-gray-200"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium">No map locations found.</p>
                                        <p class="text-xs text-gray-400 mt-1 mb-4">You haven't added any markers to your map
                                            yet.</p>
                                        <a href="{{ route('map_locations.create') }}"
                                            class="text-indigo-600 hover:text-indigo-800 font-bold text-sm flex items-center">
                                            <i class="fas fa-plus-circle mr-1 text-xs"></i> Add your first location
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="mt-6 flex items-center text-xs text-gray-400">
            <i class="fas fa-info-circle mr-2"></i>
            <span>All locations will be rendered using the Google Maps API or iFrame embed as configured in settings.</span>
        </div>
    </div>
@endsection