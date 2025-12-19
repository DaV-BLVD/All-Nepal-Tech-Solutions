@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-address-card mr-2 text-indigo-600"></i> Contact Cards
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage the contact information blocks displayed on your website’s contact page.</p>
            </div>

            <div class="flex items-center space-x-4">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded-xl text-sm flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                {{-- <a href="{{ route('contact_cards.create') }}"
                    class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    <i class="fas fa-plus text-xs"></i>
                    <span>Add New Card</span>
                </a> --}}
            </div>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Icon</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Title & Sorting</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Contact Details</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($cards as $card)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Visual Icon --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="h-12 w-12 flex items-center justify-center rounded-xl bg-indigo-50 border border-indigo-100 shadow-sm">
                                        <i class="{{ $card->icon }} text-xl text-indigo-600"></i>
                                    </div>
                                </td>

                                {{-- Title & Order --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900 uppercase tracking-tight">{{ $card->title }}</div>
                                    <div class="text-xs text-gray-400 mt-1">Display Order: <span class="font-mono bg-gray-100 px-1.5 py-0.5 rounded">{{ $card->order }}</span></div>
                                </td>

                                {{-- Line 1 & 2 --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-700 font-medium">{{ $card->line1 }}</div>
                                    @if($card->line2)
                                        <div class="text-xs text-gray-500 mt-0.5 italic">{{ $card->line2 }}</div>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('contact_cards.edit', $card) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Card">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- <form action="{{ route('contact_cards.destroy', $card) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this contact card?');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Card">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-address-book text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No contact cards available.</p>
                                        <a href="{{ route('contact_cards.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm font-semibold">Create your first contact card</a>
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