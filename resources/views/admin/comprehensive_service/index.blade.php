@extends('admin.layouts.app')
@section('content')
    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900"><i class="fas fa-tools mr-2 text-indigo-600"></i> IT Services
            </h1>
            <a href="{{ route('comprehensive_services.create') }}"
                class="bg-primary text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-indigo-700 shadow-lg transition-all">
                <i class="fas fa-plus mr-2"></i> Add New Service
            </a>
        </div>

        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-primary text-white">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase">Icon</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase">Description</th>
                        <th class="px-6 py-4 text-center text-xs font-bold uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($services as $service)
                        <tr class="hover:bg-indigo-50/30 transition-colors">
                            <td class="px-6 py-4"><i class="{{ $service->icon_class }} text-xl text-indigo-600"></i></td>
                            <td class="px-6 py-4 font-bold text-gray-900">{{ $service->title }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ Str::limit($service->description, 80) }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('comprehensive_services.edit', $service) }}"
                                    class="p-2 text-indigo-600 hover:bg-indigo-600 hover:text-white rounded-lg transition-all"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('comprehensive_services.destroy', $service) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Delete this service?');">
                                    @csrf @method('DELETE')
                                    <button
                                        class="p-2 text-red-500 hover:bg-red-500 hover:text-white rounded-lg transition-all"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection