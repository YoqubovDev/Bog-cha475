<x-header></x-header>

<div class="bg-gradient-to-b from-blue-900 via-blue-800 to-blue-900 min-h-screen text-slate-900">
    <div class="container mx-auto px-4 py-20">
        <div class="bg-white rounded-[3rem] shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 xl:grid-cols-[360px_minmax(0,1fr)]">
                <div class="bg-[#eef6ff] p-10 xl:p-12 border-r border-slate-200">
                    <div class="rounded-[2.5rem] overflow-hidden shadow-2xl bg-white mb-8">
                        <img src="{{ $group->image ? asset('storage/' . $group->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->name) }}" alt="{{ $group->name }}" class="w-full h-72 object-cover">
                    </div>

                    <div class="mb-8">
                        <h1 class="text-5xl font-black text-slate-900 mb-4">{{ $group->name }}</h1>
                        <div class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-blue-700 text-white uppercase tracking-[0.25em] text-xs font-extrabold shadow-lg">
                            {{ $group->direction }}</div>
                    </div>

                    <div class="space-y-4">
                        <a href="#info" class="block px-6 py-5 rounded-3xl bg-blue-700 text-white font-bold shadow-lg transition hover:bg-blue-800">
                            <i class="fas fa-info-circle mr-3"></i> Guruh haqida
                        </a>
                        <a href="#results" class="block px-6 py-5 rounded-3xl bg-white text-slate-900 font-bold shadow-lg border border-slate-200 transition hover:bg-slate-50">
                            <i class="fas fa-chart-line mr-3 text-blue-700"></i> Natijalar
                        </a>
                    </div>
                </div>

                <div class="p-12 xl:p-16">
                    <div class="mb-12">
                        <h2 class="text-sm uppercase tracking-[0.35em] text-blue-500 mb-4">Mas'ullar</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="rounded-[2rem] border border-blue-100 bg-blue-50 p-6 shadow-sm">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-20 h-20 rounded-3xl overflow-hidden bg-white shadow-lg">
                                        <img src="{{ $group->teacher && $group->teacher->image ? asset('storage/' . $group->teacher->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->teacher?->name ?? 'Asosiy T') }}" alt="Asosiy tarbiyachi" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="text-[10px] uppercase tracking-[0.25em] text-slate-400">Asosiy tarbiyachi</p>
                                        <p class="text-xl font-black text-slate-900">{{ $group->teacher?->name ?? 'Mavjud emas' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="rounded-[2rem] border border-yellow-100 bg-yellow-50 p-6 shadow-sm">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-20 h-20 rounded-3xl overflow-hidden bg-white shadow-lg">
                                        <img src="{{ $group->assistant && $group->assistant->image ? asset('storage/' . $group->assistant->image) : 'https://ui-avatars.com/api/?name=' . urlencode($group->assistant?->name ?? 'Yordamchi') }}" alt="Yordamchi" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="text-[10px] uppercase tracking-[0.25em] text-slate-500">Yordamchi</p>
                                        <p class="text-xl font-black text-slate-900">{{ $group->assistant?->name ?? 'Mavjud emas' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="info" class="mb-14">
                        <h3 class="text-3xl font-black text-slate-900 mb-8 uppercase tracking-[0.2em]">Tarbiya haqida</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                                <p class="text-sm uppercase tracking-[0.25em] text-slate-400 mb-3">Guruh nomi</p>
                                <p class="font-bold text-slate-900 text-lg">{{ $group->name }}</p>
                            </div>
                            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                                <p class="text-sm uppercase tracking-[0.25em] text-slate-400 mb-3">Ta’lim yo’nalishi</p>
                                <p class="font-bold text-slate-900 text-lg">{{ $group->direction }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-14">
                        <h3 class="text-3xl font-black text-slate-900 mb-8 uppercase tracking-[0.2em]">Tarbiyalanuvchilar (Bolalar)</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-6">
                            @foreach($group->students as $student)
                                <div class="rounded-[2rem] border border-slate-200 bg-white p-5 text-center shadow-sm">
                                    <div class="mx-auto mb-4 h-24 w-24 rounded-3xl overflow-hidden bg-slate-100">
                                        <img src="{{ $student->image ? asset('storage/' . $student->image) : 'https://ui-avatars.com/api/?name=' . urlencode($student->name) }}" alt="{{ $student->name }}" class="w-full h-full object-cover">
                                    </div>
                                    <p class="font-bold text-slate-900">{{ $student->name }}</p>
                                    <p class="text-xs uppercase tracking-[0.2em] text-slate-400 mt-2">O'quvchi</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="results">
                        <h3 class="text-3xl font-black text-slate-900 mb-8 uppercase tracking-[0.2em]">Natijalar</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Umumiy natija</p>
                                    <span class="text-2xl font-black text-blue-700">{{ $group->result_percentage ?? 0 }}%</span>
                                </div>
                                <p class="text-slate-600">Guruhning o'quv va tarbiya ko'rsatkichlari asosiy ko'rsatkichga muvofiq hisoblandi.</p>
                            </div>
                            <div class="rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-xs uppercase tracking-[0.25em] text-slate-400">Faollik</p>
                                    <span class="text-2xl font-black text-emerald-600">Faol</span>
                                </div>
                                <p class="text-slate-600">Guruh sizning ta’lim dasturingiz asosida faol rioya etilmoqda.</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('subject') }}" class="inline-flex items-center gap-2 rounded-full bg-slate-900 px-7 py-4 text-sm font-black text-white shadow-xl transition hover:bg-slate-800">
                            <i class="fas fa-arrow-left"></i> Orqaga qaytish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>
