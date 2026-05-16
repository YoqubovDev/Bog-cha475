<x-layout>
    <x-slot:title>Yutuqlarimiz - Sevinch 475</x-slot:title>

    <!-- Hero Section -->
    <section class="py-24 bg-gradient-to-br from-[#0b2b4e] via-blue-900 to-blue-800 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 pointer-events-none">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-yellow-400 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-400 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-5xl md:text-7xl font-serif font-black mb-6 italic tracking-tight">Kichkintoylarimiz Yutuqlari</h1>
            <div class="w-32 h-2 bg-yellow-400 mx-auto mb-8 rounded-full shadow-lg"></div>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed italic">
                Bog'chamizning har bir a'zosi o'ziga xos iqtidor egasi. Biz ularning har bir yutug'i bilan faxrlanamiz!
            </p>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-slate-50 relative -mt-12 z-20" x-data="{ 
        zoomImage: false,
        zoomedImageSrc: ''
    }">
        <div class="container mx-auto px-4">
            @if($achievements->isEmpty())
                <div class="bg-white rounded-[3rem] p-24 text-center shadow-2xl border border-slate-100">
                    <div class="w-24 h-24 bg-blue-50 rounded-3xl flex items-center justify-center mx-auto mb-8 rotate-12">
                        <i class="fas fa-trophy text-5xl text-blue-200"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">Hozircha yutuqlar qo'shilmagan</h3>
                    <p class="text-slate-400 max-w-md mx-auto">Tez orada bolajonlarimizning ajoyib natijalarini shu erda ko'rishingiz mumkin bo'ladi.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($achievements as $achievement)
                        <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-slate-100 transition-all duration-700 hover:-translate-y-4 hover:shadow-[0_40px_80px_rgba(11,43,78,0.15)] flex flex-col relative">
                            <!-- Image Container -->
                            <div class="relative aspect-square overflow-hidden cursor-zoom-in" 
                                 @click="zoomedImageSrc = '{{ asset('storage/' . $achievement->image) }}'; zoomImage = true">
                                @if($achievement->image)
                                    <img src="{{ asset('storage/' . $achievement->image) }}" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" alt="{{ $achievement->name }}">
                                @else
                                    <div class="w-full h-full bg-blue-50 flex items-center justify-center">
                                        <i class="fas fa-image text-4xl text-blue-200"></i>
                                    </div>
                                @endif
                                
                                <!-- Protection Overlay -->
                                <div class="absolute inset-0 z-10 select-none" ></div>
                                
                                <!-- Overlay on hover -->
                                <div class="absolute inset-0 bg-blue-900/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center backdrop-blur-[2px] z-20">
                                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-2xl transform scale-50 group-hover:scale-100 transition-transform duration-500">
                                        <i class="fas fa-search-plus text-blue-900 text-2xl"></i>
                                    </div>
                                </div>

                                <!-- Badge/Category Label -->
                                @if($achievement->badge || $achievement->category)
                                    <div class="absolute top-6 left-6">
                                        <span class="px-5 py-2 bg-white/90 backdrop-blur rounded-2xl text-[10px] font-black uppercase tracking-[0.2em] text-blue-900 shadow-xl border border-white">
                                            {{ $achievement->badge ?? $achievement->category }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Info area (Transparently shown or always shown) -->
                            <div class="p-8 pb-10 text-center">
                                <h3 class="text-2xl font-bold text-blue-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $achievement->name }}</h3>
                                <p class="text-slate-400 text-sm font-medium italic">{{ $achievement->description }}</p>
                            </div>

                            <!-- Playful Decoration -->
                            <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-yellow-400/10 rounded-full blur-xl group-hover:scale-150 transition-transform"></div>
                        </div>
                    @endforeach
                </div>
            @endif
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

            <div class="relative max-w-full max-h-full flex items-center justify-center" @click.stop>
                <img :src="zoomedImageSrc" class="max-w-full max-h-[85vh] object-contain rounded-[2rem] shadow-[0_0_100px_rgba(255,255,255,0.1)] border-4 border-white/10">
                <!-- Protection Overlay & Watermark -->
                <div class="absolute inset-0 z-10 flex items-center justify-center pointer-events-none opacity-40 select-none overflow-hidden">
                     <div class="text-green-500 text-2xl md:text-4xl font-black rotate-[-45deg] whitespace-nowrap uppercase tracking-[1em] opacity-60">
                          SEVINCH 475 • YUTUQ
                     </div>
                </div>
                <div class="absolute inset-0 z-[15] select-none" ></div>
            </div>
        </div>
    </section>

    <!-- Decoration Section -->
    <section class="py-20 bg-white overflow-hidden relative">
        <div class="container mx-auto px-4 text-center">
            <div class="inline-flex flex-wrap justify-center gap-12 opacity-30 grayscale hover:grayscale-0 transition-all duration-700">
                <i class="fas fa-star text-4xl text-yellow-400"></i>
                <i class="fas fa-child text-4xl text-blue-400"></i>
                <i class="fas fa-palette text-4xl text-pink-400"></i>
                <i class="fas fa-music text-4xl text-purple-400"></i>
                <i class="fas fa-medal text-4xl text-orange-400"></i>
            </div>
        </div>
    </section>
</x-layout>
