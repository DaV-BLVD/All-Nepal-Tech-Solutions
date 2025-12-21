@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-project-diagram mr-2 text-indigo-600"></i> Projects Header
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the hero content of your Portfolio/Projects page.</p>
            </div>

            @if($header->id)
                <a href="{{ route('projects-header.edit', $header->id) }}"
                    class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-edit text-xs"></i>
                    <span>Edit Header</span>
                </a>
            @endif
        </div>

        @if($header->id)
            {{-- Table Section (Card Layout) --}}
            <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        {{-- Table Header --}}
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Page Badge</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Main Headline</th>
                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Description Summary</th>
                                <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                            </tr>
                        </thead>

                        {{-- Table Body --}}
                        <tbody class="divide-y divide-gray-100">
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Badge --}}
                                <td class="px-6 py-8 whitespace-nowrap align-top">
                                    <span class="inline-block py-1 px-3 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-[10px] font-bold uppercase tracking-wider">
                                        {{ $header->badge }}
                                    </span>
                                </td>

                                {{-- Title --}}
                                <td class="px-6 py-8 align-top">
                                    <div class="text-sm font-bold text-gray-900 uppercase tracking-tight">
                                        {{ $header->title }}
                                    </div>
                                </td>

                                {{-- Description --}}
                                <td class="px-6 py-8 align-top">
                                    <p class="text-sm text-gray-500 max-w-md leading-relaxed">
                                        {{ $header->description }}
                                    </p>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-8 text-center align-top">
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('projects-header.edit', $header->id) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Header">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                {{-- Decorative Footer --}}
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                    <span class="text-xs text-gray-400 italic font-medium">
                        <i class="fas fa-info-circle mr-1"></i> This content appears at the top of the "Our Masterpieces" page.
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></span>
                        Live on Site
                    </span>
                </div>
            </div>
        @else
            {{-- Empty State --}}
            <div class="text-center p-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                <div class="flex flex-col items-center">
                    <div class="h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-project-diagram text-2xl text-gray-300"></i>
                    </div>
                    <p class="text-gray-500 font-medium text-lg">No header data available.</p>
                    <p class="text-gray-400 text-sm mb-6">Please seed your database to manage this section.</p>
                </div>
            </div>
        @endif
    </div>
@endsection