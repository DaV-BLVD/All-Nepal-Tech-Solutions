@extends('admin.layouts.app')
@section('content')
<div class="p-6 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Why Choose Us Features</h1>
            <p class="text-sm text-gray-500">Manage the checkpoints and statistics shown in the blue section.</p>
        </div>
        <a href="{{ route('why_choose_us_services.create') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl font-bold hover:bg-indigo-700 shadow-lg transition-all">
            <i class="fas fa-plus mr-2"></i> Add Feature/Stat
        </a>
    </div>

    <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Main Text</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase">Label (Stats Only)</th>
                    <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($features as $f)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $f->type == 'stat' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                            {{ strtoupper($f->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900">{{ $f->title }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $f->subtitle ?? '-' }}</td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('why_choose_us_services.edit', $f) }}" class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('why_choose_us_services.destroy', $f) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection