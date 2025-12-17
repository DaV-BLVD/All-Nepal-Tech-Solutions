@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-6">
            {{-- Title for the Section Management --}}
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">🏢 Company Section Details (The Left Side)</h1>
        </div>

        {{-- Section Content Card --}}
        @if($section)
            <div class="bg-white shadow-xl rounded-lg border border-gray-200 p-6 sm:p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 border-b pb-3">Section Content</h3>

                {{-- Detail Fields --}}
                <div class="space-y-4">
                    {{-- Small Title --}}
                    <div class="border-l-4 border-primary pl-4 py-1">
                        <p class="text-sm font-medium text-gray-500">Small Title</p>
                        <p class="text-lg font-bold text-gray-900">{{ $section->small_title }}</p>
                    </div>

                    {{-- Main Title --}}
                    <div class="border-l-4 border-indigo-400 pl-4 py-1">
                        <p class="text-sm font-medium text-gray-500">Main Title</p>
                        <p class="text-lg font-bold text-gray-900">{{ $section->main_title }}</p>
                    </div>

                    {{-- Highlight Title --}}
                    <div class="border-l-4 border-green-400 pl-4 py-1">
                        <p class="text-sm font-medium text-gray-500">Highlight Title (If used)</p>
                        <p class="text-lg font-bold text-gray-900">{{ $section->highlight_title }}</p>
                    </div>
                </div>

                {{-- Edit Button --}}
                <div class="mt-8 pt-4 border-t">
                    <a href="{{ route('section.edit', $section) }}"
                        class="inline-flex items-center space-x-2 bg-primary text-white px-4 py-2 rounded-lg font-semibold transition-colors hover:bg-indigo-700 shadow-lg focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                        <i class="fas fa-edit"></i>
                        <span>Edit Section Content</span>
                    </a>
                </div>
            </div>
        @else
            {{-- Empty State --}}
            <div class="bg-white p-12 text-center rounded-lg shadow-lg border border-gray-200">
                <i class="fas fa-exclamation-circle text-5xl text-red-500 mb-4"></i>
                <p class="text-xl text-gray-600 font-semibold">No Company Section data found.</p>
                <p class="text-gray-500 mt-2">You need to create the initial section record.</p>
                {{-- If you have a route to create the section, you can add it here --}}
                {{-- <a href="{{ route('section.create') }}"
                    class="mt-4 inline-block bg-primary text-white px-6 py-2 rounded-lg font-semibold hover:bg-indigo-700">Create
                    Section</a> --}}
            </div>
        @endif

    </div>
@endsection