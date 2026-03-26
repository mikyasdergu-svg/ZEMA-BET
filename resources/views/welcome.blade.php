@extends('layouts.app')
@section('title', 'እንኳን ደህና መጡ')

@section('content')
<style>
    .welcome-bg {
        background-image: url('{{ asset('images/begena-page.jpg') }}');
        background-attachment: fixed;
    }
</style>

<div class="fixed inset-0 -z-30 h-full w-full bg-cover bg-center welcome-bg">
    <div class="absolute inset-0 bg-stone-900/60 backdrop-blur-[1px]"></div>
</div>

<div class="relative py-12 text-center text-white">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-5xl md:text-7xl font-black mb-6 text-amber-500 tracking-tighter">
            ዜማ ቤት
        </h1>
        <p class="text-2xl md:text-3xl font-medium mb-10 text-stone-200">
            Master the Art of Ethiopian Music
        </p>
        
        <div class="flex flex-wrap justify-center gap-6">
            <a href="/courses" class="bg-amber-600 hover:bg-amber-700 text-[#2d1b0d] px-10 py-4 rounded-xl font-black text-xl transition-all shadow-2xl border-b-4 border-amber-800">
                ትምህርቶችን ይመልከቱ (Explore Courses)
            </a>
            <a href="/live" class="bg-white/10 backdrop-blur-md hover:bg-white/20 text-white border-2 border-white/30 px-10 py-4 rounded-xl font-bold text-xl transition-all">
                ቀጥታ ስርጭት (Live Sessions)
            </a>
        </div>
    </div>

    <div class="mt-24 grid md:grid-cols-3 gap-8 text-left">
        @foreach($courses as $course)
            <div class="bg-[#2d1b0d]/80 backdrop-blur-md border-t-4 border-amber-600 p-6 rounded-2xl shadow-2xl">
                <h3 class="text-xl font-bold text-amber-400">{{ $course->title }}</h3>
                <p class="text-stone-300 mt-2 text-sm line-clamp-2">{{ $course->description }}</p>
                <a href="/courses/{{ $course->id }}" class="inline-block mt-4 text-amber-500 font-bold hover:text-white transition">
                    ተጨማሪ ይመልከቱ →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection