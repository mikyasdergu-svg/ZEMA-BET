@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    @foreach($courses as $course)
    <div class="bg-white/80 backdrop-blur-md rounded-3xl overflow-hidden shadow-2xl border border-white/30 group">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 group-hover:text-amber-600 transition">{{ $course->title }}</h2>
            <p class="text-gray-600 mt-4 line-clamp-3">{{ $course->description }}</p>
            <div class="mt-8 flex items-center justify-between">
                <span class="text-sm font-bold uppercase tracking-widest text-amber-700 bg-amber-100 px-3 py-1 rounded-lg">
                    {{ $course->instrument_type }}
                </span>
                <a href="/courses/{{ $course->id }}" class="font-bold text-gray-900 hover:underline">View Lessons →</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection