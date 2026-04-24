<x-layout>
    <x-slot:title>{{ $group->name }} - Sevinch 475</x-slot:title>

    <div class="bg-gradient-to-br from-unipix-dark via-blue-900 to-blue-800 py-20">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-[3.5rem] shadow-[0_40px_100px_rgba(0,0,0,0.2)] overflow-hidden border border-white/20">
                <div class="grid grid-cols-1 xl:grid-cols-[420px_minmax(0,1fr)]">
                    <!-- Sidebar Info -->
                    <div class="bg-slate-50 p-12 lg:p-16 border-r border-slate-100 flex flex-col">
                        <div class="group relative rounded-[3rem] overflow-hidden shadow-2xl bg-white mb-10 aspect-[4/5]">
                            <img src="{{ $group->image ? asset('storage/' . $group->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->name) }}" alt="{{ $group->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/40 to-transparent"></div>
                        </div>

                        <div class="mb-10 text-center xl:text-left">
                            <h1 class="text-4xl md:text-5xl font-black text-blue-900 mb-4 leading-tight">{{ $group->name }}</h1>
                            <div class="inline-flex items-center px-6 py-2.5 bg-blue-600 text-white rounded-full text-[10px] font-black uppercase tracking-[0.25em] shadow-lg shadow-blue-200">
                                {{ $group->direction }}
                            </div>
                        </div>

                        <div class="space-y-4 pt-10 border-t border-slate-200 mt-auto">
                            <a href="#info" class="flex items-center justify-between p-6 rounded-3xl bg-blue-900 text-white font-bold shadow-xl transition-all hover:bg-blue-800 hover:-translate-y-1">
                                <span><i class="fas fa-info-circle mr-3 opacity-50"></i> Guruh haqida</span>
                                <i class="fas fa-chevron-right text-xs opacity-30"></i>
                            </a>
                            <a href="#results" class="flex items-center justify-between p-6 rounded-3xl bg-white text-blue-900 font-bold shadow-lg border border-slate-200 transition-all hover:bg-slate-50 hover:-translate-y-1">
                                <span><i class="fas fa-chart-line mr-3 text-blue-600 opacity-50"></i> Natijalar</span>
                                <i class="fas fa-chevron-right text-xs opacity-30"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Main Content area -->
                    <div class="p-12 lg:p-20">
                        <!-- Teachers Section -->
                        <div class="mb-20">
                            <h4 class="text-xs font-black text-slate-400 uppercase tracking-[0.35em] mb-8 flex items-center gap-4">
                                Mas'ul xodimlar
                                <span class="h-px bg-slate-100 flex-grow"></span>
                            </h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="group/card rounded-[3rem] border border-blue-100 bg-blue-50/50 p-8 shadow-sm transition-all hover:shadow-xl hover:bg-blue-50">
                                    <div class="flex items-center gap-6">
                                        <div class="w-24 h-24 rounded-[2rem] overflow-hidden bg-white shadow-xl group-hover/card:scale-110 transition-transform">
                                            <img src="{{ $group->teacher && $group->teacher->image ? asset('storage/' . $group->teacher->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->teacher?->name ?? 'Asosiy T') }}" alt="Asosiy tarbiyachi" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-blue-400 mb-1">Asosiy tarbiyachi</p>
                                            <p class="text-2xl font-bold text-blue-900">{{ $group->teacher?->name ?? 'Mavjud emas' }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="group/card rounded-[3rem] border border-yellow-100 bg-yellow-50/50 p-8 shadow-sm transition-all hover:shadow-xl hover:bg-yellow-50">
                                    <div class="flex items-center gap-6">
                                        <div class="w-24 h-24 rounded-[2rem] overflow-hidden bg-white shadow-xl group-hover/card:scale-110 transition-transform">
                                            <img src="{{ $group->assistant && $group->assistant->image ? asset('storage/' . $group->assistant->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->assistant?->name ?? 'Yordamchi') }}" alt="Yordamchi" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-yellow-600 mb-1">Yordamchi</p>
                                            <p class="text-2xl font-bold text-blue-900">{{ $group->assistant?->name ?? 'Mavjud emas' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Students Section -->
                        <div class="mb-20">
                            <div class="flex items-center justify-between mb-10">
                                <h3 class="text-3xl font-bold text-blue-900">Tarbiyalanuvchilar</h3>
                                <span class="bg-slate-100 text-slate-500 px-5 py-2 rounded-2xl text-xs font-black uppercase tracking-widest">
                                    {{ $group->students->count() }} nafar
                                </span>
                            </div>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-8">
                                @foreach($group->students as $student)
                                    <div class="group/child text-center p-6 rounded-[2.5rem] border border-slate-50 transition-all hover:shadow-xl hover:bg-white hover:-translate-y-2">
                                        <div class="mx-auto mb-6 h-28 w-28 rounded-[2rem] overflow-hidden bg-slate-50 border-4 border-white shadow-lg transition-all group-hover/child:rotate-6">
                                            <img src="{{ $student->image ? asset('storage/' . $student->image) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) }}" alt="{{ $student->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <p class="font-bold text-blue-900 text-sm leading-tight px-2">{{ $student->name }}</p>
                                        <p class="text-[9px] font-black uppercase tracking-[0.2em] text-slate-300 mt-2 italic">Bolajon</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Results Section -->
                        <div id="results" class="mb-14 pt-10 border-t border-slate-100">
                            <h3 class="text-3xl font-bold text-blue-900 mb-10">Guruh Natijalari</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="rounded-[2.5rem] bg-gradient-to-br from-blue-600 to-blue-800 p-10 text-white shadow-2xl relative overflow-hidden group">
                                    <i class="fas fa-award absolute -bottom-4 -right-4 text-9xl text-white/10 group-hover:rotate-12 transition-transform duration-700"></i>
                                    <div class="relative z-10">
                                        <p class="text-[10px] font-black uppercase tracking-[0.3em] text-blue-200 mb-4">O'zlashtirish</p>
                                        <div class="text-6xl font-black mb-4">{{ $group->result_percentage ?? 0 }}%</div>
                                        <p class="text-blue-100/80 leading-relaxed font-light">Guruhning o'quv va tarbiya ko'rsatkichlari tizim tomonidan avtomatik hisoblandi.</p>
                                    </div>
                                </div>
                                <div class="rounded-[2.5rem] border border-emerald-100 bg-emerald-50/50 p-10 group overflow-hidden relative">
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-4">
                                            <p class="text-[10px] font-black uppercase tracking-[0.3em] text-emerald-500">Status</p>
                                            <span class="w-3 h-3 bg-emerald-500 rounded-full animate-ping"></span>
                                        </div>
                                        <div class="text-5xl font-black text-emerald-600 mb-4 uppercase tracking-tighter italic">Faol</div>
                                        <p class="text-slate-600 font-medium leading-relaxed">Guruh ta'lim dasturiga to'liq rioya qilgan holda faoliyat ko'rsatmoqda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-16 flex items-center gap-10">
                            <a href="{{ route('subject') }}" class="group inline-flex items-center gap-4 rounded-full bg-slate-900 px-10 py-5 text-sm font-black text-white shadow-2xl transition-all hover:bg-slate-800 hover:-translate-x-2">
                                <i class="fas fa-arrow-left group-hover:-translate-x-2 transition-transform"></i> 
                                Orqaga qaytish
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
