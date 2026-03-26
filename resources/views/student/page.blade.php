@extends('layouts.app')

@section('title', 'ዜማ ቤት - Ancient Ethiopian Music Academy')

@section('content')
<style>
    .ancient-bg {
        background-image: url('{{ asset('images/begena-page.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .course-card {
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(160, 82, 45, 0.8));
        border: 2px solid #daa520;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        border-color: #ffd700;
    }

    .ancient-text {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .golden-border {
        border-image: linear-gradient(45deg, #daa520, #ffd700, #daa520) 1;
    }
</style>

<div class="fixed inset-0 -z-30 h-full w-full ancient-bg">
    <div class="absolute inset-0 bg-gradient-to-b from-stone-900/40 via-amber-900/30 to-stone-900/60"></div>
    <div class="absolute inset-0 backdrop-blur-[0.5px]"></div>
</div>

<div class="relative py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Ancient Header Section -->
        <div class="text-center text-white mb-16">
            <div class="mb-8">
                <div class="inline-block bg-gradient-to-r from-amber-600 via-yellow-500 to-amber-600 p-1 rounded-2xl shadow-2xl">
                    <div class="bg-stone-900/90 backdrop-blur-md px-8 py-6 rounded-xl border border-amber-400/30">
                        <h1 class="text-5xl md:text-7xl font-black mb-4 text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-yellow-300 to-amber-400 ancient-text">
                            ዜማ ቤት
                        </h1>
                        <div class="w-32 h-1 bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto mb-4"></div>
                    </div>
                </div>
            </div>

            <!-- Courses Section -->
        <div class="bg-stone-900/40 backdrop-blur-md rounded-3xl p-8 border-2 golden-border shadow-2xl">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-amber-400 mb-4 ancient-text">ትምህርቶች (Courses)</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-transparent via-amber-400 to-transparent mx-auto"></div>
            </div>

            @if($courses->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-stone-800/60 backdrop-blur-md p-8 rounded-2xl border border-amber-400/20">
                        <p class="text-amber-200 text-xl mb-2">No courses available yet.</p>
                        <p class="text-amber-300/70 text-sm">The ancient wisdom is being prepared...</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($courses as $course)
                        <div class="course-card p-6 rounded-2xl group">
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                                    <span class="text-2xl">🎵</span>
                                </div>
                                <h3 class="text-xl font-bold text-amber-100 mb-3 ancient-text">{{ $course->title }}</h3>
                            </div>

                            <p class="text-amber-50/90 text-sm leading-relaxed mb-6 line-clamp-3">{{ $course->description }}</p>

                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold uppercase tracking-widest text-amber-300 bg-amber-900/50 px-3 py-1 rounded-full border border-amber-400/30">
                                    {{ $course->instrument_type ?? 'አጠቃላይ' }}
                                </span>
                                <a href="{{ route('courses.show', $course) }}" class="bg-gradient-to-r from-amber-600 to-yellow-500 text-stone-900 px-4 py-2 rounded-lg font-bold hover:from-amber-500 hover:to-yellow-400 transition-all shadow-lg border-b-2 border-amber-800 text-sm">
                                    ተጨማሪ ይመልከቱ →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Ancient Actions -->
        <div class="mt-12 text-center">
            <div class="bg-stone-900/60 backdrop-blur-md p-8 rounded-2xl border border-amber-400/20 shadow-2xl">
                <h3 class="text-2xl font-bold text-amber-400 mb-6 ancient-text">የተለመዱ ተግባራት</h3>
                <div class="flex flex-wrap justify-center gap-6">
                    <a href="{{ route('courses.index') }}" class="bg-gradient-to-r from-amber-600 to-yellow-500 hover:from-amber-500 hover:to-yellow-400 text-stone-900 px-8 py-4 rounded-xl font-bold transition-all shadow-lg border-b-4 border-amber-800 transform hover:scale-105">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">📚</span>
                            <span>ትምህርቶችን ይመልከቱ</span>
                        </div>
                    </a>
                    <a href="{{ route('live.index') }}" class="bg-stone-800/80 backdrop-blur-md hover:bg-stone-700/80 text-amber-200 border-2 border-amber-400/50 px-8 py-4 rounded-xl font-bold transition-all shadow-lg hover:border-amber-400 transform hover:scale-105">
                        <div class="flex items-center gap-3">
                            <span class="text-xl">🎭</span>
                            <span>ቀጥታ ስርጭት</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection