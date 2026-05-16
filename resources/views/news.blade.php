<x-layout>
    <x-slot:title>Yangiliklar - Sevinch 475</x-slot:title>

    <div x-data="{ 
        showModal: false, 
        selectedNews: null,
        zoomImage: false,
        zoomedImageSrc: ''
    }">
        <!-- Hero Section -->
        <section class="py-24 bg-gradient-to-br from-[#0b2b4e] to-blue-900 text-white text-center relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-80 h-80 bg-blue-400 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white rounded-full blur-2xl text-blue-900"></div>
            </div>
            <div class="container mx-auto px-4 relative z-10">
                <h1 class="text-5xl md:text-6xl font-serif font-bold mb-6 italic">Yangiliklar & Tadbirlar</h1>
                <div class="w-24 h-1.5 bg-yellow-400 mx-auto mb-8 rounded-full"></div>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed italic">Bog'chamiz hayotidagi eng muhim voqealar va innovatsiyalar bilan tanishing</p>
            </div>
        </section>

        <!-- Latest News Section -->
        <section id="news" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex items-center gap-6 mb-16 px-4">
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-900 pr-4 whitespace-nowrap italic">So'nggi yangiliklar</h2>
                    <div class="h-1 bg-gradient-to-r from-blue-600 to-transparent flex-grow rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                    @forelse($news as $item)
                        <!-- News Card -->
                        <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-slate-100 shadow-[0_15px_40px_rgba(0,0,0,0.03)] transition-all duration-500 hover:-translate-y-4 hover:shadow-[0_30px_60px_rgba(22,17,121,0.12)] flex flex-col h-full">
                             <div class="aspect-video overflow-hidden relative cursor-zoom-in" @click="zoomedImageSrc = '{{ asset('storage/' . $item->image) }}'; zoomImage = true">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                @else
                                    <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                        <i class="fas fa-image text-3xl text-slate-300"></i>
                                    </div>
                                @endif
                                <!-- Protection Overlay -->
                                <div class="absolute inset-0 z-10 select-none" ></div>
                                <div class="absolute top-6 left-6 block bg-white/90 backdrop-blur px-4 py-2 rounded-2xl text-[10px] font-black uppercase tracking-widest text-blue-900 border border-white z-20">Fan & Ta'lim</div>
                            </div>
                            <div class="p-10 flex flex-col flex-grow">
                                <div class="flex items-center gap-3 text-sm text-slate-400 mb-4 font-bold italic">
                                    <i class="far fa-calendar-alt text-blue-500"></i>
                                    {{ $item->created_at->format('d.m.Y') }}
                                </div>
                                <h3 class="text-2xl font-bold text-blue-900 mb-4 group-hover:text-blue-600 transition-colors line-clamp-2">{{ $item->title }}</h3>
                                <p class="text-gray-500 leading-relaxed mb-8 line-clamp-3">
                                    {{ Str::limit(strip_tags($item->content), 120) }}
                                </p>
                                <button @click="selectedNews = {{ json_encode($item) }}; showModal = true" class="mt-auto inline-flex items-center gap-3 text-blue-600 font-black text-sm uppercase tracking-widest group/btn">
                                    Batafsil o'qish
                                    <div class="w-10 h-0.5 bg-blue-600 group-hover/btn:w-16 transition-all"></div>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-20 text-center bg-slate-50 rounded-[3rem]">
                            <i class="fas fa-newspaper text-5xl text-slate-200 mb-6"></i>
                            <p class="text-slate-400 font-bold uppercase tracking-widest">Hozircha yangiliklar yo'q</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- News Detail Modal -->
        <div x-show="showModal" 
             class="fixed inset-0 z-[2000] flex items-center justify-center p-4 md:p-8"
             x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="showModal = false">
            
            <!-- Modal Backdrop -->
            <div class="absolute inset-0 bg-slate-900/90 backdrop-blur-xl" @click="showModal = false"></div>

            <!-- Modal Content -->
            <div class="bg-white w-full max-w-4xl max-h-[90vh] rounded-[3rem] overflow-hidden shadow-2xl flex flex-col relative z-10" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="scale-95 translate-y-8"
                 x-transition:enter-end="scale-100 translate-y-0">
                
                <!-- Close Button -->
                <button @click="showModal = false" 
                        class="absolute top-8 right-8 z-[100] w-12 h-12 flex items-center justify-center rounded-2xl bg-white shadow-2xl text-slate-600 hover:text-red-600 transition-all hover:rotate-90 group">
                    <i class="fas fa-times text-2xl group-hover:scale-110 transition-transform"></i>
                </button>

                <div class="overflow-y-auto custom-scrollbar">
                    <div class="aspect-video w-full relative">
                        <img :src="'{{ asset('storage') }}/' + selectedNews?.image" 
                             class="w-full h-full object-cover" 
                             x-show="selectedNews?.image">
                        <!-- Protection Overlay -->
                        <div class="absolute inset-0 z-10 select-none" ></div>
                        <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent z-[15]"></div>
                    </div>
                    <div class="p-10 md:p-16 -mt-20 relative z-20 bg-white rounded-t-[3rem]">
                        <div class="inline-flex px-6 py-2 bg-blue-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg mb-8">
                           <i class="fas fa-calendar-day mr-2"></i> <span x-text="selectedNews ? new Date(selectedNews.created_at).toLocaleDateString() : ''"></span>
                        </div>
                        <h2 class="text-4xl md:text-5xl font-black text-blue-900 mb-8 leading-tight italic" x-text="selectedNews?.title"></h2>
                        <div class="prose prose-blue max-w-none text-gray-600 text-lg leading-relaxed space-y-6" x-html="selectedNews?.content"></div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="zoomImage" 
             class="fixed inset-0 z-[3000] bg-slate-950/98 backdrop-blur-2xl p-8 flex items-center justify-center"
             x-cloak
             @click="zoomImage = false"
             x-transition:enter="transition opacity duration-300"
             x-transition:leave="transition opacity duration-200"
             @keydown.escape.window="zoomImage = false">
            <button class="absolute top-10 right-10 text-white text-5xl hover:text-yellow-400 transition-all hover:rotate-90 z-[3001]">
                <i class="fas fa-times"></i>
            </button>
            <div class="relative group max-w-full max-h-full flex items-center justify-center" @click.stop>
                <img :src="zoomedImageSrc" class="max-w-full max-h-[85vh] object-contain rounded-3xl shadow-2xl border-4 border-white/10">
                <!-- Protection Overlay & Watermark -->
                <div class="absolute inset-0 z-10 flex items-center justify-center pointer-events-none opacity-40 select-none overflow-hidden">
                     <div class="text-green-500 text-2xl md:text-4xl font-black rotate-[-45deg] whitespace-nowrap uppercase tracking-[1em] opacity-60">
                         SEVINCH 475 • SEVINCH 475
                     </div>
                </div>
                <div class="absolute inset-0 z-[15] select-none" ></div>
            </div>
        </div>
    </div>
</x-layout>
