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
            <x-admin.card title="Sections" :count="$sectionCount" icon="fa-solid fa-th-large" />
            <x-admin.card title="Features" :count="$featureCount" icon="fa-solid fa-cogs" />
            <x-admin.card title="Hire Us, Why Not?" :count="$excellenceCount" icon="fa-solid fa-star" />
            <x-admin.card title="Statistics" :count="$statisticsCount" icon="fa-solid fa-chart-line" />
            <x-admin.card title="Team Members" :count="$teamMemberCount" icon="fa-solid fa-users" />
            <x-admin.card title="Contact Settings" :count="$contactSettingCount" icon="fa-solid fa-envelope" />

            <x-admin.card title="Milestones" :count="$milestoneCount" icon="fa-solid fa-flag" />
            <x-admin.card title="Company Statements" :count="$companyStatementCount" icon="fa-solid fa-comment-dots" />
            <x-admin.card title="Core Values" :count="$coreValueCount" icon="fa-solid fa-heart" />
            <x-admin.card title="About Services" :count="$aboutServiceCount" icon="fa-solid fa-thumbs-up" />
            <x-admin.card title="Why Choose Us?" :count="$whyChooseUsCount" icon="fa-solid fa-question-circle" />

        </div>

    </div>
@endsection