@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-envelope-open-text mr-2 text-indigo-600"></i> Consult Requests
                </h1>
                <p class="text-sm text-gray-500 mt-1">Review and manage client consultation inquiries and status.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-200 text-green-800 px-4 py-2 rounded-xl text-sm flex items-center shadow-sm">
                    <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                </div>
            @endif
        </div>

        {{-- Table Section (Card Layout) --}}
        <div class="overflow-hidden shadow-xl rounded-2xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    {{-- Table Header --}}
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Client Info</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Service Requested</th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-widest">Message Brief</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-widest">Actions</th>
                        </tr>
                    </thead>

                    {{-- Table Body --}}
                    <tbody class="divide-y divide-gray-100">
                        @forelse($consults as $consult)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                {{-- Client Info --}}
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-900">{{ $consult->first_name }} {{ $consult->last_name }}</span>
                                        <span class="text-xs text-gray-500"><i class="far fa-envelope mr-1"></i>{{ $consult->email }}</span>
                                    </div>
                                </td>

                                {{-- Service --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100">
                                        {{ $consult->service }}
                                    </span>
                                </td>

                                {{-- Message --}}
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 max-w-xs line-clamp-1 italic">
                                        "{{ Str::limit($consult->message, 50) }}"
                                    </p>
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 text-center">
                                    @if($consult->is_resolved)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-500"></span>
                                            Resolved
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                            <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="{{ route('consults.show', $consult) }}"
                                           class="p-2 text-blue-600 hover:bg-blue-600 hover:text-white rounded-lg transition-all"
                                           title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if(!$consult->is_resolved)
                                            <form action="{{ route('consults.resolve', $consult) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="p-2 text-green-600 hover:bg-green-600 hover:text-white rounded-lg transition-all"
                                                        title="Mark as Resolved">
                                                    <i class="fas fa-check-double"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('consults.undo', $consult) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit"
                                                        class="p-2 text-yellow-600 hover:bg-yellow-500 hover:text-white rounded-lg transition-all"
                                                        title="Undo Resolve">
                                                    <i class="fas fa-undo-alt"></i>
                                                </button>
                                            </form>
                                        @endif

                                        <form action="{{ route('consults.destroy', $consult) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this request?');"
                                              class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"
                                                    title="Delete Request">
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
                                        <i class="fas fa-inbox text-5xl text-gray-200 mb-4"></i>
                                        <p class="text-gray-500 font-medium">No consultation requests found.</p>
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