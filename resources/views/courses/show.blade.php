@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white/10 backdrop-blur-md p-10 rounded-3xl border border-white/20 text-white mb-10">
        <h1 class="text-5xl font-black">{{ $course->title }}</h1>
        <p class="mt-6 text-gray-300 text-lg leading-relaxed">{{ $course->description }}</p>
    </div>

    <div class="space-y-4">
        <h2 class="text-2xl font-bold text-white mb-6">Course Lessons</h2>
        @foreach($course->lessons as $lesson)
            <a href="/lessons/{{ $lesson->id }}" 
               class="flex items-center justify-between bg-white/90 p-6 rounded-2xl hover:bg-amber-50 transition-all shadow-xl group">
                <div class="flex items-center gap-6">
                    <div class="bg-amber-600 text-white w-12 h-12 rounded-full flex items-center justify-center font-black text-xl">
                        {{ $loop->iteration }}
                    </div>
                    <span class="text-xl font-bold text-gray-900 group-hover:text-amber-700">{{ $lesson->title }}</span>
                </div>
                <div class="text-amber-600 font-bold">Play →</div>
            </a>
        @endforeach
    </div>
</div>
@endsection