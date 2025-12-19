@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('social_links.index') }}"
                        class="text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </a>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        {{ $link->exists ? 'Edit Social Link' : 'Add New Platform' }}
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-1 ml-8">
                    {{ $link->exists ? 'Update your social media profile details.' : 'Connect a new social media profile to your website.' }}
                </p>
            </div>
        </div>

        <form action="{{ $link->exists ? route('social_links.update', $link) : route('social_links.store') }}"
            method="POST">
            @csrf
            @if($link->exists) @method('PUT') @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Left Column: Brand & Icon --}}
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 shadow-xl rounded-2xl border border-gray-200">
                        <h3
                            class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6 border-b border-gray-50 pb-2">
                            Brand Identity</h3>

                        <div class="space-y-5">
                            {{-- Platform Name --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Platform
                                    Name</label>
                                <input type="text" name="platform" value="{{ old('platform', $link->platform) }}"
                                    class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm placeholder-gray-400"
                                    placeholder="e.g., LinkedIn" required>
                                @error('platform') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Icon Input with Live Preview --}}
                            <div>
                                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Icon
                                    Class</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                                        <div class="h-7 w-7 bg-indigo-50 rounded flex items-center justify-center">
                                            <i class="{{ old('icon', $link->icon ?? 'fas fa-link') }} text-indigo-600"
                                                id="icon-preview"></i>
                                        </div>
                                    </span>
                                    <input type="text" name="icon" id="icon-input" value="{{ old('icon', $link->icon) }}"
                                        class="w-full pl-12 pr-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm font-mono text-sm"
                                        placeholder="fab fa-facebook-f" required>
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2 italic uppercase">Use FontAwesome brands (e.g., fab
                                    fa-twitter)</p>
                            </div>
                        </div>
                    </div>

                    {{-- Sorting Panel --}}
                    <div class="bg-gray-900 p-6 shadow-xl rounded-2xl text-white">
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Display
                            Sequence</label>
                        <input type="number" name="order" value="{{ old('order', $link->order ?? 0) }}"
                            class="w-full bg-gray-800 border-none text-white px-4 py-3 rounded-xl focus:ring-2 focus:ring-indigo-500 transition-all text-center text-xl font-bold"
                            placeholder="0">
                        <p class="text-[10px] text-gray-500 mt-3 text-center italic">Items are sorted ascending (0, 1, 2...)
                        </p>
                    </div>
                </div>

                {{-- Right Column: Connection URL --}}
                <div class="lg:col-span-2">
                    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 h-full flex flex-col">
                        <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
                            <h3 class="text-lg font-bold text-gray-800 tracking-tight">Profile Link</h3>
                        </div>

                        <div class="p-8 space-y-6 flex-grow">
                            <div class="relative group">
                                <label class="block text-xs font-bold text-indigo-600 uppercase tracking-widest mb-3">Target
                                    URL</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-globe text-gray-300"></i>
                                    </div>
                                    <input type="url" name="url" value="{{ old('url', $link->url) }}"
                                        class="w-full pl-11 pr-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:bg-white focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all text-lg font-mono text-gray-700"
                                        placeholder="https://www.platform.com/your-profile" required>
                                </div>
                                @error('url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div class="bg-indigo-50 border border-indigo-100 p-5 rounded-2xl">
                                <h4 class="text-sm font-bold text-indigo-900 mb-2 flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i> Best Practices
                                </h4>
                                <ul class="text-xs text-indigo-700 space-y-2 list-disc list-inside opacity-80">
                                    <li>Always include <strong>https://</strong> in the URL.</li>
                                    <li>Test the link in a private tab before saving.</li>
                                    <li>Use brand-specific icons (e.g., <code
                                            class="bg-indigo-100 px-1 rounded">fab fa-instagram</code>).</li>
                                </ul>
                            </div>
                        </div>

                        {{-- Action Footer --}}
                        <div
                            class="px-8 py-6 bg-gray-50 border-t border-gray-100 rounded-b-2xl flex items-center justify-end space-x-4">
                            <a href="{{ route('social_links.index') }}"
                                class="text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                                Cancel
                            </a>
                            <button type="submit"
                                class="px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                                <i class="fas fa-save mr-2"></i> {{ $link->exists ? 'Update Link' : 'Publish Link' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Live Icon Preview Script --}}
    <script>
        const iconInput = document.getElementById('icon-input');
        const iconPreview = document.getElementById('icon-preview');

        iconInput.addEventListener('input', function () {
            // Default to link icon if input is cleared
            iconPreview.className = this.value.trim() !== '' ? this.value : 'fas fa-link';
        });
    </script>
@endsection