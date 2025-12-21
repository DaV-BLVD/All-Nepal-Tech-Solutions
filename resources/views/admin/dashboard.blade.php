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

            {{-- Users & Team --}}
            <x-admin.card title="Users" :count="$usersCount" icon="fa-solid fa-user-shield" />
            <x-admin.card title="Team Members" :count="$teamMemberCount" icon="fa-solid fa-users-viewfinder" />

            {{-- Core Content --}}
            <x-admin.card title="Services" :count="$serviceCount" icon="fa-solid fa-briefcase" />
            <x-admin.card title="Sections" :count="$sectionCount" icon="fa-solid fa-layer-group" />
            <x-admin.card title="Features" :count="$featureCount" icon="fa-solid fa-wand-magic-sparkles" />
            <x-admin.card title="Projects" :count="$projectsCount" icon="fa-solid fa-diagram-project" />

            {{-- Company Identity --}}
            <x-admin.card title="Hire Us, Why Not?" :count="$excellenceCount" icon="fa-solid fa-award" />
            <x-admin.card title="Milestones" :count="$milestoneCount" icon="fa-solid fa-trophy" />
            <x-admin.card title="Company Statements" :count="$companyStatementCount" icon="fa-solid fa-quote-left" />
            <x-admin.card title="Core Values" :count="$coreValueCount" icon="fa-solid fa-hand-holding-heart" />
            <x-admin.card title="Why Choose Us?" :count="$whyChooseUsCount" icon="fa-solid fa-circle-check" />

            {{-- Stats & Communication --}}
            <x-admin.card title="Statistics" :count="$statisticsCount" icon="fa-solid fa-chart-simple" />
            <x-admin.card title="Contact Settings" :count="$contactSettingCount" icon="fa-solid fa-sliders" />
            <x-admin.card title="Consult Contact" :count="$consultCount" icon="fa-solid fa-headset" />

            {{-- Service Page Specifics --}}
            <x-admin.card title="About Services" :count="$aboutServiceCount" icon="fa-solid fa-circle-info" />
            <x-admin.card title="Comprehensive Services" :count="$comprehensiveServiceCount" icon="fa-solid fa-microchip" />
            <x-admin.card title="Why Choose Us (Service Page)" :count="$whyChooseUsFeatureCount"
                icon="fa-solid fa-list-check" />

            {{-- Footer --}}
            <x-admin.card title="Footer Contact" :count="$contactCardCount" icon="fa-solid fa-address-card" />
            <x-admin.card title="Footer Social Links" :count="$socialCount" icon="fa-solid fa-share-nodes" />

        </div>
    </div>
@endsection