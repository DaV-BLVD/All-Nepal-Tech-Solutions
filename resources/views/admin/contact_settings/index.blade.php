@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-bullhorn mr-2 text-indigo-600"></i> CTA Sections
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the "Contact Us" call-to-action sections across the site.</p>
            </div>
        </div>

        {{-- Stats/Overview Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                <div class="text-gray-400 text-xs font-bold uppercase tracking-wider mb-1">Total Versions</div>
                <div class="text-2xl font-black text-gray-800">{{ $settings->count() }}</div>
            </div>
            <div class="bg-indigo-50 p-6 rounded-2xl border border-indigo-100 shadow-sm">
                <div class="text-indigo-400 text-xs font-bold uppercase tracking-wider mb-1">Active Phone</div>
                <div class="text-2xl font-black text-indigo-700">{{ $settings->first()->phone ?? 'None Set' }}</div>
            </div>
        </div>

        {{-- Content Table --}}
        <div class="bg-primary shadow-xl rounded-2xl border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-widest">Preview
                            Content</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-widest">Contact
                            Info</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-white uppercase tracking-widest">Button
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-white uppercase tracking-widest">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($settings as $setting)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="max-w-md">
                                    <div class="text-sm font-bold text-gray-900 truncate">{{ $setting->title }}</div>
                                    <div class="text-xs text-gray-500 line-clamp-1 mt-1">{{ $setting->description }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                    <i class="fas fa-phone-alt mr-2 text-[10px]"></i> {{ $setting->phone }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="text-xs font-semibold text-gray-700">{{ $setting->button_text }}</div>
                                <div class="text-[10px] text-indigo-400 font-mono">{{ $setting->button_link }}</div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end items-center space-x-2">
                                    <a href="{{ route('contact_settings.edit', $setting) }}"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"
                                        title="Edit CTA">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <div class="flex flex-col items-center">
                                    <div
                                        class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4 text-gray-300">
                                        <i class="fas fa-comment-slash text-2xl"></i>
                                    </div>
                                    <p class="text-gray-400 font-medium">No CTA configurations found.</p>
                                    <a href="{{ route('contact_settings.create') }}"
                                        class="mt-2 text-indigo-600 text-sm hover:underline font-semibold">Create one now</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection