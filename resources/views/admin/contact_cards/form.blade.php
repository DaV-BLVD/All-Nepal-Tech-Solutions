@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('contact_cards.index') }}"
                        class="text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </a>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        {{ $card->exists ? 'Edit Contact Card' : 'Create New Card' }}
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-1 ml-8">
                    {{ $card->exists ? 'Modify the details for this contact block.' : 'Add a new contact information block to your website.' }}
                </p>
            </div>
        </div>

        <form action="{{ $card->exists ? route('contact_cards.update', $card) : route('contact_cards.store') }}"
            method="POST">
            @csrf
            @if($card->exists) @method('PUT') @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Column: Identity & Icon --}}
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 shadow-xl rounded-2xl border border-gray-200">
                        <h3
                            class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6 border-b border-gray-50 pb-2">
                            Visual Identity</h3>

                        <div class="space-y-5">
                            {{-- Title Input --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Card
                                    Title</label>
                                <input type="text" name="title" value="{{ old('title', $card->title) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm placeholder-gray-400"
                                    placeholder="e.g., Office Address" required>
                                @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Icon Input with Preview --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Icon
                                    (FontAwesome)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-indigo-500">
                                        <i class="{{ old('icon', $card->icon ?? 'fas fa-info-circle') }} text-lg"
                                            id="icon-preview"></i>
                                    </span>
                                    <input type="text" name="icon" id="icon-input" value="{{ old('icon', $card->icon) }}"
                                        class="w-full pl-11 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                        placeholder="fas fa-map-marker-alt" required>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2 uppercase tracking-tight">Preview updates as you
                                    type</p>
                            </div>
                        </div>
                    </div>

                    {{-- Sorting Panel --}}
                    <div class="bg-gray-900 p-6 shadow-xl rounded-2xl text-white">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Display
                            Priority</label>
                        <input type="number" name="order" value="{{ old('order', $card->order ?? 0) }}"
                            class="w-full bg-gray-800 border-none text-white px-4 py-3 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all text-center text-xl font-bold"
                            placeholder="0">
                        <p class="text-[10px] text-gray-500 mt-3 text-center italic">Lower numbers appear first on the
                            website.</p>
                    </div>
                </div>

                {{-- Right Column: Contact Details Content --}}
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 h-full flex flex-col">
                        <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
                            <h3 class="text-lg font-bold text-gray-800 tracking-tight">Information Lines</h3>
                        </div>

                        <div class="p-8 space-y-8 flex-grow">
                            {{-- Line 1 --}}
                            <div class="relative group">
                                <label
                                    class="block text-xs font-bold text-indigo-600 uppercase tracking-widest mb-2">Primary
                                    Line (Required)</label>
                                <input type="text" name="line1" value="{{ old('line1', $card->line1) }}"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all text-lg font-medium"
                                    placeholder="e.g., 123 Business Avenue, New York" required>
                                @error('line1') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Line 2 --}}
                            <div class="relative group">
                                <label
                                    class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Secondary
                                    Line (Optional)</label>
                                <input type="text" name="line2" value="{{ old('line2', $card->line2) }}"
                                    class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all text-lg font-medium"
                                    placeholder="e.g., Suite 450, 4th Floor">
                                @error('line2') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Form Help --}}
                            <div class="mt-4 p-4 rounded-xl bg-amber-50 border border-amber-100 flex items-start space-x-3">
                                <i class="fas fa-lightbulb text-amber-500 mt-1"></i>
                                <p class="text-xs text-amber-800 leading-relaxed">
                                    <strong>Tip:</strong> Use Line 1 for the main info (Phone, Address, Email) and Line 2
                                    for supplementary details (Work hours, floor number).
                                </p>
                            </div>
                        </div>

                        {{-- Action Footer --}}
                        <div
                            class="px-8 py-6 bg-gray-50 border-t border-gray-100 rounded-b-2xl flex items-center justify-end space-x-4">
                            <a href="{{ route('contact_cards.index') }}"
                                class="text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                                Discard Changes
                            </a>
                            <button type="submit"
                                class="px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                                <i class="fas fa-save mr-2"></i> {{ $card->exists ? 'Update Card' : 'Save Card' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Script for Live Icon Preview --}}
    <script>
        const iconInput = document.getElementById('icon-input');
        const iconPreview = document.getElementById('icon-preview');

        iconInput.addEventListener('input', function () {
            iconPreview.className = this.value || 'fas fa-info-circle';
        });
    </script>
@endsection