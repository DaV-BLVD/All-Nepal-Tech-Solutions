@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <i class="fas fa-{{ $statistic->exists ? 'edit' : 'chart-line' }} mr-2 text-indigo-600"></i>
                {{ $statistic->exists ? 'Edit Statistic' : 'Add New Statistic' }}
            </h1>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-6 shadow-xl rounded-lg border border-gray-200">

            {{-- Form Starts --}}
            <form method="POST"
                action="{{ $statistic->exists ? route('statistics.update', $statistic) : route('statistics.store') }}">

                @csrf
                @if($statistic->exists) @method('PUT') @endif

                <div class="space-y-6">
                    {{-- Title Field --}}
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Statistic Label</label>
                        <input type="text" name="title" id="title" placeholder="e.g., Happy Clients"
                            value="{{ old('title', $statistic->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Value and Suffix Row --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Value Field --}}
                        <div>
                            <label for="value" class="block text-sm font-semibold text-gray-700 mb-2">Numerical Value</label>
                            <input type="number" name="value" id="value" placeholder="e.g., 250"
                                value="{{ old('value', $statistic->value) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                            @error('value')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Suffix Field --}}
                        <div>
                            <label for="suffix" class="block text-sm font-semibold text-gray-700 mb-2">Suffix (Optional)</label>
                            <input type="text" name="suffix" id="suffix" placeholder="e.g., +, %, or K"
                                value="{{ old('suffix', $statistic->suffix) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm" />
                            <p class="text-xs text-gray-500 mt-1">Appears immediately after the number.</p>
                            @error('suffix')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Status Checkbox --}}
                    <div class="pt-4 border-t">
                        <label for="is_active" class="inline-flex items-center group cursor-pointer">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $statistic->is_active) ? 'checked' : '' }}
                                class="w-5 h-5 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 transition duration-150">
                            <span class="ml-3 text-sm font-semibold text-gray-700 group-hover:text-indigo-600 transition duration-150">
                                Statistic is Active
                            </span>
                        </label>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center space-x-3 pt-6 border-t">
                        <button type="submit"
                            class="px-8 py-2 bg-indigo-600 text-white font-bold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg">
                            <i class="fas fa-save mr-2"></i> Save Statistic
                        </button>
                        
                        <a href="{{ route('statistics.index') }}"
                            class="px-6 py-2 bg-gray-100 text-gray-600 rounded-lg font-semibold hover:bg-gray-300 transition duration-150">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>

        {{-- Visual Preview Hint --}}
        <div class="mt-8 p-4 bg-indigo-50 rounded-lg border border-indigo-100">
            <p class="text-sm text-indigo-700">
                <i class="fas fa-eye mr-2"></i>
                <strong>Quick Preview:</strong> Your statistic will appear as 
                <span class="text-lg font-bold ml-1">
                    {{ $statistic->value ?? '0' }}{{ $statistic->suffix ?? '' }}
                </span> 
                {{ $statistic->title ?? 'Label' }}
            </p>
        </div>
    </div>
@endsection