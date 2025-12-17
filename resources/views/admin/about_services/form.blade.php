@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto" x-data="{ 
        features: {{ json_encode($service->features ?? ['']) }},
        color: '{{ $service->color_theme ?? 'blue' }}',
        icon: '{{ $service->icon ?? 'fas fa-headset' }}'
    }">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                    <i class="fas fa-concierge-bell mr-2 text-indigo-600"></i>
                    {{ $service->id ? 'Edit Service' : 'Create New Service' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">Configure the service details and features displayed on your frontend.</p>
            </div>
            
            {{-- Visual Preview Badge --}}
            <div class="hidden md:flex items-center space-x-3 bg-white p-3 rounded-2xl border border-gray-100 shadow-sm">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-widest ml-2">Live Preview Icon:</span>
                <div :class="`h-12 w-12 flex items-center justify-center rounded-xl transition-all duration-300 bg-${color}-500 shadow-lg`" >
                    <i :class="`${icon} text-white text-xl` text-white text-xl"></i>
                </div>
            </div>
        </div>

        <form action="{{ $service->id ? route('about_services.update', $service->id) : route('about_services.store') }}"
            method="POST">
            @csrf
            @if($service->id) @method('PUT') @endif

            <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-200 space-y-8">
                
                {{-- Basic Info Grid --}}
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Service Title</label>
                        <input type="text" name="title" value="{{ old('title', $service->title) }}" placeholder="e.g. Cloud & Infrastructure"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-3 transition-all">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Color Theme</label>
                        <select name="color_theme" x-model="color"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 p-3 transition-all">
                            @foreach(['blue', 'purple', 'green', 'orange', 'cyan', 'red', 'indigo'] as $color)
                                <option value="{{ $color }}" {{ $service->color_theme == $color ? 'selected' : '' }}>
                                    {{ ucfirst($color) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Icon and Description --}}
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="md:col-span-1">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Icon Class</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                <i :class="icon"></i>
                            </span>
                            <input type="text" name="icon" x-model="icon" value="{{ old('icon', $service->icon) }}"
                                class="w-full pl-10 border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 p-3 transition-all"
                                placeholder="fas fa-headset">
                        </div>
                        <p class="text-[10px] text-gray-400 mt-2 italic">Use FontAwesome 5/6 classes</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Short Description</label>
                        <textarea name="description" rows="1"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 p-3 transition-all"
                            placeholder="Briefly describe what this service offers...">{{ old('description', $service->description) }}</textarea>
                    </div>
                </div>

                <hr class="border-gray-100">

                {{-- Key Features Section --}}
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-4 uppercase tracking-wide items-center">
                        <i class="fas fa-list-ul mr-2 text-indigo-500"></i> Key Features / Offerings
                    </label>
                    
                    <div class="space-y-3">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex items-center space-x-3 group">
                                <div class="flex-1 relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-300 group-hover:text-indigo-400 transition-colors">
                                        <i class="fas fa-check-circle text-xs"></i>
                                    </span>
                                    <input type="text" name="features[]" x-model="features[index]"
                                        class="w-full pl-9 border-gray-300 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 p-2.5 transition-all"
                                        placeholder="Add a service feature...">
                                </div>
                                <button type="button" @click="features.splice(index, 1)" 
                                    class="text-gray-300 hover:text-red-500 transition-colors p-2">
                                    <i class="fas fa-times-circle text-lg"></i>
                                </button>
                            </div>
                        </template>
                    </div>

                    <button type="button" @click="features.push('')" 
                        class="mt-4 inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-600 text-sm font-bold rounded-lg hover:bg-indigo-100 transition-all">
                        <i class="fas fa-plus-circle mr-2"></i> Add Feature Point
                    </button>
                </div>

                {{-- Action Footer --}}
                <div class="pt-8 border-t border-gray-100 flex items-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-12 py-3.5 rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 hover:-translate-y-0.5 transition-all duration-200">
                        <i class="fas fa-save mr-2"></i> {{ $service->id ? 'Update Service' : 'Create Service' }}
                    </button>
                    <a href="{{ route('about_services.index') }}" 
                        class="ml-6 text-gray-400 font-bold hover:text-gray-600 transition-all">
                        Cancel & Return
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection