@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-black aspect-video rounded-3xl shadow-2xl overflow-hidden border border-white/10">
        @if($lesson->video_url)
            <video controls class="w-full h-full">
                <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
            </video>
        @else
            <div class="w-full h-full flex items-center justify-center text-white italic">Video currently unavailable</div>
        @endif
    </div>

    <div class="mt-10 text-white bg-white/10 p-10 rounded-3xl backdrop-blur-md border border-white/10">
        <h1 class="text-4xl font-bold">{{ $lesson->title }}</h1>
        <p class="mt-6 text-gray-300 text-lg leading-relaxed">{{ $lesson->description }}</p>
    </div>
</div>
@endsection