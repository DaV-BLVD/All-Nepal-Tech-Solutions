@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-edit mr-2 text-indigo-600"></i> Update Statements
                </h1>
                <p class="text-sm text-gray-500 mt-1">Refine your mission and vision to align with current goals.</p>
            </div>
        </div>

        <form action="{{ route('company_statement.update', $statement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-8">
                {{-- Mission Card --}}
                <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center uppercase tracking-widest">
                        <span class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center mr-3">
                            <i class="fas fa-bullseye text-sm"></i>
                        </span>
                        Mission Statement
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Detailed Text</label>
                            <textarea name="mission_text" rows="4" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm placeholder-gray-400">{{ old('mission_text', $statement->mission_text) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Mission Highlights (Bullet Points)</label>
                            <div id="mission-points-container" class="space-y-3">
                                @foreach($statement->mission_points ?? [''] as $point)
                                    <div class="flex items-center space-x-2 point-row">
                                        <input type="text" name="mission_points[]" value="{{ $point }}"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-indigo-500" placeholder="e.g. Scalable Solutions">
                                        <button type="button" onclick="removeRow(this)" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addRow('mission-points-container', 'mission_points[]')" 
                                class="mt-3 inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                <i class="fas fa-plus-circle mr-1"></i> Add Another Point
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Vision Card --}}
                <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-6 flex items-center uppercase tracking-widest">
                        <span class="w-8 h-8 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mr-3">
                            <i class="fas fa-eye text-sm"></i>
                        </span>
                        Vision Statement
                    </h2>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Detailed Text</label>
                            <textarea name="vision_text" rows="4" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all shadow-sm placeholder-gray-400">{{ old('vision_text', $statement->vision_text) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Vision Highlights (Bullet Points)</label>
                            <div id="vision-points-container" class="space-y-3">
                                @foreach($statement->vision_points ?? [''] as $point)
                                    <div class="flex items-center space-x-2 point-row">
                                        <input type="text" name="vision_points[]" value="{{ $point }}"
                                            class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-indigo-500" placeholder="e.g. Industry Leadership">
                                        <button type="button" onclick="removeRow(this)" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                                            <i class="fas fa-minus-circle"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addRow('vision-points-container', 'vision_points[]')" 
                                class="mt-3 inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                <i class="fas fa-plus-circle mr-1"></i> Add Another Point
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center space-x-4 pt-4 mt-6 border-t border-gray-100">
                    <button type="submit"
                        class="px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                        <i class="fas fa-save mr-2"></i> Save All Changes
                    </button>
                    <a href="{{ route('company_statement.index') }}" 
                        class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    {{-- Script for Dynamic Rows --}}
    <script>
        function addRow(containerId, inputName) {
            const container = document.getElementById(containerId);
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2 point-row';
            div.innerHTML = `
                <input type="text" name="${inputName}" class="flex-1 px-4 py-2 border border-gray-300 rounded-xl focus:ring-indigo-500 shadow-sm" placeholder="Enter highlight...">
                <button type="button" onclick="removeRow(this)" class="text-gray-400 hover:text-red-500 transition-colors p-2">
                    <i class="fas fa-minus-circle"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function removeRow(btn) {
            const rows = btn.closest('.space-y-3').querySelectorAll('.point-row');
            if (rows.length > 1) {
                btn.closest('.point-row').remove();
            } else {
                alert('At least one point is required.');
            }
        }
    </script>
@endsection