@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-share-alt mr-2 text-indigo-600"></i> Social Media Links
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the social media profiles and connection links displayed in
                    your website's footer and header.</p>
            </div>

            <div class="flex items-center space-x-4">
                @if(session('success'))
                    <div
                        class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded-xl text-sm flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('social_links.create') }}"
                    class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Add New Link</span>
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
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Platform</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">URL / Destination
                            </th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Order</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($links as $link)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Platform & Icon --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-10 w-10 flex items-center justify-center rounded-lg bg-gray-900 text-white shadow-sm">
                                            <i class="{{ $link->icon }} text-lg"></i>
                                        </div>
                                        <div class="text-sm font-bold text-gray-900 uppercase tracking-tight">
                                            {{ $link->platform }}
                                        </div>
                                    </div>
                                </td>

                                {{-- URL --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2 group">
                                        <span class="text-sm text-gray-500 truncate max-w-xs block font-mono">
                                            {{ $link->url }}
                                        </span>
                                        <a href="{{ $link->url }}" target="_blank"
                                            class="text-indigo-400 hover:text-indigo-600 transition-colors" title="Visit Link">
                                            <i class="fas fa-external-link-alt text-xs"></i>
                                        </a>
                                    </div>
                                </td>

                                {{-- Order --}}
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                        {{ $link->order }}
                                    </span>
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="{{ route('social_links.edit', $link) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Link">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('social_links.destroy', $link) }}" method="POST"
                                            onsubmit="return confirm('Remove this social link?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Link">
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
                                        <i class="fas fa-share-alt text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No social links configured.</p>
                                        <a href="{{ route('social_links.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm font-semibold">Add your first
                                            profile</a>
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