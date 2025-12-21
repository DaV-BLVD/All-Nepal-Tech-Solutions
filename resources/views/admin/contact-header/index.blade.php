@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-envelope-open-text mr-2 text-indigo-600"></i> Contact Header
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the hero section of your Contact page.</p>
            </div>

            <a href="{{ route('contact-header.edit', $header->id) }}"
                class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 shadow-lg shadow-indigo-100">
                <i class="fas fa-edit mr-2 text-xs"></i>Edit Header
            </a>
        </div>

        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Main Content</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Support Badge</th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="px-6 py-8 align-top">
                            <div class="max-w-md">
                                <div class="text-lg font-bold text-gray-900 mb-2">{{ $header->title }}</div>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ $header->description }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-8 align-top">
                            <div class="inline-flex items-center space-x-2 bg-gray-100 px-4 py-2 rounded-full border">
                                <i class="{{ $header->support_icon }} text-indigo-600"></i>
                                <span class="text-xs font-bold text-gray-700">{{ $header->support_text }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-8 text-center align-top">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Active
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection