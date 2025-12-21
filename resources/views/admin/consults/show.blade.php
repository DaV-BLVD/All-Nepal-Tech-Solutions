@extends('admin.layouts.app')

@section('content')
    <div class="p-6 max-w-5xl mx-auto">
        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('consults.index') }}" class="text-gray-400 hover:text-indigo-600 transition-colors">
                        <i class="fas fa-chevron-left text-xl"></i>
                    </a>
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                        Consultation Inquiry
                    </h1>
                </div>
                <p class="text-sm text-gray-500 mt-1 ml-8">Reference ID: #{{ str_pad($consult->id, 5, '0', STR_PAD_LEFT) }} • Submitted {{ $consult->created_at->diffForHumans() }}</p>
            </div>
            
            <div class="flex items-center space-x-3">
                @if($consult->is_resolved)
                    <span class="flex items-center px-4 py-1.5 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-wider border border-green-200">
                        <i class="fas fa-check-circle mr-2"></i> Resolved
                    </span>
                @else
                    <span class="flex items-center px-4 py-1.5 bg-amber-100 text-amber-700 rounded-full text-xs font-bold uppercase tracking-wider border border-amber-200 animate-pulse">
                        <i class="fas fa-clock mr-2"></i> Action Required
                    </span>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: Client Details --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-6 shadow-xl rounded-2xl border border-gray-200">
                    <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-6 border-b border-gray-50 pb-2">Client Information</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-3">
                            <div class="bg-indigo-50 p-2 rounded-lg text-indigo-600">
                                <i class="fas fa-user text-sm"></i>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-400 uppercase">Sender</label>
                                <p class="text-sm font-bold text-gray-900">{{ $consult->first_name }} {{ $consult->last_name }}</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="bg-indigo-50 p-2 rounded-lg text-indigo-600">
                                <i class="fas fa-envelope text-sm"></i>
                            </div>
                            <div class="break-all">
                                <label class="block text-xs font-medium text-gray-400 uppercase">Email</label>
                                <a href="mailto:{{ $consult->email }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors">
                                    {{ $consult->email }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <div class="bg-indigo-50 p-2 rounded-lg text-indigo-600">
                                <i class="fas fa-tag text-sm"></i>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-400 uppercase">Service Interested</label>
                                <p class="text-sm font-bold text-gray-900">{{ $consult->service }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Panel --}}
                <div class="bg-gray-900 p-6 shadow-xl rounded-2xl text-white">
                    <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest mb-4">Management</h3>
                    <div class="space-y-3">
                        @if(!$consult->is_resolved)
                            <form action="{{ route('consults.resolve', $consult) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 py-2.5 rounded-xl font-bold transition-all flex items-center justify-center">
                                    <i class="fas fa-check mr-2 text-xs"></i> Mark Resolved
                                </button>
                            </form>
                        @else
                            <form action="{{ route('consults.undo', $consult) }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full bg-gray-700 hover:bg-gray-600 py-2.5 rounded-xl font-bold transition-all flex items-center justify-center">
                                    <i class="fas fa-undo mr-2 text-xs"></i> Reopen
                                </button>
                            </form>
                        @endif
                        
                        <form action="{{ route('consults.destroy', $consult) }}" method="POST" onsubmit="return confirm('Delete permanently?');">
                            @csrf @method('DELETE')
                            <button class="w-full bg-transparent border border-gray-700 hover:border-red-500 hover:text-red-500 py-2.5 rounded-xl font-bold transition-all flex items-center justify-center">
                                <i class="fas fa-trash-alt mr-2 text-xs"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Right Column: Structured Message Body --}}
            <div class="lg:col-span-2">
                <div class="bg-white shadow-xl rounded-2xl border border-gray-200 h-full flex flex-col">
                    {{-- Message Header --}}
                    <div class="px-8 py-6 border-b border-gray-100 bg-gray-50/50 rounded-t-2xl">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-800 tracking-tight">Message Content</h3>
                            <i class="fas fa-quote-right text-gray-200 text-3xl"></i>
                        </div>
                    </div>

                    {{-- Structured Message Content --}}
                    <div class="p-8 flex-grow relative overflow-hidden">
                        {{-- Decorative Background Icon --}}
                        <div class="absolute -bottom-10 -right-10 opacity-[0.03] pointer-events-none">
                            <i class="fas fa-envelope-open-text text-[15rem]"></i>
                        </div>

                        <div class="relative z-10">
                            <div class="prose prose-indigo max-w-none">
                                {{-- The Message --}}
                                <p class="text-gray-700 leading-relaxed text-lg italic font-serif">
                                    {!! nl2br(e($consult->message)) !!}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Message Footer --}}
                    <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 rounded-b-2xl text-right">
                        <p class="text-xs text-gray-400 font-medium tracking-wide">
                            <i class="far fa-clock mr-1"></i> Logged at {{ $consult->created_at->format('H:i:s') }} server time
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection