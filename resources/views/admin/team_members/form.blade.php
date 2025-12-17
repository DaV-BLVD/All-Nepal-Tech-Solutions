@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-{{ isset($teamMember) ? 'user-edit' : 'user-plus' }} mr-2 text-indigo-600"></i>
                    {{ isset($teamMember) ? 'Edit Team Member' : 'Add New Member' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Fill in the details below to update your team's professional profile.
                </p>
            </div>
        </div>

        {{-- Form Card --}}
        <div class="bg-white p-8 shadow-xl rounded-2xl border border-gray-200">
            <form
                action="{{ isset($teamMember) ? route('team_members.update', $teamMember->id) : route('team_members.store') }}"
                method="POST" enctype="multipart/form-data">

                @csrf
                @if(isset($teamMember))
                    @method('PUT')
                @endif

                <div class="space-y-6">
                    {{-- Row 1: Name & Role --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Full
                                Name</label>
                            <input type="text" name="name" value="{{ old('name', $teamMember->name ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                placeholder="e.g. John Doe" required>
                            @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Professional
                                Role</label>
                            <input type="text" name="role" value="{{ old('role', $teamMember->role ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                placeholder="e.g. System Administrator" required>
                            @error('role') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 2: Specialization & Company --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Area of
                                Specialization</label>
                            <input type="text" name="specialization"
                                value="{{ old('specialization', $teamMember->specialization ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                placeholder="e.g. Cyber Security" required>
                            @error('specialization') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Company /
                                Agency</label>
                            <input type="text" name="company" value="{{ old('company', $teamMember->company ?? '') }}"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm placeholder-gray-400"
                                placeholder="e.g. Shangrila Blu">
                            @error('company') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Row 3: Image Upload & Status --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Profile
                                Photo</label>
                            <div
                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-image text-gray-400 text-3xl mb-2"></i>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image"
                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" {{ isset($teamMember) ? '' : 'required' }}>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-400 font-medium">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>

                            @if(isset($teamMember) && $teamMember->image)
                                <div class="mt-4 flex items-center p-2 border border-gray-100 rounded-lg bg-gray-50 w-fit">
                                    <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Current Image"
                                        class="w-16 h-16 object-cover rounded-lg shadow-sm border border-white">
                                    <span class="ml-3 text-xs font-semibold text-gray-500 italic">Current Portrait</span>
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Profile
                                Visibility</label>
                            <select name="is_active"
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 shadow-sm bg-white cursor-pointer">
                                <option value="1" {{ (old('is_active', $teamMember->is_active ?? 1) == 1) ? 'selected' : '' }}>🟢 Active (Published)</option>
                                <option value="0" {{ (old('is_active', $teamMember->is_active ?? 1) == 0) ? 'selected' : '' }}>🔴 Inactive (Hidden)</option>
                            </select>
                            <p class="mt-2 text-xs text-gray-400 italic">Hidden members will not appear in the website
                                swiper.</p>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="pt-8 mt-6 border-t border-gray-100 flex items-center space-x-4">
                        <button type="submit"
                            class="flex-1 md:flex-none px-10 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-200 shadow-lg shadow-indigo-100">
                            <i class="fas fa-save mr-2"></i>
                            {{ isset($teamMember) ? 'Save Changes' : 'Create Team Member' }}
                        </button>

                        <a href="{{ route('team_members.index') }}"
                            class="px-8 py-3 bg-gray-100 text-gray-600 rounded-xl font-bold hover:bg-gray-200 transition-all text-center">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection