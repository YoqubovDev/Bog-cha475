<x-header></x-header>

<div class="font-sans bg-gray-50 overflow-x-hidden" x-data="{ 
    zoomImage: false,
    zoomedImageSrc: ''
}">
    <section class="py-16 bg-gradient-to-r from-blue-900 via-unipix-blue to-blue-800 relative">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4 uppercase tracking-wider">
                Guruhlar
            </h1>
            <div class="w-24 h-1.5 bg-yellow-400 mx-auto mb-6 rounded-full"></div>
            <p class="text-blue-100 max-w-2xl mx-auto text-lg font-light">
                Har bir guruhimiz o'ziga xos tarbiyaviy yo'nalishga ega va bolalar uchun qulay ta'lim muhiti yaratadi.
            </p>
        </div>
    </section>

    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($groups as $group)
                <div class="bg-white rounded-[2.5rem] shadow-xl border border-gray-100 overflow-hidden group transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative h-64 overflow-hidden">
                        <img src="{{ asset('storage/' . $group->image) }}" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                             alt="{{ $group->name }}">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent flex items-end p-8">
                            <div>
                                <h3 class="text-3xl font-black text-white mb-1">{{ $group->name }}</h3>
                                <p class="text-blue-100/90 text-sm font-medium tracking-wide uppercase">{{ $group->direction }}</p>
                            </div>
                        </div>
                        <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button @click.stop="zoomedImageSrc = '{{ asset('storage/' . $group->image) }}'; zoomImage = true" 
                                    class="p-4 bg-white/90 text-blue-900 rounded-2xl shadow-xl backdrop-blur-sm hover:scale-110 transition-transform">
                                <i class="fas fa-search-plus text-xl"></i>
                            </button>
                        </div>
                    </div>

                    <div class="p-8">
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex -space-x-3">
                                @foreach($group->students->take(4) as $student)
                                <img src="{{ asset('storage/' . $student->image) }}" class="w-12 h-12 rounded-2xl border-4 border-white object-cover">
                                @endforeach
                                @if($group->students->count() > 4)
                                <div class="w-12 h-12 rounded-2xl border-4 border-white bg-blue-50 flex items-center justify-center text-blue-600 font-bold text-xs">
                                    +{{ $group->students->count() - 4 }}
                                </div>
                                @endif
                            </div>
                            <div class="text-right">
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">Status</p>
                                <p class="text-xs font-bold text-green-500 flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                    Faol guruh
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <a href="{{ route('groups.show', $group) }}" class="flex items-center text-blue-800 font-black text-sm uppercase tracking-widest hover:text-blue-900">
                                Batafsil ma'lumot <i class="fas fa-arrow-right ml-3 text-xs group-hover:translate-x-2 transition-transform"></i>
                            </a>
                            <div class="bg-yellow-400 text-blue-900 px-4 py-1.5 rounded-xl font-black text-[10px] uppercase tracking-tighter shadow-sm">
                                {{ $group->result_percentage }}% Natija
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <div x-show="zoomImage" 
         class="fixed inset-0 z-[200] bg-black/95 p-8 flex items-center justify-center"
         x-cloak
         @click="zoomImage = false"
         x-transition:enter="transition opacity duration-300"
         x-transition:leave="transition opacity duration-200">
        <button class="absolute top-10 right-10 text-white text-4xl hover:text-red-500 transition-colors">
            <i class="fas fa-times"></i>
        </button>
        <img :src="zoomedImageSrc" class="max-w-full max-h-full object-contain rounded-2xl shadow-2xl">
    </div>

    <x-footer></x-footer>
</div>

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
