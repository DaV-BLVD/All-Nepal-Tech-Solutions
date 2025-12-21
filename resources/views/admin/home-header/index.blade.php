@extends('admin.layouts.app')

@section('content')
<div class="p-8 max-w-7xl mx-auto bg-gray-50 min-h-screen">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                <span class="p-2 bg-indigo-600 rounded-lg text-white">
                    <i class="fas fa-desktop text-sm"></i>
                </span>
                Hero Section Management
            </h1>
            <p class="text-slate-500 text-sm mt-1 ml-11">Review your landing page headline and responsive assets.</p>
        </div>
        <a href="{{ route('home-header.edit', $header->id) }}"
            class="flex items-center justify-center gap-2 bg-[#2f2f73] text-white px-6 py-2.5 rounded-xl font-semibold shadow-lg hover:bg-opacity-90 transition-all">
            <i class="fas fa-pen text-xs"></i>
            Edit Hero Content
        </a>
    </div>

    {{-- Top Section: Text & Content Preview --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8">
        <div class="border-b border-slate-100 bg-slate-50/50 px-6 py-3">
            <h3 class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Live Typography & CTA</h3>
        </div>
        <div class="p-8">
            <div class="max-w-3xl">
                <span class="px-3 py-1 bg-indigo-50 text-indigo-700 rounded-md text-xs font-bold uppercase tracking-wider">
                    {{ $header->badge }}
                </span>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-[#2f2f73] mt-6 leading-tight">
                    {{ $header->title }} 
                    <span class="text-indigo-600">{{ $header->title_highlight }}</span>
                </h2>
                <p class="text-slate-600 mt-6 text-lg leading-relaxed font-medium">
                    {{ $header->description }}
                </p>
                
                <div class="mt-8 flex items-center gap-6 pt-6 border-t border-slate-100">
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-2">Button Preview</span>
                        <div class="bg-[#2f2f73] text-white px-8 py-3 rounded-lg font-bold shadow-md inline-block">
                            {{ $header->button_text }}
                        </div>
                    </div>
                    <div>
                        <span class="text-[10px] font-bold text-slate-400 uppercase block mb-2">Destination URL</span>
                        <code class="text-sm bg-slate-100 px-3 py-2 rounded text-indigo-600 font-mono">{{ $header->button_link }}</code>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Section: Horizontal Image Previews --}}
    <h3 class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-4 ml-1">Responsive Backgrounds</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach([
            ['label' => 'Laptop / Desktop', 'key' => 'image_laptop', 'icon' => 'fa-laptop', 'ratio' => 'aspect-video'],
            ['label' => 'Tablet Device', 'key' => 'image_tablet', 'icon' => 'fa-tablet-alt', 'ratio' => 'aspect-square'],
            ['label' => 'Mobile Phone', 'key' => 'image_mobile', 'icon' => 'fa-mobile-alt', 'ratio' => 'aspect-[3/4]']
        ] as $device)
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-200 flex flex-col">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-sm font-bold text-slate-700 flex items-center gap-2">
                        <i class="fas {{ $device['icon'] }} text-indigo-500"></i>
                        {{ $device['label'] }}
                    </span>
                    @if($header->{$device['key']})
                        <span class="flex h-2 w-2 rounded-full bg-green-500"></span>
                    @else
                        <span class="text-[10px] text-red-400 font-bold uppercase">Missing</span>
                    @endif
                </div>
                
                <div class="relative rounded-xl overflow-hidden bg-slate-100 border border-slate-100 mt-auto">
                    <img src="{{ $header->{$device['key']} ? asset('storage/' . $header->{$device['key']}) : 'https://placehold.co/600x600?text=No+Image' }}"
                         class="w-full {{ $device['ratio'] }} object-cover hover:scale-105 transition-transform duration-700">
                </div>
                
                <div class="mt-4 flex justify-between items-center text-[10px] text-slate-400 font-mono">
                    <span>PATH: .../{{ Str::limit($header->{$device['key']}, 15) }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection