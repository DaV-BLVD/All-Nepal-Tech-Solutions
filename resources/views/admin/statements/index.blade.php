@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-bullseye mr-2 text-indigo-600"></i> Vision & Mission
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage your organization's primary goals and long-term aspirations.
                </p>
            </div>

            {{-- Action Button --}}
            <a href="{{ route('company_statement.edit', $statement->id) }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <i class="fas fa-edit text-xs"></i>
                <span>Edit Statements</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Type</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Statement Text</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Key Highlights</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @foreach(['Mission' => [$statement->mission_text, $statement->mission_points, 'fa-crosshairs'], 'Vision' => [$statement->vision_text, $statement->vision_points, 'fa-eye']] as $title => $data)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Type --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="h-10 w-10 flex items-center justify-center rounded-lg bg-indigo-50 border border-indigo-100">
                                            <i class="fas {{ $data[2] }} text-indigo-600"></i>
                                        </div>
                                        <span class="text-sm font-bold text-gray-900 uppercase">{{ $title }}</span>
                                    </div>
                                </td>

                                {{-- Statement Text --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 max-w-md line-clamp-3 leading-relaxed">
                                        {{ $data[0] }}
                                    </p>
                                </td>

                                {{-- Points --}}
                                <td class="px-6 py-4">
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($data[1] as $point)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 border border-indigo-200">
                                                <i class="fas fa-check-circle mr-1 text-[10px]"></i> {{ $point }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection