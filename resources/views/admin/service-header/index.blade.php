@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-concierge-bell mr-2 text-indigo-600"></i> Service Header
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the hero content of your Services page.</p>
            </div>

            {{-- Edit Button --}}
            <a href="{{ route('service-header.edit', $header->id) }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <i class="fas fa-edit text-xs"></i>
                <span>Edit Header</span>
            </a>
        </div>

        {{-- Content Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Visual Elements</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Headline & Description</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">CTA Buttons</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Status</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-indigo-50/30 transition-colors">
                            {{-- Icon / Background Visual --}}
                            <td class="px-6 py-8 whitespace-nowrap align-top">
                                <div class="flex flex-col items-start space-y-3">
                                    <div class="h-14 w-14 flex items-center justify-center rounded-2xl bg-indigo-50 border border-indigo-100 shadow-sm">
                                        <i class="{{ $header->bg_icon }} text-3xl text-indigo-600"></i>
                                    </div>
                                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-tighter">BG Icon Class</span>
                                </div>
                            </td>

                            {{-- Title & Description --}}
                            <td class="px-6 py-8 align-top">
                                <div class="max-w-md">
                                    <div class="text-sm font-bold text-gray-900 uppercase tracking-tight mb-2">
                                        {{ $header->title }} <span class="text-red-600">{{ $header->highlighted_text }}</span>
                                    </div>
                                    <p class="text-sm text-gray-500 leading-relaxed">
                                        {{ $header->description }}
                                    </p>
                                </div>
                            </td>

                            {{-- Button Config --}}
                            <td class="px-6 py-8 align-top">
                                <div class="flex flex-col space-y-3">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                        <span class="text-xs font-semibold text-gray-700">{{ $header->btn_primary_text }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                        <span class="text-xs font-semibold text-gray-700">{{ $header->btn_secondary_text }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Actions/Status --}}
                            <td class="px-6 py-8 text-center align-top">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <span class="w-1.5 h-1.5 mr-2 rounded-full bg-green-500"></span>
                                    Active
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            {{-- Footer info to match the clean aesthetic --}}
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 text-xs text-gray-400 italic">
                Note: This header is a single-record resource. Editing will update the live services page hero section immediately.
            </div>
        </div>
    </div>
@endsection