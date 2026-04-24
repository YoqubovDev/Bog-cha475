<x-layout>
    <x-slot:title>Guruhlar - Sevinch 475</x-slot:title>

    <section class="py-24 bg-gradient-to-br from-unipix-dark via-blue-900 to-unipix-blue relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-unipix-light rounded-full -translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-5xl md:text-6xl font-serif font-bold text-white mb-6 uppercase tracking-widest drop-shadow-lg">
                Bizning Guruhlarimiz
            </h1>
            <div class="w-32 h-1.5 bg-yellow-400 mx-auto mb-8 rounded-full shadow-lg"></div>
            <p class="text-blue-100 max-w-2xl mx-auto text-xl leading-relaxed font-light italic">
                Har bir guruhimiz o'ziga xos tarbiyaviy yo'nalishga ega va bolalar uchun qulay ta'lim muhiti yaratadi.
            </p>
        </div>
    </section>

    <section class="py-20 bg-white" x-data="{ 
        zoomImage: false,
        zoomedImageSrc: ''
    }">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($groups as $group)
                    <div class="bg-white rounded-[3rem] shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-slate-50 overflow-hidden group transition-all duration-500 hover:-translate-y-4 hover:shadow-[0_30px_60px_rgba(22,17,121,0.15)] flex flex-col">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('storage/' . $group->image) }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                                 alt="{{ $group->name }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-900/20 to-transparent flex items-end p-10">
                                <div>
                                    <h3 class="text-3xl font-bold text-white mb-2">{{ $group->name }}</h3>
                                    <p class="text-yellow-400 text-xs font-black uppercase tracking-[0.2em]">{{ $group->direction }}</p>
                                </div>
                            </div>
                            <div class="absolute top-8 right-8 scale-0 group-hover:scale-100 transition-transform duration-500">
                                <button @click.stop="zoomedImageSrc = '{{ asset('storage/' . $group->image) }}'; zoomImage = true" 
                                        class="w-14 h-14 bg-white/90 text-blue-900 rounded-2xl shadow-2xl backdrop-blur-md flex items-center justify-center hover:bg-white hover:scale-110 transition-all">
                                    <i class="fas fa-search-plus text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <div class="p-10 flex flex-col flex-grow">
                            <div class="flex items-center justify-between mb-10 pb-8 border-b border-slate-50">
                                <div>
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Tarkib</p>
                                    <div class="flex -space-x-4">
                                        @foreach($group->students->take(4) as $student)
                                            <div class="relative group/student">
                                                <img src="{{ asset('storage/' . $student->image) }}" class="w-12 h-12 rounded-2xl border-4 border-white object-cover shadow-lg transition-transform group-hover/student:-translate-y-2">
                                            </div>
                                        @endforeach
                                        @if($group->students->count() > 4)
                                            <div class="w-12 h-12 rounded-2xl border-4 border-white bg-blue-50 flex items-center justify-center text-blue-600 font-black text-xs shadow-lg">
                                                +{{ $group->students->count() - 4 }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3">Status</p>
                                    <div class="inline-flex items-center px-4 py-1.5 bg-green-50 text-green-600 rounded-full text-[10px] font-black uppercase tracking-widest border border-green-100">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                        Faol
                                    </div>
                                </div>
                            </div>

                            <div class="mt-auto flex items-center justify-between">
                                <a href="{{ route('groups.show', $group) }}" class="inline-flex items-center text-blue-600 font-black text-sm uppercase tracking-widest group/link">
                                    Batafsil ma'lumot 
                                    <i class="fas fa-arrow-right ml-3 text-xs group-hover/link:translate-x-3 transition-transform"></i>
                                </a>
                                <div class="flex flex-col items-end">
                                    <div class="flex gap-1 mb-1">
                                        @for($i = 0; $i < 5; $i++)
                                            <i class="fas fa-star text-[10px] text-yellow-400"></i>
                                        @endfor
                                    </div>
                                    <p class="text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ $group->result_percentage }}% Natija</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Image Zoom Modal -->
        <div x-show="zoomImage" 
             class="fixed inset-0 z-[3000] bg-slate-950/98 backdrop-blur-2xl p-8 flex items-center justify-center"
             x-cloak
             @click="zoomImage = false"
             x-transition:enter="transition opacity duration-300"
             x-transition:leave="transition opacity duration-200">
            <button class="absolute top-10 right-10 text-white text-5xl hover:text-yellow-400 transition-all hover:rotate-90">
                <i class="fas fa-times"></i>
            </button>
            <img :src="zoomedImageSrc" class="max-w-full max-h-full object-contain rounded-3xl shadow-[0_0_100px_rgba(255,255,255,0.1)]">
        </div>
    </section>
</x-layout>
