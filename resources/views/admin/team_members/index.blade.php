@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-users mr-2 text-indigo-600"></i> Team Management
                </h1>
                <p class="text-sm text-gray-500 mt-1">Manage your professional team members and their public profiles.</p>
            </div>

            {{-- Add New Button --}}
            <a href="{{ route('team_members.create') }}"
                class="flex items-center space-x-2 bg-primary text-white px-5 py-2.5 rounded-xl font-semibold transition-all hover:bg-indigo-700 shadow-lg shadow-indigo-100 focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <i class="fas fa-plus text-xs"></i>
                <span>Add New Member</span>
            </a>
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Member Info</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Role &
                                Specialization</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Company</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($teamMembers as $member)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Member Info (Avatar + Name) --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full object-cover border-2 border-indigo-100 shadow-sm"
                                                src="{{ asset($member->image) }}" alt="{{ $member->name }}"
                                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($member->name) }}&color=7F9CF5&background=EBF4FF'">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900">{{ $member->name }}</div>
                                            <div class="text-xs text-gray-400">ID: #{{ $member->id }}</div>
                                        </div>
                                    </div>
                                </td>

                                {{-- Role & Specialization --}}
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-800">{{ $member->role }}</div>
                                    <div class="text-xs text-indigo-500 font-medium uppercase tracking-tight">
                                        {{ $member->specialization }}</div>
                                </td>

                                {{-- Company --}}
                                <td class="px-6 py-4 text-center">
                                    <span class="text-sm text-gray-600 bg-gray-100 px-3 py-1 rounded-md">
                                        {{ $member->company ?? 'N/A' }}
                                    </span>
                                </td>

                                {{-- Status Badge --}}
                                <td class="px-6 py-4 text-center">
                                    @if($member->is_active)
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                            <i class="fas fa-check-circle mr-1 mt-0.5"></i> Active
                                        </span>
                                    @else
                                        <span
                                            class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-400 border border-gray-200">
                                            <i class="fas fa-times-circle mr-1 mt-0.5"></i> Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-3">
                                        <a href="{{ route('team_members.edit', $member) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"
                                            title="Edit Member">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('team_members.destroy', $member) }}" method="POST"
                                            onsubmit="return confirm('Delete this team member? This action cannot be undone.');"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                title="Delete Member">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-user-friends text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No team members found in the database.</p>
                                        <a href="{{ route('team_members.create') }}"
                                            class="mt-2 text-indigo-600 hover:underline text-sm">Create your first member</a>
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