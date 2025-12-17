@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900"><i class="fas fa-concierge-bell mr-2 text-indigo-600"></i>
                    Our Services</h1>
                <p class="text-gray-500">Manage the service cards displayed on the About page.</p>
            </div>
            <a href="{{ route('about_services.create') }}"
                class="bg-primary text-white px-5 py-2.5 rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition-all">
                <i class="fas fa-plus mr-1"></i> Add New Service
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase text-white">Service</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase text-white">Theme</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase text-white">Features</th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($services as $s)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 bg-{{ $s->color_theme }}-500 text-white rounded-lg flex items-center justify-center">
                                        <i class="{{ $s->icon }}"></i>
                                    </div>
                                    <span class="font-bold text-gray-900">{{ $s->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-bold bg-{{ $s->color_theme }}-100 text-{{ $s->color_theme }}-700 capitalize">
                                    {{ $s->color_theme }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ count($s->features) }} points</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('about_services.edit', $s->id) }}"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('about_services.destroy', $s->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this service?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection