@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-full mx-auto">

        {{-- Dashboard Header --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight flex items-center">
                    <i class="fas fa-th-large mr-3 text-secondary"></i>
                    Dashboard Overview
                </h1>
                <p class="text-gray-500 mt-1 ml-1">Manage your website content and analytics.</p>
            </div>

            {{-- Optional Date or Action --}}
            <div class="hidden sm:block text-sm text-gray-400 font-medium">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>

        {{-- Content Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <x-admin.card title="Services" :count="$serviceCount" icon="fa-solid fa-gear" />
            <x-admin.card title="Features" :count="$featureCount" icon="fa-solid fa-cogs" />
            <x-admin.card title="Sections" :count="$sectionCount" icon="fa-solid fa-th-large" />

        </div>

    </div>
@endsection