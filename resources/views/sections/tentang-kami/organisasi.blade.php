<!-- Struktur Organisasi Section -->
<section id="struktur-organisasi" class="py-32 bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-24">
            <span
                class="inline-block border border-gray-300 text-gray-500 px-4 py-1.5 text-[10px] font-subhead font-bold tracking-[0.25em] uppercase mb-10">
                Hierarki Kepemimpinan
            </span>
            <h2 class="text-on-surface text-4xl md:text-6xl font-headline font-normal leading-tight italic">
                Struktur <span class="not-italic font-bold text-primary">Organisasi</span>
            </h2>
        </div>

        <div class="flex flex-col items-center">
            @if($topLeader)
                <!-- Headmaster -->
                <div class="mb-24 relative w-full flex justify-center">
                    <div class="group text-center w-full max-w-sm">
                        <div class="bg-gray-50 border border-gray-200 p-8 py-12 transition-all duration-500 group-hover:border-primary group-hover:bg-white group-hover:shadow-2xl group-hover:shadow-primary/5">
                            <span class="text-primary font-subhead font-bold text-[10px] tracking-[0.3em] uppercase mb-4 block">{{ $topLeader->jabatan }}</span>
                            <h4 class="font-headline font-bold text-on-surface text-3xl italic">{{ $topLeader->nama }}</h4>
                        </div>
                    </div>
                    
                    @if($subordinates->count() > 0)
                        <!-- Connection Line (Vertical) -->
                        <div class="absolute left-1/2 top-full h-24 w-px bg-gray-200 -translate-x-1/2"></div>
                    @endif
                </div>
            @endif
            
            @if($subordinates->count() > 0)
                <!-- Subordinates (Up to 3 Columns) -->
                <div class="grid grid-cols-1 md:grid-cols-{{ $subordinates->count() }} gap-8 w-full relative pt-12 border-b border-gray-100 pb-24">
                    <!-- Horizontal Connection Line -->
                    @if($subordinates->count() > 1)
                        <div class="absolute top-0 left-0 right-0 h-px bg-gray-200 hidden md:flex justify-center">
                            <div class="h-full bg-gray-200" style="width: {{ 100 - (100 / $subordinates->count()) }}%"></div>
                        </div>
                    @endif
                    
                    @foreach($subordinates as $member)
                        <div class="text-center group">
                            <div class="bg-gray-50 border border-gray-100 p-6 py-10 transition-all duration-500 group-hover:border-primary/50 group-hover:bg-white group-hover:shadow-xl group-hover:shadow-black/5">
                                <span class="text-gray-400 font-subhead font-bold text-[9px] tracking-widest uppercase mb-3 block">{{ $member->jabatan }}</span>
                                <h5 class="font-headline font-bold text-on-surface text-xl">{{ $member->nama }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($remainingStaff->count() > 0)
                <!-- All Other Staff Grid -->
                <div class="mt-24 w-full">
                    <div class="text-center mb-16">
                        <span class="text-gray-400 font-subhead font-bold text-[10px] tracking-[0.2em] uppercase">Staff & Pengajar</span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach($remainingStaff as $staff)
                            <div class="group">
                                <div class="bg-gray-50/50 border border-gray-100 p-6 transition-all duration-500 group-hover:bg-white group-hover:border-gray-200 group-hover:shadow-md">
                                    <p class="text-gray-500 font-subhead font-bold text-[9px] tracking-widest uppercase mb-2">{{ $staff->jabatan }}</p>
                                    <h6 class="font-headline font-bold text-on-surface text-base leading-tight">{{ $staff->nama }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
