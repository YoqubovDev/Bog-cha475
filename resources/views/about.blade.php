<x-layout>
    <x-slot:title>Biz Haqimizda - Sevinch 475</x-slot:title>

    <!-- Hero Section -->
    <section class="py-24 bg-gradient-to-br from-unipix-dark to-blue-900 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-400 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6 italic">Sevinch 475 Bog'chasi</h1>
            <div class="w-24 h-1.5 bg-yellow-400 mx-auto mb-8 rounded-full"></div>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto font-light leading-relaxed italic">
                Bolangizning porloq kelajagi uchun ilk qadamlar biz bilan boshlanadi.
            </p>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="container mx-auto px-6 -mt-12 relative z-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-12 rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 text-center transform transition-all hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:rotate-12 transition-transform">
                    <i class="fas fa-user-friends text-white text-2xl"></i>
                </div>
                <h2 class="text-5xl font-black text-blue-900 mb-2">{{ $stat->students_count }}+</h2>
                <p class="text-blue-500 font-bold uppercase tracking-widest text-xs italic">Tarbiyalanuvchilar</p>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 text-center transform transition-all hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-yellow-400 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:-rotate-12 transition-transform">
                    <i class="fas fa-chalkboard-teacher text-blue-900 text-2xl"></i>
                </div>
                <h2 class="text-5xl font-black text-blue-900 mb-2">{{ $stat->qualified_teachers }}+</h2>
                <p class="text-yellow-600 font-bold uppercase tracking-widest text-xs italic">Malakali Ustozlar</p>
            </div>

            <div class="bg-white p-12 rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 text-center transform transition-all hover:-translate-y-2 group">
                <div class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:scale-110 transition-transform">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <h2 class="text-5xl font-black text-blue-900 mb-2">{{ $stat->graduation_rate }}</h2>
                <p class="text-slate-500 font-bold uppercase tracking-widest text-xs italic">Sifat ko'rsatkichi</p>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section id="news" class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-6 mb-16 px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-blue-900 pr-4 whitespace-nowrap italic">So'nggi yangiliklar</h2>
                <div class="h-1 bg-gradient-to-r from-blue-600 to-transparent flex-grow rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @forelse($news as $item)
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-[0_15px_40px_rgba(0,0,0,0.03)] transition-all duration-500 hover:-translate-y-4 hover:shadow-[0_30px_60px_rgba(22,17,121,0.12)]">
                        <div class="aspect-video overflow-hidden relative">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-slate-300"></i>
                                </div>
                            @endif
                            <div class="absolute top-6 left-6 bg-white/90 backdrop-blur px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest text-blue-900">Yangilik</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3 text-sm text-slate-400 mb-4 font-bold italic">
                                <i class="far fa-calendar-alt text-blue-500"></i>
                                {{ $item->published_at ? $item->published_at->format('d.m.Y') : $item->created_at->format('d.m.Y') }}
                            </div>
                            <h3 class="text-2xl font-bold text-blue-900 mb-4 group-hover:text-blue-600 transition-colors line-clamp-2">
                                {{ $item->title }}
                            </h3>
                            <p class="text-gray-500 leading-relaxed mb-8 line-clamp-3">
                                {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 120) }}
                            </p>
                            <a href="#" class="inline-flex items-center gap-3 text-blue-600 font-extrabold text-sm uppercase tracking-[0.2em] group/btn">
                                Batafsil
                                <div class="w-10 h-0.5 bg-blue-600 group-hover/btn:w-16 transition-all"></div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-slate-50 rounded-[3rem] py-20 text-center">
                        <i class="fas fa-newspaper text-4xl text-slate-200 mb-6"></i>
                        <p class="text-slate-400 font-bold uppercase tracking-widest text-sm">Hozircha yangiliklar mavjud emas</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
