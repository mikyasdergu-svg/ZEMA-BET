@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4">
    <div class="mb-10 border-b-2 border-amber-800/30 pb-6">
        <h1 class="text-4xl font-black text-amber-900">የቀጥታ ስርጭት ትምህርቶች</h1>
        <p class="text-stone-600 mt-2 text-lg italic">"Master the Art of Ethiopian Music in Real-Time"</p>
    </div>

    <div class="grid gap-8">
        @forelse($upcomingClasses as $class)
            <div class="relative group">
                @if($class->is_active)
                    <div class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-red-600 rounded-2xl blur opacity-25 animate-pulse"></div>
                @endif

                <div class="relative bg-white/80 backdrop-blur-md border {{ $class->is_active ? 'border-amber-600' : 'border-stone-200' }} p-8 rounded-2xl shadow-xl flex flex-col md:flex-row justify-between items-center gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            @if($class->is_active)
                                <span class="bg-red-700 text-white text-[10px] font-black px-3 py-1 rounded-full tracking-widest uppercase animate-bounce">
                                    አሁን በቀጥታ (LIVE)
                                </span>
                            @else
                                <span class="text-stone-500 font-bold text-sm">
                                     📅 {{ $class->start_time->format('M d, Y') }} | {{ $class->start_time->format('h:i A') }}
                                </span>
                            @endif
                        </div>
                        
                        <h2 class="text-3xl font-bold text-stone-900">{{ $class->title }}</h2>
                        <p class="text-stone-700 mt-2 leading-relaxed">{{ $class->description }}</p>
                    </div>

                    <div class="shrink-0 w-full md:w-auto">
                        @if($class->is_active)
                            <a href="{{ $class->meeting_link }}" target="_blank" 
                               class="block text-center bg-[#2d1b0d] hover:bg-amber-900 text-amber-400 px-10 py-4 rounded-xl font-black text-lg shadow-lg transition-transform hover:scale-105 border-2 border-amber-600">
                                ወደ ትምህርቱ ይግቡ (JOIN NOW)
                            </a>
                        @else
                            <div class="text-center bg-stone-100 border border-stone-200 text-stone-400 px-10 py-4 rounded-xl font-bold text-lg">
                                በቅርብ ቀን ይጠብቁ
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-24 bg-stone-100/50 rounded-3xl border-2 border-dashed border-stone-300">
                <p class="text-2xl text-stone-400 font-medium italic">በአሁኑ ጊዜ ምንም የታቀዱ ትምህርቶች የሉም።</p>
                <p class="text-stone-500 mt-2">(No live sessions scheduled at the moment.)</p>
            </div>
        @endforelse
    </div>
</div>
@endsection