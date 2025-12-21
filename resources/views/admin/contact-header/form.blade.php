@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('contact-header.index') }}" class="text-indigo-600 font-semibold flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to View
            </a>
        </div>

        <form action="{{ route('contact-header.update', $header->id) }}" method="POST"
            class="bg-white rounded-2xl shadow-xl border overflow-hidden">
            @csrf @method('PUT')
            <div class="bg-primary px-8 py-6 border-b text-white">
                <h2 class="text-xl font-bold">Edit Contact Header Content</h2>
            </div>

            <div class="p-8 space-y-6">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Title</label>
                    <input type="text" name="title" value="{{ $header->title }}"
                        class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase mb-2">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full border rounded-xl p-3 focus:ring-2 focus:ring-indigo-500 outline-none">{{ $header->description }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-indigo-50 rounded-2xl">
                    <div>
                        <label class="block text-xs font-bold text-indigo-600 uppercase mb-2">Support Icon Class</label>
                        <input type="text" name="support_icon" value="{{ $header->support_icon }}"
                            class="w-full border rounded-lg p-2" placeholder="fas fa-headset">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-indigo-600 uppercase mb-2">Support Badge Text</label>
                        <input type="text" name="support_text" value="{{ $header->support_text }}"
                            class="w-full border rounded-lg p-2" placeholder="24/7 Support Available">
                    </div>
                </div>

                <div class="flex justify-end gap-4 border-t pt-6">
                    <a href="{{ route('contact-header.index') }}" class="py-3 px-6 text-gray-500">Cancel</a>
                    <button type="submit"
                        class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition-all">
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection