<x-layout>
    <x-slot:title>Fotogalereya - Sevinch 475</x-slot:title>

    <section class="py-24 bg-gradient-to-br from-unipix-dark via-blue-900 to-blue-800 text-white text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <h1 class="text-5xl font-serif font-bold mb-6">Bizning Fotogalereya</h1>
            <div class="w-24 h-1.5 bg-yellow-400 mx-auto mb-8 rounded-full"></div>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed italic">
                Bog'chamiz hayotidan eng yorqin lahzalar va qiziqarli tadbirlar.
            </p>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <!-- Example Photo Card 1 -->
                <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-lg transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl border border-slate-50">
                    <div class="aspect-square overflow-hidden relative">
                        <img src="{{ asset('student-with-gold-medal-mathematics-olympiad.jpg') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" alt="Galereya rasm">
                        <!-- Protection Overlay -->
                        <div class="absolute inset-0 z-10 select-none" ></div>
                        <div class="absolute inset-0 bg-blue-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-sm z-20">
                            <i class="fas fa-search-plus text-white text-4xl transform scale-50 group-hover:scale-100 transition-transform"></i>
                        </div>
                    </div>
                </div>
                <!-- ... other photos can be added here ... -->
            </div>
        </div>
    </section>
</x-layout>
